<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Repositories;


use App\Entities\FileSystem;
use Doctrine\ORM\EntityManager;

class FileSystemRepo
{
    private $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }
    public function findImage($tableName, $tableKey){
        return $this->em->getRepository(FileSystem::class)->findBy(array('tableName'=>$tableName, 'tableKey'=>$tableKey));
    }
}