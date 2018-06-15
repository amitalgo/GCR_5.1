<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Repositories;


use Doctrine\ORM\EntityManager;
use App\Entities\QuickLinkPage;

class QuickLinkPageRepo
{
    private $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function findQuickLinksByPage($pageId){
    	return $this->em->getRepository(QuickLinkPage::class)->findBy(array('page'=>$pageId));
    }

    public function removeQuickLinkPages($datas){
    	foreach ($datas as $data) {
    		$this->em->remove($data);
    	}
    	$this->em->flush();
    	return true;
    }
}