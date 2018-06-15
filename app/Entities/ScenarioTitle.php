<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 07/02/2018
 * Time: 4:17 PM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_scenario_title")
 */
class ScenarioTitle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string",length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priority;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $addNo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addDate;


    /**
     * @ORM\Column(type="integer")
     */
    private $updNo;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $urlSlug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updDate;

     /**
     * @ORM\OneToMany(targetEntity="ScenarioDetail", mappedBy="titleId", fetch="EAGER")
     */
    private $scenarioDetail;

//    Amit 13-06-18
    /**
     * @ORM\OneToOne(targetEntity="ScenarioTitleSlug", mappedBy="titleId", fetch="EAGER",cascade={"persist"})
     */
    private $scenarioTitleSlug;

    /**
     * @ORM\OneToOne(targetEntity="VerticalImages", mappedBy="verticalId",fetch="EAGER",cascade={"persist"})
     */
    private $verticalImages;
//
//    /**
//     * @ORM\OneToMany(targetEntity="SolutionTypeImageX", mappedBy="solutionTypeImageId")
//     * @var ArrayCollection|SolutionTypeImageX[]
//     */
//    private $solutionImage;
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

    /**
     * @return mixed
     */
    public function getUpdNo()
    {
        return $this->updNo;
    }

    /**
     * @param mixed $updNo
     */
    public function setUpdNo($updNo)
    {
        $this->updNo = $updNo;
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

    /**
     * @return mixed
     */
    public function getUrlSlug()
    {
        return $this->urlSlug;
    }

    /**
     * @param mixed $urlSlug
     */
    public function setUrlSlug($urlSlug)
    {
        $this->urlSlug = $urlSlug;
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
    public function getScenarioDetail()
    {
        return $this->scenarioDetail;
    }

    /**
     * @param mixed $scenarioDetail
     */
    public function setScenarioDetail($scenarioDetail)
    {
        $this->scenarioDetail = $scenarioDetail;
    }

    public function removeScenarioDetail($scenarioDetail){
        $this->scenarioDetail->removeElement($scenarioDetail);
    }

    /**
     * @return mixed
     */
    public function getVerticalImages()
    {
        return $this->verticalImages;
    }

    /**
     * @param mixed $verticalImages
     */
    public function setVerticalImages($verticalImages)
    {
        $this->verticalImages = $verticalImages;
    }

    /**
     * @return mixed
     */
    public function getScenarioTitleSlug()
    {
        return $this->scenarioTitleSlug;
    }

    /**
     * @param mixed $scenarioTitleSlug
     */
    public function setScenarioTitleSlug($scenarioTitleSlug)
    {
        $this->scenarioTitleSlug = $scenarioTitleSlug;
    }




//    /**
//     * @return mixed
//     */
//    public function getImage()
//    {
//        return $this->image;
//    }
//
//    /**
//     * @param mixed $image
//     */
//    public function setImage($image)
//    {
//        $this->image = $image;
//    }


//    /**
//     * @return mixed
//     */
//    public function getProductId()
//    {
//        return $this->productId;
//    }
//
//    /**
//     * @param mixed $productId
//     */
//    public function setProductId($productId)
//    {
//        $this->productId = $productId;
//    }
//
//    /**
//     * @return SolutionTypeImageX[]|ArrayCollection
//     */
//    public function getSolutionImage()
//    {
//        return $this->solutionImage;
//    }
//
//    /**
//     * @param SolutionTypeImageX[]|ArrayCollection $solutionImage
//     */
//    public function setSolutionImage($solutionImage)
//    {
//        $this->solutionImage = $solutionImage;
//    }



}