<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:58 PM
 */

namespace App\Repositories;

use App\Entities\Product;
use LaravelDoctrine\ORM\Facades\Doctrine;
use Doctrine\ORM\EntityManagerInterface;
class ProductNewSchemaRepo
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function getAllProducts()
    {
        return $this->em->getRepository(Product::class)->findAll();
    }

    public function getAllActiveProducts()
    {
        // TODO: Implement getAllActiveProducts() method.
    }

    public function getProduct($productId)
    {
        return $this->em->getRepository(Product::class)->find($productId);
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