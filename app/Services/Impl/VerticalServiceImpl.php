<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 3:42 PM
 */

namespace App\Services\Impl;

use App\Entities\ProductSlug;
use App\Entities\ScenarioTitleSlug;
use App\Entities\Tag;
use App\Services\TagService;
use App\Entities\VerticalImages;
use App\Services\VerticalService;
use App\Services\FileSystemService;
use App\Repositories\VerticalRepo;
use App\Services\Impl\UploadService;
use App\Repositories\ProductRepo;
use App\Entities\ScenarioDetailSlug;
use Doctrine\Common\Collections\ArrayCollection;

use App\Services\ProductService;

class VerticalServiceImpl implements VerticalService
{

    private $uploadService,$fileSystemService,$tagService;
    private static $verticalRepo;
    public function __construct(VerticalRepo $verticalRepo,ProductRepo $productRepo,ProductService $productService,UploadService $uploadService, TagService $tagService ,FileSystemService $fileSystemService)
    {
        self::$verticalRepo = $verticalRepo;
        $this->uploadService = $uploadService;
        $this->fileSystemService = $fileSystemService;
        $this->tagService=$tagService;
        $this->productService=$productService; //18-06-18
    }

    public function getAllActiveVerticals()
    {
        // TODO: Implement getAllActiveVerticals() method.
    }

    public function getAllVerticals()
    {
        return self::$verticalRepo->getAllVerticals();
    }

    public function getVertical($id)
    {
        $vertical = self::$verticalRepo->getVertical($id);
        foreach ($vertical->getScenarioDetail() as $scenarioDetail) {
            $imageUrl = $this->fileSystemService->getImages('CloudScenarioDetail', $scenarioDetail->getId());
            $scenarioDetail->setImage($imageUrl);
        }
        return $vertical;
    }

    public function getVerticalBySolutionAndSolutionIn($id, $data){

        $vertical = self::$verticalRepo->getVertical($id);

            if(null!=$data['solution-tag']){
                foreach ($vertical->getScenarioDetail() as $scenarioDetail) {
                    if($this->checkTag($scenarioDetail, $data['solution-tag'])){
                        $imageUrl = $this->fileSystemService->getImages('CloudScenarioDetail', $scenarioDetail->getId());
                        $scenarioDetail->setImage($imageUrl);
                    }else{
                        $vertical->removeScenarioDetail($scenarioDetail);
                    }
                }
            
        }
        
        return $vertical;   
    }

    public function getVerticalsBySolution($id){
        $tagCategories = self::$verticalRepo->getScenarioDetail($id);
        foreach ($tagCategories as $tagCategory) {
            $imageUrl = $this->fileSystemService->getImages('CloudScenarioDetail', $tagCategory->getScenarioId()->getId());
            $tagCategory->getScenarioId()->setImage($imageUrl);    
        }
        return $tagCategories;
    }

    private function checkTag($scenarioDetail, $tagArr){
        if(!$scenarioDetail->getScenarioTagId()->isEmpty()){
            foreach ($scenarioDetail->getScenarioTagId() as $scenarioTag) {
                if(in_array($scenarioTag->getTagId()->getId(), $tagArr)){
                    return true;
                }
            }
        }
        return false;
    }

    public function getIsActive()
    {
        return self::$verticalRepo->getIsActive();
    }

    public static function getActiveVerticals(){
        return self::$verticalRepo->getIsActive();
    }
    public function addVertical($data)
    {
        // TODO: Implement addVertical() method.
    }

    public function updateVertical($data, $id)
    {
        $vertical = self::$verticalRepo->getVertical($id);
        $verticalImage = $vertical->getVerticalImages();
        if(null!=$verticalImage){
            self::$verticalRepo->removeVerticalImage($verticalImage);
        }
        $newVerticalImage = new VerticalImages();
        $image_url = $this->uploadService->UploadFile($data,'image','Vertical/');
        $m_image_url = $this->uploadService->UploadFile($data,'m-image','Vertical/Banner/');

        $tiles_image = $image_url?$image_url:$data->get('image-txt');
        $banner_image = $m_image_url?$m_image_url:$data->get('m-image-txt');

        $img_arr = ['tiles'=>$tiles_image,'banner'=>$banner_image];
        $JSON_IMAGE_URL = json_encode($img_arr,JSON_UNESCAPED_SLASHES);

        //$image_url?$newVerticalImage->setImage($JSON_IMAGE_URL):'';
        $newVerticalImage->setImage($JSON_IMAGE_URL);
        $newVerticalImage->setVerticalId($vertical);
        $vertical->setVerticalImages($newVerticalImage);
        return self::$verticalRepo->saveOrUpdate($vertical);
    }

    public function getActiveVerticalById($id)
    {
        // TODO: Implement getActiveVerticalById() method.
    }

    public function verticalList()
    {
        // TODO: Implement verticalList() method.
    }

    public function getVerticalsBySolutionIn($id, $data){
        if(null!=$data['solution-tag']){
            $tagCategoriesColl = new ArrayCollection();
            $tagCategories = self::$verticalRepo->getScenarioDetailByTagIn($data['solution-tag']); 
            foreach ($tagCategories as $tagCategory) {
                if($this->checkDataInCollection($tagCategoriesColl, $tagCategory->getScenarioId())){
                    $imageUrl = $this->fileSystemService->getImages('CloudScenarioDetail', $tagCategory->getScenarioId()->getId());
                    $tagCategory->getScenarioId()->setImage($imageUrl);
                    $tagCategoriesColl->add($tagCategory);
                }
            }
            return $tagCategoriesColl;
        }else{
            $this->getVerticalsBySolution($id);
        }
    }

    private function checkDataInCollection($collectionArr, $data){
        foreach ($collectionArr as $collection) {
            if($collection->getScenarioId()==$data){
                return false;
            }
        }
        return true;
    }

    //Amit 12-06-18
    public function getScenarioDetailBySlug($slug){
        return self::$verticalRepo->getScenarioDetailBySlug($slug);
    }

    //Amit 20-06-2018
    public function clean($string) {
        $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9-]/', '', $string); // Removes special chars.

        return strtolower(preg_replace('/-+/', '-', $string)); // Replaces multiple hyphens with single one.
    }

    //Amit 13-06-18
    public function tagGenerator(){

        $productSlug = $this->productService->getAllProductSlug();
        $flag=false;
        if(!empty($productSlug)){
            $flag = self::$verticalRepo->removeData($productSlug); //To First Remove all Slug and later insert the new one
        }else{
            $flag = true;
        }

        if($flag){
            $products = $this->productService->getAllProducts();

            foreach($products as $product){
            dd($product);
                if($product->getproductSlug()==null){
                    $productSlug = new ProductSlug();
                    $productSlug->setProductId($product);
                    //       $productSlug->setUrlSlug(strtolower(preg_replace('/\s+/','-',trim($product->getName   ()))));
                    $productSlug->setUrlSlug($this->clean($product->getName()));
                    $productSlug->setUpdDate(new \DateTime());
                    self::$verticalRepo->saveOrUpdate($productSlug);
                }
            }
        }

        exit;

        $verticals = self::$verticalRepo->getAllVerticals();

        // To generate Tags Slug
        $activeTagsLists = $this->tagService->getActiveTags();

        foreach($activeTagsLists as $activeTagsList){
            if($activeTagsList->getUrlSlug()==null){
                $tagList = $this->tagService->getTag($activeTagsList->getId());
                $tagList->setUrlSlug(strtolower(preg_replace('/\s+/','-',trim($activeTagsList->getTagName   ()))));
                self::$verticalRepo->saveOrUpdate($tagList);
            }
        }

        foreach($verticals as $vertical){

            foreach($vertical->getscenarioDetail() as $de){

                //To generate ScenarioDetailSlug
                if($de->getscenarioDetailSlug()==null){
                    $verticalDetailSlug=new ScenarioDetailSlug();
                    $verticalDetailSlug->setUrlSlug(strtolower(preg_replace('/\s+/','-',trim($de->getName()))));
                    $verticalDetailSlug->setScenarioId($de);
                    $verticalDetailSlug->setUpdDate(new \DateTime());
                    $de->setscenarioDetailSlug($verticalDetailSlug);

                }

                //To generate ProductSlug
//                foreach($de->getscenarioProductId() as $product){
//
//                    if($product->getproductId()->getproductSlug()==null){
//                        $productSlug = new ProductSlug();
//                        $productSlug->setProductId($product->getProductId());
//                        $productSlug->setUrlSlug(strtolower(preg_replace('/\s+/','-',trim($product->getproductId()->getName   ()))));
//                        $productSlug->setUpdDate(new \DateTime());
//                        $product->getproductId()->setproductSlug($productSlug);
//
//                    }
//                }
            }

            //To generate ScenarioTitleSlug
            if($vertical->getscenarioTitleSlug()==null){
                $verticalTitleSlug = new ScenarioTitleSlug();
                $verticalTitleSlug->setTitleId($vertical);
                $verticalTitleSlug->setUpdDate(new \DateTime());
                $verticalTitleSlug->setUrlSlug(strtolower(preg_replace('/\s+/','-',trim($vertical->getName()))));
                $vertical->setscenarioTitleSlug($verticalTitleSlug);
            }
        }

        return self::$verticalRepo->saveOrUpdate($verticals);
    }

    public function test(){
        return 'hiee';
    }

}