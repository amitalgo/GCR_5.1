<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 07/02/2018
 * Time: 6:30 PM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $extra_description;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $vender;

    /**
     * @ORM\Column(type="integer")
     */
    private $add_no;

    /**
     * @ORM\Column(type="integer")
     */
    private $upd_no;

    /**
     * @ORM\Column(type="boolean",options={"unsigned":true, "default":1})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updDate;

    //    Amit 15-06-18
    /**
     * @ORM\OneToOne(targetEntity="ProductSlug", mappedBy="productId", fetch="EAGER",cascade={"persist"})
     */
    private $productSlug;

//
//    /**
//     * @ORM\OneToMany(targetEntity="ProductIndustryX", mappedBy="productId")
//     */
//    private $productX;


    /**
     * @ORM\OneToMany(targetEntity="ScenarioProduct",fetch="EAGER", mappedBy="productId",cascade={"persist"})
     */
    private $productScenarioId;

    /**
     * @ORM\OneToMany(targetEntity="ProductInquiry", mappedBy="productId",cascade={"persist"}, fetch="EAGER")
     */
    private $productInquiryId;

    /**
     *  
     * @ORM\OneToMany(targetEntity="TagProduct", mappedBy="productId",cascade={"persist"}, fetch="EAGER")
     */
    private $productTagId;


//    /**
//     * @ORM\OneToMany(targetEntity="ProductSolutionX", mappedBy="productProductTypeId")
//     */
//    private $productTypeX;
//
//
//    /**
//     * @ORM\OneToMany(targetEntity="ProductDetails", mappedBy="product")
//     */
//    private $productDetails;


    /**
     * @ORM\OneToMany(targetEntity="ProductAttachment", fetch="EAGER",mappedBy="productAttachmentId",cascade={"persist"})
     */
    private $productAttachment;

    public function __construct()
    {
        $this->productScenarioId= new ArrayCollection();
        $this->productAttachment = new ArrayCollection();
        $this->productTagId = new ArrayCollection();
    }

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }



    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getExtraDescription()
    {
        return $this->extra_description;
    }

    /**
     * @param mixed $extra_description
     */
    public function setExtraDescription($extra_description)
    {
        $this->extra_description = $extra_description;
    }


    /**
     * @return mixed
     */
    public function getVender()
    {
        return $this->vender;
    }

    /**
     * @param mixed $vender
     */
    public function setVender($vender)
    {
        $this->vender = $vender;
    }

    /**
     * @return mixed
     */
    public function getAddNo()
    {
        return $this->add_no;
    }

    /**
     * @param mixed $add_no
     */
    public function setAddNo($add_no)
    {
        $this->add_no = $add_no;
    }

    /**
     * @return mixed
     */
    public function getUpdNo()
    {
        return $this->upd_no;
    }

    /**
     * @param mixed $upd_no
     */
    public function setUpdNo($upd_no)
    {
        $this->upd_no = $upd_no;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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

    /**
     * @return mixed
     */
    public function getUpdDate()
    {
        return $this->updDate;
    }

    /**
     * @param mixed $updDate
     */
    public function setUpdDate($updDate)
    {
        $this->updDate = $updDate;
    }


    public function addProductScenario(ScenarioProduct $scenarioProduct)
    {
        if(!$this->productScenarioId->contains($scenarioProduct)) {
            $scenarioProduct->setProductId($this);
            $this->productScenarioId->add($scenarioProduct);
        }
    }

    /**
     * @return mixed
     */
    public function getProductScenarioId()
    {
        return $this->productScenarioId;
    }

    /**
     * @param mixed $productScenarioId
     */
    public function setProductScenarioId($productScenarioId)
    {
        $this->productScenarioId = $productScenarioId;
    }

    /**
     * @return mixed
     */
    public function getProductInquiryId()
    {
        return $this->productInquiryId;
    }

    /**
     * @param mixed $productInquiryId
     */
    public function setProductInquiryId($productInquiryId)
    {
        $this->productInquiryId = $productInquiryId;
    }

    /**
     * @return mixed
     */
    public function getProductTagId()
    {
        return $this->productTagId;
    }

    public function getProductTagIds(){
        $productTagIdArr = [];
        foreach ($this->productTagId as $productTagId) {
            $productTagIdArr[] = $productTagId->getTagId()->getId();
        }
        return $productTagIdArr;
    }

    public function getProductTag(){
        $productTag = [];
        foreach ($this->productTagId as $productTagId) {
            $productTag[] = $productTagId->getTagId()->getTagName();   
        }   
        return implode(',', $productTag);
    }

    /**
     * @param mixed $productTagId
     */
    public function setProductTagId($productTagId)
    {
        $this->productTagId = $productTagId;
    }


    public function addProductTags(TagProduct $productTag)
    {
        if(!$this->productTagId->contains($productTag)) {
            $productTag->setProductId($this);
            $this->productTagId->add($productTag);
        }
    }

    /**
     * @return mixed
     */
    public function getProductAttachment()
    {
        return $this->productAttachment;
    }

    /**
     * @param mixed $productAttachment
     */
    public function setProductAttachment($productAttachment)
    {
        $this->productAttachment = $productAttachment;
    }

    public function addProductImage(ProductAttachment $productAttachment)
    {
        if(!$this->productAttachment->contains($productAttachment)) {
            $productAttachment->setProductAttachmentId($this);
            $this->productAttachment->add($productAttachment);
        }
    }

    public function getProductParent(){
       $productScenario=[];
       foreach ($this->productScenarioId as $scenarioId){
           $productScenario[] = $scenarioId->getScenarioId()->getName();
       }
       return implode(',',$productScenario);
    }

    public function getAttachments(){
        $attachments=[];
        foreach ($this->productAttachment as $attachment){
            $attachments[]=$attachment->getId();
        }
        return implode(',',$attachments);
    }

    /**
     * @return mixed
     */
    public function getProductSlug()
    {
        return $this->productSlug;
    }

    /**
     * @param mixed $productSlug
     */
    public function setProductSlug($productSlug)
    {
        $this->productSlug = $productSlug;
    }

}