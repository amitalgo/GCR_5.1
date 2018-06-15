<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Repositories;


use Doctrine\ORM\EntityManager;
use App\Entities\QuickLink;

class QuickLinkRepo
{
    private $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function findAllQuickLinks(){
        return $this->em->getRepository(QuickLink::class)->findAll();
    }

    public function findActiveQuickLinks(){
        return $this->em->getRepository(QuickLink::class)->findBy(array('is_active'=>1));
    }

    public function findQuickLink($id){
        return $this->em->getRepository(QuickLink::class)->find($id);
    }

    public function saveOrUpdate($data){
        $this->em->persist($data);
        $this->em->flush();
        return true;
    }
}