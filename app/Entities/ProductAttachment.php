<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 09/02/2018
 * Time: 10:41 AM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_product_attachment")
 */
class ProductAttachment
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product",  inversedBy="productAttachment")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productAttachmentId;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority;


    /**
     * @ORM\Column(type="string",length=5)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     */
    private $addNo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addDate;

    private $image;

//    /**
//     * @ORM\OneToMany(targetEntity="FileSystem", fetch="EAGER",mappedBy="tableKey",cascade={"persist"})
//     */
//    private $fileId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductAttachmentId()
    {
        return $this->productAttachmentId;
    }

    /**
     * @param mixed $productAttachmentId
     */
    public function setProductAttachmentId($productAttachmentId)
    {
        $this->productAttachmentId = $productAttachmentId;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getAddNo()
    {
        return $this->addNo;
    }

    /**
     * @param mixed $addNo
     */
    public function setAddNo($addNo)
    {
        $this->addNo = $addNo;
    }

    /**
     * @return mixed
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * @param mixed $addDate
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

//    /**
//     * @return mixed
//     */
//    public function getFileId()
//    {
//        return $this->fileId;
//    }
//
//    /**
//     * @param mixed $fileId
//     */
//    public function setFileId($fileId)
//    {
//        $this->fileId = $fileId;
//    }


    public function getScenarioImg(){
        if(!empty($this->image)){
             foreach ($this->image as $img) {
                 return $img->getFilePath();
             }   
        }
       
    }




}