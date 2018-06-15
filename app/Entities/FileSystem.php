<?php
namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_file_system")
 */
class FileSystem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=100)
     */
    private $path ;


    /**
     * @ORM\Column(type="string",length=100)
     */
    private $originalName ;

    /**
     * @ORM\Column(type="string",length=100)
     */
    private $fileName ;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $type ;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $tableName ;

//    /**
//     * @ORM\ManyToOne(targetEntity="ProductAttachment",fetch="EAGER", inversedBy="fileId")
//     * @ORM\JoinColumn(name="table_key", referencedColumnName="id")
//     */

    /**
     * @ORM\Column(type="integer")
     */
    private $tableKey ;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
     private $createDate;


    /**
     * @ORM\Column(type="string",length=50)
     */
    private $mimeType ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }/**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }/**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }/**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }/**
     * @return mixed
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }/**
     * @param mixed $originalName
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
    }/**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }/**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }/**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }/**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }/**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }/**
     * @param mixed $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }/**
     * @return mixed
     */
    public function getTableKey()
    {
        return $this->tableKey;
    }/**
     * @param mixed $tableKey
     */
    public function setTableKey($tableKey)
    {
        $this->tableKey = $tableKey;
    }/**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }/**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }/**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }/**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }/**
     * @return mixed
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }/**
     * @param mixed $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    public function getFilePath(){
        $url = '/var/www/nas/'.$this->path.'/'.$this->fileName;
        if(file_exists($url)){
          $img = file_get_contents($url);
          $url_info = pathinfo($url);
          $src = 'data:image/'. $url_info['extension'] .';base64,'. base64_encode($img);  
      }else{
        $src="noimage";
      }
     
        echo $src;
    }


}