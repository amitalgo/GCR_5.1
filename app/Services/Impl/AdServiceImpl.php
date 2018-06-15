<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Services\Impl;


use App\Entities\Ads;
use App\Entities\AdsPages;
use App\Entities\Page;
use App\Repositories\AdRepo;
use App\Services\AdService;
use App\Repositories\PageBannerRepo;
class AdServiceImpl implements AdService
{

    private $adRepo, $uploadService,$pageRepo;
    public function __construct(AdRepo $adRepo, UploadService $uploadService,PageBannerRepo $pageRepo){
        $this->adRepo = $adRepo;
        $this->uploadService = $uploadService;
        $this->pageRepo = $pageRepo;
    }

    public function getAllAds(){
        return $this->adRepo->findAll();
    }

    public function addAd($data){
        $ad = new Ads();
        $ad->setTitle($data->get('title'));
        $ad->setAddDetail($data->get('addDetail'));
        $ad->setDeleted(0);
        $ad->setIsActive(1);
        $ad->setCreatedAt(new \DateTime());
        $ad->setUpdatedAt(new \DateTime());

        // add adspage cr
        foreach ($data->get('pages') as $page){
            $adsPage = new AdsPages();
            $adsPage->setPageAds($this->pageRepo->getPageById($page));
            $adsPage->setDeleted(0);
            $adsPage->setIsActive(1);
            $ad->addPageAds($adsPage);
        }




        $image_url = $this->uploadService->UploadFile($data,'image','Ad/');
        if($image_url) {
            $ad->setImage($image_url);
        }
        return $this->adRepo->saveOrUpdate($ad);
    }

    public function updateAd($data, $id){
        $ad = $this->adRepo->findById($id);
        $ad->setTitle($data->get('title'));
        $ad->setAddDetail($data->get('addDetail'));
        $ad->setIsActive($data->get('active'));
        $ad->setDeleted(0);
        $ad->setUpdatedAt(new \DateTime());

        // // add adspage cr
        $adspages=$this->adRepo->findAdsById($ad);
        foreach ($adspages as $adspage) {
            $this->adRepo->removeAdsPage($adspage);
        }
        foreach ($data->get('pages') as $page){
            $adsPage = new AdsPages();
            $adsPage->setPageAds($this->pageRepo->getPageById($page));
            $adsPage->setDeleted(0);
            $adsPage->setIsActive(1);
            $ad->addPageAds($adsPage);
        }
        $image_url = $this->uploadService->UploadFile($data,'image','Testimonial/');
        if($image_url){
            $ad->setImage($image_url);
        }
        return $this->adRepo->saveOrUpdate($ad);
    }

    public function getActiveAd($id){
        return $this->adRepo->findById($id);
    }

    public function topAd($limit)
    {
        return $this->adRepo->topAd($limit);
    }

    public function getAdsByPage($page_id,$limit)
    {
        return $this->adRepo->getAdsByPage($page_id,$limit);
    }
}