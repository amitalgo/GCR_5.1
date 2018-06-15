<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;


 /**
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="quick_link")
 **/
class QuickLink{

	/**
	* @ORM\Id
	* @ORM\GeneratedValue
	* @ORM\Column(type="integer")
	**/
	private $id;

	/**
	* @ORM\Column(type="string", name="media_url")
	**/
	private $mediaUrl;

	/**
	* @ORM\Column(type="string", nullable=true, name="mime_type")
	**/
	private $mimeType;

	/**
	* @ORM\Column(type="string", length=200, name="title")
	**/
	private $title;

    /**
    * @ORM\Column(type="boolean", name="is_active")
    **/
    private $isActive;

	/**
	* @ORM\OneToMany(targetEntity="QuickLinkPage", mappedBy="quickLink", cascade={"persist"}, fetch="EAGER")
	**/
	private $quickLinkPages;

	/**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt;

    public function __construct(){
        $this->quickLinkPages = new ArrayCollection();
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
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param mixed $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

   
    /**
     * @param mixed $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getQuickLinkPages()
    {
        return $this->quickLinkPages;
    }

    /**
     * @param mixed $quickLinkPages
     */
    public function setQuickLinkPages($quickLinkPages)
    {
        $this->quickLinkPages = $quickLinkPages;
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
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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


    public function addQuickLinkPages(QuickLinkPage $quickLinkPage){
        if(!$this->quickLinkPages->contains($quickLinkPage)){
            $quickLinkPage->setQuickLink($this);
            $this->quickLinkPages->add($quickLinkPage);
        }
    }

    public function getSelectedPages(){
        $selectedPages = [];
        foreach ($this->quickLinkPages as $quickLinkPage) {
            $selectedPages[] = $quickLinkPage->getPage()->getId();
        }
        return $selectedPages;
    }

    public function getPages(){
        $selectedPageNames = [];
        foreach ($this->quickLinkPages as $quickLinkPage) {
            $selectedPageNames[] = $quickLinkPage->getPage()->getName();
        }
        return implode(',', $selectedPageNames);
    }

    public function getFileThumbNail()
    {
        $fileThumbNail = 'fa fa-file fa-2x';
        // $fileThumbNail = "";
        // $mimeType = mime_content_type($this->mediaUrl);
        // switch($mimeType){
        //     case 'application/pdf':
        //         $fileThumbNail = 'fa fa-file-pdf-o fa-2x';
        //         break;

        //     default:
        //         $fileThumbNail = 'images/pdf_icon.png';
        //         break;
        // }
        return $fileThumbNail;
    }
}