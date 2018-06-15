<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 01/03/2018
 * Time: 11:57 AM
 */

namespace App\Repositories;

use App\Entities\General;
use Doctrine\ORM\EntityManagerInterface;
class ProductTagRepo
{

	private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function removeTag($datas){
    	foreach ($datas as $data) {
    		$this->em->remove($data);
    	}
    	$this->em->flush();
    	return true;
    }
}