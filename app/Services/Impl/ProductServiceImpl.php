<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 6:07 PM
 */

namespace App\Services\Impl;


use App\Entities\Product;
use App\Entities\ProductImage;
use App\Entities\ProductSolutionX;
use App\Entities\TagProduct;
use App\Repositories\CountryRepo;
use App\Repositories\ProductRepo;
use App\Repositories\SolutionTypeRepo;
use App\Services\ProductService;
use App\Repositories\SolutionProviderRepo;
use App\Repositories\TagRepo;
use App\Repositories\ProductTagRepo;
use App\Repositories\FileSystemRepo;
use App\Repositories\ProductInquiryRepo;
use App\Repositories\ScenarioProductRepo;
use Doctrine\Common\Collections\ArrayCollection;

class ProductServiceImpl implements ProductService{

    private $productRepo, $solutionTypeRepo, $countryRepo, $uploadService,$solutionProvider, $tagRepo, $productTagRepo, $fileSystemRepo, $productInquiryRepo;

    public function __construct(ProductRepo $productRepo, SolutionTypeRepo $solutionTypeRepo, CountryRepo $countryRepo, UploadService $uploadService,SolutionProviderRepo $solutionProviderRepo, TagRepo $tagRepo, ProductTagRepo $productTagRepo, ScenarioProductRepo $scenarioProductRepo, FileSystemRepo $fileSystemRepo, ProductInquiryRepo $productInquiryRepo){
        $this->productRepo = $productRepo;
        $this->solutionTypeRepo = $solutionTypeRepo;
        $this->countryRepo = $countryRepo;
        $this->uploadService = $uploadService;
        $this->solutionProviderRepo = $solutionProviderRepo;
        $this->tagRepo = $tagRepo;
        $this->productTagRepo = $productTagRepo;
        $this->scenarioProductRepo = $scenarioProductRepo;
        $this->fileSystemRepo = $fileSystemRepo;
        $this->productInquiryRepo = $productInquiryRepo;
    }

    public function getAllProducts(){
        return $this->productRepo->findAll();
    }

    public function getProduct($productId){
        return $this->productRepo->findById($productId);
    }

    public function saveProduct($data)
    {
        $product = new Product();
        $product->setProductName($data->get('productName'));
        $product->setDescription($data->get('description'));
        $product->setProductCountryId($this->countryRepo->findById($data->get('country')));
        $product->setMetaDescription($data->get('metaDescription'));
        $product->setMetaTitle($data->get('metaTitle'));
        $product->setMetaKeywords($data->get('metaKeywords'));
        $product->setIsActive(1);
        $product->setDeleted(0);
        $product->setProductProviderId($this->solutionProviderRepo->findById($data->get('solution_provider')));
        $product->setCreatedAt(new \DateTime(now()));
        $product->setUpdatedAt(new \DateTime(now()));
        $productSolutionTypeIds = $data->get('productSolutionTypeId');
        foreach ($productSolutionTypeIds as $productSolutionTypeId){
            $productSolutionX = new ProductSolutionX();
            $productSolutionX->setProductSolutionTypeId($this->solutionTypeRepo->getActiveSolutionType($productSolutionTypeId));
            $productSolutionX->setIsActive(1);
            $productSolutionX->setDeleted(0);
            $productSolutionX->setCreatedAt(new \DateTime(now()));
            $product->addProductSolutionX($productSolutionX);
        }
        $images = $this->uploadService->UploadMulFile($data, 'productImage', 'Product/');
        if($images){
            foreach ($images as $image){
                $productImages = new ProductImage();
                $productImages->setCreatedAt(new \DateTime(now()));
                $productImages->setUpdatedAt(new \DateTime(now()));
                $productImages->setIsActive(1);
                $productImages->setDeleted(0);
                $productImages->setIsVideo(0);
                $productImages->setMediaUrl($image);
                $product->addProductImage($productImages);
            }
        }
        return $this->productRepo->saveOrUpdate($product);
    }

    public function updateProduct($data, $id){
        $product = $this->productRepo->findById($id);
        $product->setProductName($data->get('productName'));
        $product->setDescription($data->get('description'));
        $product->setProductCountryId($this->countryRepo->findById($data->get('country')));
        $product->setMetaDescription($data->get('metaDescription'));
        $product->setMetaTitle($data->get('metaTitle'));
        $product->setMetaKeywords($data->get('metaKeywords'));
        $product->setIsActive(1);
        $product->setUpdatedAt(new \DateTime(now()));
        $this->productRepo->removeExistingSolutionType($id);
        $productSolutionTypeIds = $data->get('productSolutionTypeId');
        foreach ($productSolutionTypeIds as $productSolutionTypeId){
            $productSolutionX = new ProductSolutionX();
            $productSolutionX->setProductSolutionTypeId($this->solutionTypeRepo->getActiveSolutionType($productSolutionTypeId));
            $productSolutionX->setIsActive(1);
            $productSolutionX->setDeleted(0);
            $productSolutionX->setCreatedAt(new \DateTime(now()));
            $product->addProductSolutionX($productSolutionX);
        }
        $this->productRepo->removeExistingImages($id);
        $imageUrls = $data->get('productImageUrl');
        if($imageUrls){
            foreach ($imageUrls as $imageUrl){
                $productImages = new ProductImage();
                $productImages->setCreatedAt(new \DateTime(now()));
                $productImages->setUpdatedAt(new \DateTime(now()));
                $productImages->setIsActive(1);
                $productImages->setDeleted(0);
                $productImages->setIsVideo(0);
                $productImages->setMediaUrl($imageUrl);
                $product->addProductImage($productImages);
            }
        }
        $images = $this->uploadService->UploadMulFile($data, 'productImage', 'Product/');
        if($images){
            foreach ($images as $image){
                $productImages = new ProductImage();
                $productImages->setCreatedAt(new \DateTime(now()));
                $productImages->setUpdatedAt(new \DateTime(now()));
                $productImages->setIsActive(1);
                $productImages->setDeleted(0);
                $productImages->setIsVideo(0);
                $productImages->setMediaUrl($image);
                $product->addProductImage($productImages);
            }
        }
        return $this->productRepo->saveOrUpdate($product);
    }

    public function getAllActiveProductsByParentId($id)
    {
        return $this->productRepo->getAllActiveProductsByParentId($id);
    }

    public function saveOrUpdateProductTag($productId, $data){
        $product = $this->productRepo->findById($productId);
        $product->setExtraDescription(strip_tags($data['extra_description']));
        $tagIds = $data['tagIds'];
        if($product->getProductTagId()->isEmpty()){
            $this->populateProductTag($tagIds, $product);
        }else{
            $existingProductTags = $product->getProductTagId();
            $this->productTagRepo->removeTag($existingProductTags);
            $this->populateProductTag($tagIds, $product);
        }

        return $this->productRepo->saveOrUpdate($product);
    }

    private function populateProductTag($tagIds, $product){
        if(!empty($tagIds)) {
            foreach ($tagIds as $tagId) {
                $productTag = new TagProduct();
                $productTag->setTagId($this->tagRepo->findTag($tagId));
                $productTag->setStatus(1);
                $product->addProductTags($productTag);
            }
        }
    }

    public function getProductBySolutionDetailIn($scenarioDetail){
        $scenarioProducts = $this->scenarioProductRepo->findByScenarioDetailIn($scenarioDetail);
        foreach ($scenarioProducts as $scenarioProduct) {
            foreach ($scenarioProduct->getProductId()->getProductAttachment() as $productAttachment) {
                if($productAttachment->getType() == 'photo') {
                    $image = $this->fileSystemRepo->findImage('CloudProductAttachment', $productAttachment->getId());
                    $productAttachment->setImage($image);
                }
            }
        }
        return $scenarioProducts;
    }

    public function getProductTags(){
        $productTagsColl = new ArrayCollection();
        $producttags = $this->tagRepo->findProductTags();
        foreach ($producttags as $producttag) {
            if(!$productTagsColl->contains($producttag->getTagId())){
                $productTagsColl->add($producttag->getTagId());
            }
        }
        return $productTagsColl;
    }

       public function getRelatedProductTags($id){
        $productTagsColl = new ArrayCollection();
        $producttags = $this->tagRepo->findRelatedProductTags($id);
        foreach ($producttags as $producttag) {
            if(!$productTagsColl->contains($producttag->getTagId())){
                $productTagsColl->add($producttag->getTagId());
            }
        }
        return $productTagsColl;
    } 

    public function getProductTagsById($scenarioId){
        $productTagsColl = new ArrayCollection();
        $producttags = $this->tagRepo->findProductTagsById($scenarioId);
        foreach ($producttags as $producttag) {
            if(!$productTagsColl->contains($producttag->getTagId())){
                $productTagsColl->add($producttag->getTagId());
            }
        }
        return $productTagsColl;
    }

    // public function getProductByIdIn($data){
    //     $scenarioProducts = $this->scenarioProductRepo->findByProductIn($data['product-filter']);
    //     // dd($scenarioProducts);
    //     foreach ($scenarioProducts as $scenarioProduct) {
    //         foreach ($scenarioProduct->getProductId()->getProductAttachment() as $productAttachment) {
    //             if($productAttachment->getType() == 'photo') {
    //                 $image = $this->fileSystemRepo->findImage('CloudProductAttachment', $productAttachment->getId());
    //                 $productAttachment->setImage($image);
    //             }
    //         }
    //     }
    //     return $scenarioProducts;
    //  }

    public function getProductByIdIn($data){
        $disScenarioProducts = [];
        $scenarioProducts = $this->scenarioProductRepo->findByProductIn($data['product-filter']);
        foreach ($scenarioProducts as $scenarioProduct) {
            foreach ($scenarioProduct->getProductId()->getProductAttachment() as $productAttachment) {
                if($productAttachment->getType() == 'photo') {
                    $image = $this->fileSystemRepo->findImage('CloudProductAttachment', $productAttachment->getId());
                    $productAttachment->setImage($image);
                }
            }
        }
        foreach ($scenarioProducts as $scenarioProduct) {
            if($this->checkArray($disScenarioProducts, $scenarioProduct->getProductId()->getId())){
                $disScenarioProducts[] = $scenarioProduct;
            }
        }
        // dd($scenarioProducts);
        return $disScenarioProducts;
     }

     public function getProductBySolutionDetailInAndProductIn($scenarioDetail, $data){
        $disScenarioProducts = [];
        if(null!=$data['product-filter']){
            $scenarioProducts = $this->scenarioProductRepo->findByScenarioDetailInAndProductIn($scenarioDetail, $data['product-filter']);
            foreach ($scenarioProducts as $scenarioProduct) {
                foreach ($scenarioProduct->getProductId()->getProductAttachment() as $productAttachment) {
                    if($productAttachment->getType() == 'photo') {
                        $image = $this->fileSystemRepo->findImage('CloudProductAttachment', $productAttachment->getId());
                        $productAttachment->setImage($image);
                    }
                }
            }
        }else{
            $scenarioProducts = $this->scenarioProductRepo->findByScenarioDetailIn($scenarioDetail);
            foreach ($scenarioProducts as $scenarioProduct) {
                foreach ($scenarioProduct->getProductId()->getProductAttachment() as $productAttachment) {
                    if($productAttachment->getType() == 'photo') {
                        $image = $this->fileSystemRepo->findImage('CloudProductAttachment', $productAttachment->getId());
                        $productAttachment->setImage($image);
                    }
                }
            }
        }
        // foreach ($scenarioProducts as $scenarioProduct) {
        //     if($di)
        // }
        return $scenarioProducts;
     }

     public function getProductInquiry($inquiryId){
        return $this->productInquiryRepo->findOne($inquiryId);
     }

     private function checkArray($scenarioProducts, $productId){
        foreach ($scenarioProducts as $scenarioProduct) {
            if($scenarioProduct->getProductId()->getId() == $productId){
                return false;
            }
        }
        return true;
     }

     //Amit 18-06-2018
    public function getProductBySlug($slug){
         return $this->productRepo->getProductBySlug($slug);
    }

    //Amit 20-06-2018
    public function getAllProductSlug(){
        return $this->productRepo->getAllProductSlug();
    }

}