<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 10:07 AM
 */

namespace App\Services;


interface LandingProductService
{
    public function getAllProducts();
    public function getAllActiveProducts();
    public function getProduct($id);
    public function saveProduct($data);
    public function updateProduct($data, $id);
    public function activeProducts($id, $limit, $order);
//    public static function getProducts();
}