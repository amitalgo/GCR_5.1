<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 10/05/2018
 * Time: 3:25 PM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="landing_page")
 */
class LandingPage
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
     * @ORM\Column(type="string",length=500)
     */
    private $slug ;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $metaKey ;


    /**
     * @ORM\Column(type="string",length=500)
     */
    private $metaTitle ;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $metaDescription ;

    /**
     * @ORM\Column(type="text")
     */
    private $content ;

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
     * @ORM\ManyToOne(targetEntity="LandingBanner",fetch="EAGER", inversedBy="landingPageBanner")
     * @ORM\JoinColumn(name="banner_id", referencedColumnName="id")
     */
    private $landingPageBannerId;

    /**
     * @ORM\ManyToOne(targetEntity="LandingTheme",fetch="EAGER", inversedBy="landingTheme")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     */
    private $landingThemeId;

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
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * @param mixed $metaKey
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param mixed $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param mixed $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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
    public function getLandingPageBannerId()
    {
        return $this->landingPageBannerId;
    }

    /**
     * @param mixed $landingPageBannerId
     */
    public function setLandingPageBannerId($landingPageBannerId)
    {
        $this->landingPageBannerId = $landingPageBannerId;
    }

    /**
     * @return mixed
     */
    public function getLandingThemeId()
    {
        return $this->landingThemeId;
    }

    /**
     * @param mixed $landingThemeId
     */
    public function setLandingThemeId($landingThemeId)
    {
        $this->landingThemeId = $landingThemeId;
    }



}