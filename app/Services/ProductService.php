<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 6:06 PM
 */

namespace App\Services;


interface ProductService
{
    public function getAllProducts();

    public function getProduct($productId);

    public function saveProduct($data);

    public function updateProduct($data, $id);

    public  function getAllActiveProductsByParentId($id);

    public function saveOrUpdateProductTag($productId, $data);

    public function getProductBySolutionDetailIn($scenarioDetail);

    public function getProductTags();

    public function getProductTagsById($scenarioId);

    public function getProductBySolutionDetailInAndProductIn($scenarioDetail, $data);

    public function getProductInquiry($inquiryId);

    public function getProductByIdIn($data);

    //Amit 18-06-2018
    public function getProductBySlug($slug);

    //Amit 20-06-2018
    public function getAllProductSlug();

    //Amit 21-06-2018
    public function getProductSlugById($id);
}