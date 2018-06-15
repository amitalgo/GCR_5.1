<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 30/03/2018
 * Time: 3:54 PM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="ad_pages")
 */
class AdsPages
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="pageAdsId")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $pageAds;


    /**
     * @ORM\ManyToOne(targetEntity="Ads", inversedBy="adsPageId")
     * @ORM\JoinColumn(name="ads_id", referencedColumnName="id")
     */
    private $adsPage;

    /**
     * @ORM\Column(type="string",options={"unsigned":true, "default":0})
     */
    private $deleted;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

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
    public function getPageAds()
    {
        return $this->pageAds;
    }

    /**
     * @param mixed $pageAds
     */
    public function setPageAds($pageAds)
    {
        $this->pageAds = $pageAds;
    }

    /**
     * @return mixed
     */
    public function getAdsPage()
    {
        return $this->adsPage;
    }

    /**
     * @param mixed $adsPage
     */
    public function setAdsPage($adsPage)
    {
        $this->adsPage = $adsPage;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
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




}