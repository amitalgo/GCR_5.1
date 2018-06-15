<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 09/02/2018
 * Time: 10:23 AM
 */

namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="tag_category_x")
 */
class TagCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ScenarioDetail", inversedBy="scenarioTagId", fetch="EAGER")
     * @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     */
    private $scenarioId;


    /**
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="tagScenarioId", fetch="EAGER")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     */
    private $tagId;

    /**
     * @ORM\Column(type="boolean",options={"unsigned":true, "default":1})
     */
    private $status;

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
    public function getScenarioId()
    {
        return $this->scenarioId;
    }

    /**
     * @param mixed $scenarioId
     */
    public function setScenarioId($scenarioId)
    {
        $this->scenarioId = $scenarioId;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * @param mixed $tagId
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;
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

}