<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 15/06/2018
 * Time: 10:40 AM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="g_product_slug")
 */
class ProductSlug
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="productSlug")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;

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