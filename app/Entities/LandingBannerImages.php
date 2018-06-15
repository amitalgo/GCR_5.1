<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 10/05/2018
 * Time: 3:16 PM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="landing_banner_images")
 */
class LandingBannerImages
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
    private $title ;

    /**
     * @ORM\Column(type="text")
     */
    private $description ;

    /**
     * @ORM\Column(type="text")
     */
    private $mediaUrl;

    /**
     * @ORM\Column(type="boolean")
     */
    private $showButton;

    /**
     * @ORM\Column(type="string")
     */
    private $buttonText ;

    /**
     * @ORM\Column(type="string")
     */
    private $buttonUrl;

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
     * @ORM\ManyToOne(targetEntity="LandingBanner", inversedBy="landingBannerImages")
     * @ORM\JoinColumn(name="banner_id", referencedColumnName="id")
     */
    private $bannerId;

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
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param mixed $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * @return mixed
     */
    public function getShowButton()
    {
        return $this->showButton;
    }

    /**
     * @param mixed $showButton
     */
    public function setShowButton($showButton)
    {
        $this->showButton = $showButton;
    }

    /**
     * @return mixed
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }

    /**
     * @param mixed $buttonText
     */
    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;
    }

    /**
     * @return mixed
     */
    public function getButtonUrl()
    {
        return $this->buttonUrl;
    }

    /**
     * @param mixed $buttonUrl
     */
    public function setButtonUrl($buttonUrl)
    {
        $this->buttonUrl = $buttonUrl;
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
    public function getBannerId()
    {
        return $this->bannerId;
    }

    /**
     * @param mixed $bannerId
     */
    public function setBannerId($bannerId)
    {
        $this->bannerId = $bannerId;
    }



}