<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdService;
use App\Services\PageBannerService;
use App\Services\SolutionTypeService;
use App\Services\ProductService;
use App\Services\TagService;
use App\Services\VerticalService;
use App\Services\QuickLinkService;
use Illuminate\Support\Facades\Route;
class SolutionPartnerController extends Controller
{
    protected $adService,$pageBannerService,$solutionTypeService,$productService, $tagService, $verticalService;
    protected $route,$page_id,$content,$banner,$solutions,$abouts,$quickDownloadLinks;
    public function __construct(AdService $adService,PageBannerService $pageBannerService,SolutionTypeService $solutionTypeService,ProductService $productService,TagService $tagService, VerticalService $verticalService,QuickLinkService $quickLinkService)
    {
        $this->adService = $adService;
        $this->pageBannerService =  $pageBannerService;
        $this->solutionTypeService = $solutionTypeService;
        $this->productService = $productService;
        $this->tagService = $tagService;
        $this->verticalService = $verticalService;
        $this->route = Route::current();
        $route_name = strpos($this->route->getName(), ".") !== false?substr($this->route->getName(),0 ,strpos($this->route->getName(), ".")):$this->route->getName();
        $this->page_id = $this->pageBannerService->getPageId($route_name);
        $this->content = $this->pageBannerService->getPageContent($this->page_id);
        $this->banner = $this->pageBannerService->getPageBanner($this->page_id);
        $this->solutions = $this->solutionTypeService->getIsActive();
          $this->quickLinkService = $quickLinkService;
        $apage_id = $this->pageBannerService->getPageId('about-GCR');
        $this->abouts = $this->pageBannerService->getPageContent($apage_id);
    }

    public function index()
    {
        $content = $this->content;
        $banner = $this->banner;
        $solutions = $this->solutions;
        $abouts = $this->abouts;
        $ads = $this->adService->getAdsByPage($this->page_id,2);
              $quickDownloadLinks = $this->quickLinkService->getQuickLinkByPage($this->page_id);
        $partners= "Channel Partners";
        return view('front-end.channelpartner',compact('banner','content','solutions','abouts','ads','partners','quickDownloadLinks'));
    }
}
