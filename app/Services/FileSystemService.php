<?php
namespace App\Services;


interface FileSystemService
{
    public function getImages($tableName, $tableKey);

}