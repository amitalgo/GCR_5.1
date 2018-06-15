<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdService;
use App\Services\PageBannerService;
use App\Services\SolutionTypeService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Route;
use App\Services\VideosService;
use App\Services\CategoryService;
use App\Services\VerticalService;
class ExperienceCentreController extends Controller
{
    protected $adService,$pageBannerService,$solutionTypeService,$productService,$videoService,$categoryService;
    protected $route,$page_id,$content,$banner,$verticalService,$abouts,$video;
    public function __construct(AdService $adService,PageBannerService $pageBannerService,VerticalService $verticalService,ProductService $productService,VideosService $videosService,CategoryService $categoryService)
    {
        $this->adService = $adService;
        $this->pageBannerService =  $pageBannerService;
        $this->verticalService = $verticalService;
        $this->productService = $productService;
        $this->videoService = $videosService;
        $this->categoryService = $categoryService;
        $this->route = Route::current();
        $route_name = strpos($this->route->getName(), ".") !== false?substr($this->route->getName(),0 ,strpos($this->route->getName(), ".")):$this->route->getName();

        $this->page_id = $this->pageBannerService->getPageId($route_name);
        $this->content = $this->pageBannerService->getPageContent($this->page_id);
        $this->banner = $this->pageBannerService->getPageBanner($this->page_id);
        $this->verticalService =   $this->verticalService->getIsActive();

        $apage_id = $this->pageBannerService->getPageId('about-GCR');
        $this->abouts = $this->pageBannerService->getPageContent($apage_id);
    }

    public function index()
    {
        $content = $this->content;
        $banner = $this->banner;
       // $solutions = $this->verticalService;
        $abouts = $this->abouts;
        //$videos = $this->videoService->getActiveVideosByLimit(3);
        $categories = $this->categoryService->getAllActiveCategory();
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        return view('front-end.experiencecentre',compact('banner','content','abouts','categories','ads'));
    }

    public function show($id){

        $content = $this->content;
        $banner = $this->banner;
        $solutions = $this->verticalService;
        $abouts = $this->abouts;
        //$category = $this->categoryService->findCategory($id);
       // $videos = $this->videoService->getVideoByCatId($id);
        $category = $this->categoryService->findCategoryBySlug($id);
        $videos = $this->videoService->getVideoByCatId($category->getId());
        return view('front-end.exeperiencecentres',compact('banner','content','solutions','abouts','videos','category'));

    }
}
