<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Repositories;


use App\Entities\ProductInquiry;
use Doctrine\ORM\EntityManager;

class ProductInquiryRepo
{
    private $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function findOne($inquiryId){
        return $this->em->getRepository(ProductInquiry::class)->find($inquiryId);
    }
}