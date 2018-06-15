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
}