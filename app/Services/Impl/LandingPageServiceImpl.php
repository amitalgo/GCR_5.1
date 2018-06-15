<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 12:13 PM
 */

namespace App\Services\Impl;
use App\Entities\LandingPage;
use App\Services\LandingPageService;
use App\Services\LandingThemeService;
use App\Services\LandingBannerService;
use App\Repositories\LandingPageRepo;
class LandingPageServiceImpl implements LandingPageService
{

    private $theme,$banner,$landingPageRepo;
    public function __construct(LandingThemeService $themeService,LandingBannerService $bannerService,LandingPageRepo $landingPageRepo)
    {
       $this->theme = $themeService;
       $this->banner = $bannerService;
       $this->landingPageRepo = $landingPageRepo;
    }

    public function getAllLanding()
    {
        return $this->landingPageRepo->getAllLanding();
    }

    public function saveData($data)
    {

        $landingPage = new LandingPage();
        $landingPage->setLandingPageBannerId($this->banner->getBanner($data->get('banner')));
        $landingPage->setLandingThemeId($this->theme->getTheme($data->get('theme')));
        $landingPage->setTitle($data->get('title'));
        $landingPage->setSlug(str_slug($data->get('title'),'-'));
        $landingPage->setContent($data->get('content'));
        $landingPage->setMetaTitle($data->get('meta-title'));
        $landingPage->setMetaKey($data->get('meta-keyword'));
        $landingPage->setMetaDescription($data->get('meta-description'));
        $landingPage->setAttributes('');
        $landingPage->setIsActive(1);
        $landingPage->setCreatedAt( new \Datetime());
        $landingPage->setUpdatedAt(new \Datetime());
        return $this->landingPageRepo->saveData($landingPage);
    }

    public function updateData($data, $id)
    {
        $landingPage = $this->landingPageRepo->getLandingPage($id);
        $landingPage->setLandingPageBannerId($this->banner->getBanner($data->get('banner')));
        $landingPage->setLandingThemeId($this->theme->getTheme($data->get('theme')));
        $landingPage->setTitle($data->get('title'));
        $landingPage->setSlug(str_slug($data->get('title'),'-'));
        $landingPage->setContent($data->get('content'));
        $landingPage->setMetaTitle($data->get('meta-title'));
        $landingPage->setMetaKey($data->get('meta-keyword'));
        $landingPage->setMetaDescription($data->get('meta-description'));
        $landingPage->setAttributes('');
        $landingPage->setIsActive($data->get('active'));
        $landingPage->setCreatedAt( new \Datetime());
        $landingPage->setUpdatedAt(new \Datetime());
        return $this->landingPageRepo->saveData($landingPage);
    }

    public function getLandingPage($id)
    {
        return $this->landingPageRepo->getLandingPage($id);
    }

    public function getLandingPageBySlug($slug)
    {
        return $this->landingPageRepo->getLandingPageBySlug($slug);
    }
}