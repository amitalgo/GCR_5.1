<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Services\Impl;


use App\Services\QuickLinkService;
use App\Repositories\QuickLinkRepo;
use App\Repositories\QuickLinkPageRepo;
use App\Repositories\PageBannerRepo;
use App\Entities\QuickLink;
use App\Entities\QuickLinkPage;

class QuickLinkServiceImpl implements QuickLinkService
{

    private $quickLinkRepo;
    private $quickLinkPageRepo;
    private $uploadService;

    public function __construct(QuickLinkRepo $quickLinkRepo, QuickLinkPageRepo $quickLinkPageRepo, UploadService $uploadService, PageBannerRepo $pageRepo){
        $this->quickLinkRepo = $quickLinkRepo;
        $this->quickLinkPageRepo = $quickLinkPageRepo;
        $this->uploadService = $uploadService;
        $this->pageRepo = $pageRepo;
    }

    public function getAllQuickLinks(){ 
        return $this->quickLinkRepo->findAllQuickLinks();
    }

    public function getQuickLink($id){
        return $this->quickLinkRepo->findQuickLink($id);
    }

    public function getAllActiveQuickLink(){
        return $this->quickLinkRepo->findActiveQuickLinks();
    }

    public function getQuickLinkByPage($pageId){
        return $this->quickLinkPageRepo->findQuickLinksByPage($pageId);
    }

    public function saveQuickLink($data){
        $quickLink = new QuickLink();
        $this->populateQuickLink($quickLink, $data);
        $quickLink->setCreatedAt(new \DateTime());
        return $this->quickLinkRepo->saveOrUpdate($quickLink);
    }

    public function updateQuickLink($data, $id){
        $quickLink = $this->quickLinkRepo->findQuickLink($id);
        $this->populateQuickLink($quickLink, $data);
        return $this->quickLinkRepo->saveOrUpdate($quickLink);
    }

    private function populateQuickLink($quickLink, $data){

        $mediaUrl = $this->uploadService->UploadFile($data,'file','Quick Link/');
        if($mediaUrl){
            $quickLink->setMediaUrl($mediaUrl);
        }
        $quickLink->setMimeType(NULL);
        $quickLink->setIsActive(isset($data['active'])?$data['active']:1);
        $quickLink->setTitle($data['title']);
        if(!$quickLink->getQuickLinkPages()->isEmpty()){
            $this->quickLinkPageRepo->removeQuickLinkPages($quickLink->getQuickLinkPages());
        }        
        $pages = $data['pages'];
        foreach ($pages as $page) {
            $quickLinkPage = new QuickLinkPage();
            $quickLinkPage->setPage($this->pageRepo->getPageById($page));
            $quickLink->addQuickLinkPages($quickLinkPage);
        }
        $quickLink->setUpdatedAt(new \DateTime());
    }
}
