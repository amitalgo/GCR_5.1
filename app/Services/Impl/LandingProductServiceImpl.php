<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 10:08 AM
 */

namespace App\Services\Impl;
use App\Entities\LandingProduct;
use App\Entities\LandingProductImages;
use App\Services\LandingProductService;
use App\Services\Impl\UploadService;

use App\Repositories\LandingProductRepo;
class LandingProductServiceImpl implements LandingProductService{
    protected $uploadService;
    private static $landingProductRepo;

    public function __construct(UploadService $uploadService,LandingProductRepo $landingProductRepo){
      $this->uploadService = $uploadService;
      self::$landingProductRepo = $landingProductRepo;
    }

    public function getAllProducts(){
        return self::$landingProductRepo->getAllProducts();
    }

    public function getAllActiveProducts(){
        // TODO: Implement getAllActiveProducts() method.
    }
    public function getProduct($id){
        return self::$landingProductRepo->getProduct($id);
    }
    public function saveProduct($data)
    {
        $product  = new LandingProduct();
        $product->setName($data->get('name'));
        $product->setAttributes('');
        $product->setVendor($data->get('vendor'));
        $product->setDescription($data->get('description'));
        $product->setIsActive(1);
        $product->setCreatedAt(new \DateTime());
        $product->setUpdatedAt(new \DateTime());

        $images = $this->uploadService->UploadMulFile($data, 'productImage', 'LandingProduct/');

        if($images){
            foreach ($images as $image){
                $productImages = new LandingProductImages();
                $productImages->setCreatedAt(new \DateTime());
                $productImages->setUpdatedAt(new \DateTime());
                $productImages->setIsActive(1);
                //$productImages->setDeleted(0);
                $productImages->setAttributes('');
                $productImages->setMediaUrl($image);
                $product->addProductImage($productImages);
            }
        }
        return self::$landingProductRepo->saveOrUpdate($product);
    }



    public function updateProduct($data, $id){
            $product  = self::$landingProductRepo->getProduct($id);
            $product->setName($data->get('name'));
            $product->setAttributes('');
            $product->setVendor($data->get('vendor'));
            $product->setDescription($data->get('description'));
            $product->setIsActive($data->get('active'));
            $product->setCreatedAt(new \DateTime());
            $product->setUpdatedAt(new \DateTime());

        self::$landingProductRepo->removeExistingImages($id);
        $imageUrls = $data->get('productImageUrl');
        if($imageUrls){
            foreach ($imageUrls as $imageUrl){
                $productImages = new LandingProductImages();
                $productImages->setCreatedAt(new \DateTime());
                $productImages->setUpdatedAt(new \DateTime());
                $productImages->setIsActive(1);
                $productImages->setAttributes('');
                $productImages->setMediaUrl($imageUrl);
                $product->addProductImage($productImages);
            }
        }

            $images = $this->uploadService->UploadMulFile($data, 'productImage', 'LandingProduct/');

            if($images){
                foreach ($images as $image){
                    $productImages = new LandingProductImages();
                    $productImages->setCreatedAt(new \DateTime());
                    $productImages->setUpdatedAt(new \DateTime());
                    $productImages->setIsActive(1);
                    $productImages->setAttributes('');
                    $productImages->setMediaUrl($image);
                    $product->addProductImage($productImages);
                }
            }
            return self::$landingProductRepo->saveOrUpdate($product);
        }

    public static function getProducts()
    {
        return self::$landingProductRepo->getAllProducts();
    }

    public function activeProducts($id, $limit, $order)
    {
        if($id != null){
            return self::$landingProductRepo->getProduct($id);
        }else{
            return self::$landingProductRepo->findProducts($limit, $order);
        }
    }
}