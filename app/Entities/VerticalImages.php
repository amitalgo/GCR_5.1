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
 * @ORM\Table(name="vertical_images")
 */
class VerticalImages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="ScenarioTitle", inversedBy="verticalImages")
     * @ORM\JoinColumn(name="vertical_id", referencedColumnName="id")
     */
    private $verticalId;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

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
    public function getVerticalId()
    {
        return $this->verticalId;
    }

    /**
     * @param mixed $verticalId
     */
    public function setVerticalId($verticalId)
    {
        $this->verticalId = $verticalId;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }




}