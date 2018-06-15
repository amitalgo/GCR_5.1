<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 10/05/2018
 * Time: 2:01 PM
 */

namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * Class Page
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="landing_product")
 */
class LandingProduct
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $name ;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\Column(type="string",length=150)
     */
    private $vendor;


    /**
     * @ORM\Column(type="text")
     */
    private $attributes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="LandingProductImages",fetch="EAGER", mappedBy="productId",cascade={"persist"})
     */
    private $landingProductImages;

    public function __construct()
    {
        $this->landingProductImages = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="LandingPage", mappedBy="landingPageBannerId",cascade={"persist"})
     */
    private $landingPageBanner;


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
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param mixed $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getLandingProductImages()
    {
        return $this->landingProductImages;
    }

    /**
     * @param mixed $landingProductImages
     */
    public function setLandingProductImages($landingProductImages)
    {
        $this->landingProductImages = $landingProductImages;
    }

    /**
     * @return mixed
     */
    public function getLandingPageBanner()
    {
        return $this->landingPageBanner;
    }

    /**
     * @param mixed $landingPageBanner
     */
    public function setLandingPageBanner($landingPageBanner)
    {
        $this->landingPageBanner = $landingPageBanner;
    }


    public function addProductImage(LandingProductImages $landingProductImage)
    {
        if(!$this->landingProductImages->contains($landingProductImage)){
            $landingProductImage->setProductId($this);
            $this->landingProductImages->add($landingProductImage);
        }
    }



}