<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 07/02/2018
 * Time: 6:24 PM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $tagName;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $urlSlug;

    /**
     * @var ArrayCollection|Tag[]
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="parent", fetch="EAGER")
     */
    private $children;

    /**
     * @var Tag
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="children", fetch="EAGER")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\Column(type="string",options={"unsigned":true, "default":0})
     */
    private $deleted;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="TagProduct", mappedBy="tagId",cascade={"persist"})
     */
    private $tagProductId;


    /**
     * @ORM\OneToMany(targetEntity="TagCategory", mappedBy="tagId",cascade={"persist"})
     */
    private $tagScenarioId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function __construct(){
        $this->children = new ArrayCollection();
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
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * @param mixed $tagName
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
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
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getTagProductId()
    {
        return $this->tagProductId;
    }

    /**
     * @param mixed $tagProductId
     */
    public function setTagProductId($tagProductId)
    {
        $this->tagProductId = $tagProductId;
    }

    /**
     * @return mixed
     */
    public function getTagScenarioId()
    {
        return $this->tagScenarioId;
    }

    /**
     * @param mixed $tagScenarioId
     */
    public function setTagScenarioId($tagScenarioId)
    {
        $this->tagScenarioId = $tagScenarioId;
    }

    /**
     * @return Tag[]|ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Tag[]|ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return Tag
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Tag $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function addChildren(Tag $tag){
        if(!$this->children->contains($tag)){
            $category->setParent($this);
            $this->children->add($tag);
        }
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