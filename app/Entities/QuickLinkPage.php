<?php


namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;


/**
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="quick_link_page")
 **/
class QuickLinkPage{

	/**
	* @ORM\Id
	* @ORM\GeneratedValue
	* @ORM\Column(type="integer")
	**/
	private $id;

	/**
	* @ORM\ManyToOne(targetEntity="Page")
	* @ORM\JoinColumn(name="page_id", referencedColumnName="id")
	**/
	private $page;

	/**
	* @ORM\ManyToOne(targetEntity="QuickLink", inversedBy="quickLinkPages", fetch="EAGER")
	* @ORM\JoinColumn(name="quick_link_id", referencedColumnName="id")
	**/
	private $quickLink;

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
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getQuickLink()
    {
        return $this->quickLink;
    }

    /**
     * @param mixed $quickLink
     */
    public function setQuickLink($quickLink)
    {
        $this->quickLink = $quickLink;
    }

    
}