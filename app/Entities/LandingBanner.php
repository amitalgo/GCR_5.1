<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 10/05/2018
 * Time: 3:14 PM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="landing_banner")
 */
class LandingBanner
{


    public function __construct()
    {
        $this->landingBannerImages = new ArrayCollection();
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $title ;

    /**
     * @ORM\Column(type="text")
     */
    private $description ;

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
     * @ORM\OneToMany(targetEntity="LandingBannerImages",fetch="EAGER", mappedBy="bannerId",cascade={"persist"})
     */
    private $landingBannerImages;

    /**
     * @ORM\OneToMany(targetEntity="LandingPage",fetch="EAGER", mappedBy="landingPageBannerId",cascade={"persist"})
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getLandingBannerImages()
    {
        return $this->landingBannerImages;
    }

    /**
     * @param mixed $landingBannerImages
     */
    public function setLandingBannerImages($landingBannerImages)
    {
        $this->landingBannerImages = $landingBannerImages;
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


    public function addBannerImage(LandingBannerImages $landingBannerImages){
        if(!$this->landingBannerImages->contains($landingBannerImages)){
            $landingBannerImages->setBannerId($this);
            $this->landingBannerImages->add($landingBannerImages);
        }

    }



}