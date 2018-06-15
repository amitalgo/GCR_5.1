<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 13/06/2018
 * Time: 11:40 AM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_scenario_detail_slug")
 */
class ScenarioDetailSlug
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="ScenarioDetail", inversedBy="scenarioDetailSlug")
     * @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     */
    private $scenarioId;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $urlSlug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updDate;

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

}