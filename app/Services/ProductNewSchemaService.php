<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:55 PM
 */

namespace App\Services;


interface ProductNewSchemaService
{
    public function getAllProducts();

    public function getAllActiveProducts();

    public function getProduct($productId);

    public function saveProduct($data);

    public function updateProduct($data, $id);

    public  function getAllActiveProductsByParentId($id);
}