<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 10:12 AM
 */

namespace App\Repositories;

use App\Entities\LandingProduct;
use App\Entities\LandingProductImages;
use Doctrine\ORM\EntityManagerInterface;

class LandingProductRepo{
    protected $em;
    public  function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function getAllProducts(){
        return $this->em->getRepository(LandingProduct::class)->findAll();
    }

    public function getAllActiveProducts(){

    }
    public function getProduct($id){
        return $this->em->getRepository(LandingProduct::class)->find($id);
    }

    public function saveOrUpdate(LandingProduct $product){
        $this->em->persist($product);
        $this->em->flush();
        return true;
    }

    public function removeExistingImages($id){
        $existingImages = $this->em->getRepository(LandingProductImages::class)->findBy(['productId'=>$id]);
        foreach ($existingImages as $existingImage){
            $this->em->remove($existingImage);
        }
        $this->em->flush();
    }

    public function findProducts($limit, $order){
        return $this->em->getRepository(LandingProduct::class)->findBy(array(), array('id'=>$order), $limit, null);
    }
}