<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:56 PM
 */

namespace App\Services\Impl;


use App\Services\ProductNewSchemaService;
use App\Repositories\ProductNewSchemaRepo;
class ProductNewSchemaServiceImpl implements ProductNewSchemaService
{

    private $productNewSchema;
    public function __construct(ProductNewSchemaRepo $productNewSchemaRepo)
    {
        $this->productNewSchema = $productNewSchemaRepo;
    }

    public function getAllProducts()
    {
      return $this->productNewSchema->getAllProducts();
    }

    public function getAllActiveProducts()
    {
        // TODO: Implement getAllActiveProducts() method.
    }

    public function getProduct($productId)
    {
        // TODO: Implement getProduct() method.
    }

    public function saveProduct($data)
    {
        // TODO: Implement saveProduct() method.
    }

    public function updateProduct($data, $id)
    {
        // TODO: Implement updateProduct() method.
    }

    public function getAllActiveProductsByParentId($id)
    {
        // TODO: Implement getAllActiveProductsByParentId() method.
    }

}