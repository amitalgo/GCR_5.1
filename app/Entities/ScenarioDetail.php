<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 08/02/2018
 * Time: 11:21 AM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_scenario_detail")
 */

class ScenarioDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ScenarioTitle", inversedBy="scenarioDetail")
     * @ORM\JoinColumn(name="title_id", referencedColumnName="id")
     */
    private $titleId;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="datetime")
     */
    private $updDate;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $urlSlug;

//    Amit 13-06-18
    /**
     * @ORM\OneToOne(targetEntity="ScenarioDetailSlug", mappedBy="scenarioId", fetch="EAGER", cascade={"persist"})
     */
    private $scenarioDetailSlug;

    /**
     * @ORM\OneToMany(targetEntity="ScenarioProduct", mappedBy="scenarioId",cascade={"persist"})
     */
    private $scenarioProductId;

    /**
     * @ORM\OneToMany(targetEntity="TagCategory", mappedBy="scenarioId",cascade={"persist"}, fetch="EAGER")
     */
    private $scenarioTagId;

    /**
     * @return mixed
     */

    private $image;

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
    public function getTitleId()
    {
        return $this->titleId;
    }

    /**
     * @param mixed $titleId
     */
    public function setTitleId($titleId)
    {
        $this->titleId = $titleId;
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
    public function getScenarioProductId()
    {
        return $this->scenarioProductId;
    }

    /**
     * @param mixed $scenarioProductId
     */
    public function setScenarioProductId($scenarioProductId)
    {
        $this->scenarioProductId = $scenarioProductId;
    }

    /**
     * @return mixed
     */
    public function getScenarioTagId()
    {
        return $this->scenarioTagId;
    }

    /**
     * @param mixed $scenarioTagId
     */
    public function setScenarioTagId($scenarioTagId)
    {
        $this->scenarioTagId = $scenarioTagId;
    }

    public function addScenarioTags(TagCategory $tagCategory){
        if(!$this->scenarioTagId->contains($tagCategory)){
            $tagCategory->setScenarioId($this);
            $this->scenarioTagId->add($tagCategory);
        }
    }

     public function getSelectedTagsByCategory(){
        $arr = [];
        foreach ($this->scenarioTagId as $category){
            $arr [] = $category->getTagId()->getId();
        }
        return $arr;

    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

     public function getScenarioImg(){
        foreach ($this->image as $img) {
            return $img->getFilePath();
        }
    }

    /**
     * @return mixed
     */
    public function getScenarioDetailSlug()
    {
        return $this->scenarioDetailSlug;
    }

    /**
     * @param mixed $scenarioDetailSlug
     */
    public function setScenarioDetailSlug($scenarioDetailSlug)
    {
        $this->scenarioDetailSlug = $scenarioDetailSlug;
    }
}