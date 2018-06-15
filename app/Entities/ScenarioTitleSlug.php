<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 13/06/2018
 * Time: 11:15 AM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_scenario_title_slug")
 */
class ScenarioTitleSlug
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="ScenarioTitle", inversedBy="scenarioTitleSlug")
     * @ORM\JoinColumn(name="title_id", referencedColumnName="id")
     */
    private $titleId;

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