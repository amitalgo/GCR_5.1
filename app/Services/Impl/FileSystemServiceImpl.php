<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 3:42 PM
 */

namespace App\Services\Impl;



use App\Entities\FileSystem;
use App\Services\FileSystemService;
use App\Repositories\FileSystemRepo;

class FileSystemServiceImpl implements FileSystemService
{

    private $fileSystemRepo;
    public function __construct(FileSystemRepo $fileSystemRepo)
    {
        $this->fileSystemRepo = $fileSystemRepo;
    }

    public function getImages($tableName, $tableKey){
        return $this->fileSystemRepo->findImage($tableName, $tableKey);
    }
}