<?php

namespace App\Http\Controllers;

use App\Services\VerticalService;
use Illuminate\Http\Request;
use App\Services\AdService;
use App\Services\PageBannerService;
use App\Services\SolutionTypeService;
use Illuminate\Support\Facades\Route;
use App\Services\VideosService;
use App\Services\ClientTestimonialService;
use App\Services\SolutionPartnerService;
use App\Services\TagService;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $adService,$solutionPartnerService,$clientTestimonialService,$videoService,$solutionService,$pageBannerService;


    public function __construct(AdService $adService,PageBannerService $pageBannerService,VerticalService $solutionTypeService,VideosService $videosService,ClientTestimonialService $clientTestimonialService,SolutionPartnerService $solutionPartnerService,TagService $tagService)
    {
        $this->adService = $adService;
        $this->pageBannerService =  $pageBannerService;
        $this->solutionService = $solutionTypeService;
        $this->videoService = $videosService;
        $this->clientTestimonialService = $clientTestimonialService;
        $this->solutionPartnerService = $solutionPartnerService;
        $this->tagService = $tagService;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $route = Route::current();
          $page_id = $this->pageBannerService->getPageId($route->getName());
          $content = $this->pageBannerService->getPageContent($page_id);
          $banner = $this->pageBannerService->getPageBanner($page_id);
          $ads = $this->adService->getAdsByPage($page_id,2);
          $solutions = $this->solutionService->getIsActive();
          $videos = $this->videoService->getActiveCorporateVideos();
          $testimonials = $this->clientTestimonialService->getAllActiveTestimonial();
          $partners=  $this->solutionPartnerService->getAllActiveSolutionPartner();

          $page_id = $this->pageBannerService->getPageId('about-GCR');
          $abouts = $this->pageBannerService->getPageContent($page_id);

          return view('front-end.home',compact('ads','banner','content','solutions','videos','testimonials','partners','abouts'));
    }

    public function tagGenerator()
    {
        
        //Scenario Table
        $verticals = $this->solutionService->getAllVerticals();
        foreach($verticals as $vertical){
            $id=$vertical->getId();
            $data['verticalSlug']=strtolower(preg_replace('/\s+/','-',trim($vertical->getName())));
            $result=$this->solutionService->tagGenerator($data,$id);
        }

        echo 'Vertical Slug Generator SuccessFully.......';


        //Tag Table
        $tags = $this->tagService->getActiveTags();
        foreach($tags as $tag){
            $id=$tag->getId();
            $data['tagSlug']=strtolower(preg_replace('/\s+/','-',trim($tag->getTagName())));
            $result=$this->tagService->tagGenerator($data,$id);
        }
        echo 'Tag Slug Generator SuccessFully.......';

    }


}
