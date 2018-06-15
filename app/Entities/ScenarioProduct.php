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
 * @ORM\Table(name="g_scenario_product")
 */
class ScenarioProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productScenarioId", fetch="EAGER")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;


    /**
     * @ORM\ManyToOne(targetEntity="ScenarioDetail",fetch="EAGER", inversedBy="scenarioProductId")
     * @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     */
    private $scenarioId;


    /**
     * @ORM\Column(type="integer")
     */
    private $addNo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addDate;


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
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
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



}