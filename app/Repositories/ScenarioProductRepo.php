<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Repositories;


use App\Entities\ScenarioProduct;
use Doctrine\ORM\EntityManager;

class ScenarioProductRepo
{
    private $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function findByScenarioDetailIn($scenarioDetail){
        return $this->em->getRepository(ScenarioProduct::class)->createQueryBuilder('products')
            ->select('scenarioproduct')
            ->from('App\Entities\ScenarioProduct', 'scenarioproduct')
            ->join('scenarioproduct.scenarioId', 'scenariodetail')
            ->join('scenarioproduct.productId','prdct')
            ->where('scenariodetail.id IN (:scenariodetail)')
            ->setParameter('scenariodetail', $scenarioDetail)
             ->orderBy("prdct.vender",'asc')
            ->getQuery()
            ->getResult();
    }

    public function findByScenarioDetailInAndProductIn($scenariodetail, $productTag){
        return $this->em->getRepository(ScenarioProduct::class)->createQueryBuilder('products')
            ->select('scenarioproduct')
            ->from('App\Entities\ScenarioProduct', 'scenarioproduct')
            ->join('scenarioproduct.scenarioId', 'scenariodetail')
            ->join('scenarioproduct.productId', 'product')
            ->join('product.productTagId', 'productTag')
            ->where('scenariodetail.id IN (:scenariodetail)')
            ->andWhere('productTag.tagId IN (:producttag)')
            ->setParameter('scenariodetail', $scenariodetail)
            ->setParameter('producttag', $productTag)
            ->orderBy("product.vender",'asc')
            ->getQuery()
            ->getResult();   
    }

    public function findByProductIn($productTag){
        return $this->em->getRepository(ScenarioProduct::class)->createQueryBuilder('products')
            ->select('scenarioproduct')
            ->from('App\Entities\ScenarioProduct', 'scenarioproduct')
            ->join('scenarioproduct.scenarioId', 'scenariodetail')
            ->join('scenarioproduct.productId', 'product')
            ->join('product.productTagId', 'productTag')
            ->where('productTag.tagId IN (:producttag)')
            ->setParameter('producttag', $productTag)
            ->orderBy("product.vender",'asc')
            ->getQuery()
            ->getResult();   
    }
}