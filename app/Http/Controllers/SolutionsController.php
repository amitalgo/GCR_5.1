<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdService;
use App\Services\PageBannerService;
use App\Services\SolutionTypeService;
use App\Services\ProductService;
use App\Services\TagService;
use App\Services\VerticalService;
use App\Services\SolutionService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
class SolutionsController extends Controller
{
    protected $adService,$pageBannerService,$solutionTypeService,$productService,$verticalService,$solutionService;
    protected $route,$page_id,$content,$banner,$solutions,$abouts;
    public function __construct(AdService $adService,PageBannerService $pageBannerService,SolutionTypeService $solutionTypeService,ProductService $productService,TagService $tagService, VerticalService $verticalService,SolutionService $solutionService)
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
        $apage_id = $this->pageBannerService->getPageId('about-GCR');
        $this->abouts = $this->pageBannerService->getPageContent($apage_id);
         $this->solutionService = $solutionService;
    }

    public function index(Request $request,$solutionSlug)
    {
       $solution= $this->solutionService->getSolutionBySolutionSlug($solutionSlug);
       $solutionId=$solution->getTitleId()->getId(); //Amit 12-06-2018
        $content = $this->content;
        //$banner = $this->banner;
        $banners =  $this->pageBannerService->getVerticalBanner($solutionId);
        $banner =  json_decode($banners->getImage(),true);
        $abouts = $this->abouts;
        $sessionSolutions = Session::get('solutions');
        $selectedTags = Session::get('solutionTag');
        $solutiontags = $this->tagService->getSolutonTagsById($solutionId);
        $solutionObject = $this->solutionService->getSolutionParent($solutionId);
        $solutionName = $solutionObject->getName();
        $solutions = null!=$sessionSolutions?unserialize (serialize ($sessionSolutions)):$this->verticalService->getVertical($solutionId);
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        $request->session()->put('solutionId', $solutionId);
        $request->session()->put('tagId', NULL);
        $request->session()->put('solutionSlug',$solutionSlug); //Amit 14-05-18

        return view('front-end.catalog',compact('banner','content','solutions','abouts','solutiontags', 'selectedTags','ads','solutionName'));
    }

    public function product(Request $request,$slug){

        $scenarioDetails=$this->verticalService->getScenarioDetailBySlug($slug);
        $id=$scenarioDetails->getScenarioId()->getId();

        $content = $this->content;
        //$banner = $this->banner;
        $abouts = $this->abouts;
        $producttags = $this->productService->getProductTagsById($id);
        $scenarioDetail[] = $id;
        $sessionScenarioProducts = Session::get('scenarioProducts');
        $selectedTags = Session::get('productTag');
        $req['product-filter'] = $selectedTags;
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        $solutionId = Session::get('solutionId');
        $solutionSlug= Session::get('solutionSlug');
        $banners =  $this->pageBannerService->getVerticalBanner($solutionId);
        $banner =  json_decode($banners->getImage(),true);
        $tagId = Session::get('tagId');
        if($request->session()->has('productTag')){
            $scenarioDetail[] = $id;
            $scenarioProducts = $this->productService->getProductBySolutionDetailInAndProductIn($scenarioDetail, $req);
        }else{

            $scenarioProducts =$this->productService->getProductBySolutionDetailIn($scenarioDetail);
        }

        return view('front-end.products',compact('banner','content','abouts', 'scenarioProducts','producttags', 'selectedTags','ads', 'id','solutionId', 'solutionSlug' ,'tagId'));
    }

    public function filterProduct(Request $request,$id){
        return redirect()->route('solution.products', ['id'=>$id])->with(['productTag'=>$request['product-filter']]);
    }

    public function filterSolution(Request $request,$solutionSlug){

        $solution= $this->solutionService->getSolutionBySolutionSlug($solutionSlug);
        $id=$solution->gettitleId()->getId();

        $solutions = $this->verticalService->getVerticalBySolutionAndSolutionIn($id, $request);
         if(in_array('001',$request['solution-tag'])){
                   return redirect()->route('solution.index', ['id'=>$solutionSlug]);
        }else{
        return redirect()->route('solution.index', ['id'=>$solutionSlug])->with(['solutions'=>$solutions, 'solutionTag'=>$request['solution-tag']]);
    }
    }

    public function show(Request $request,$slug){

        $tagId=$this->tagService->getTagIdBySlug($slug); ////Amit 12-06-2018
        $id=$tagId->getId(); //Amit 12-06-2018

        $content = $this->content;
        $banner = $this->banner;
        $abouts = $this->abouts;
        $productTag = Session::get('productTag');
        if(null==$productTag){
            $data['product-filter'][] = $id;
            $selectedTags[] = $id;
        }else{
            $data['product-filter'] = $productTag;
            $selectedTags = $productTag;
        }
        if($request->session()->has('productTag')){
            $scenarioProducts = $this->productService->getProductByIdIn($data);
        }else {
            $scenarioProducts = null != $productTag ? Session::get('scenarioProducts') : $this->productService->getProductByIdIn($data);
        }
        //$producttags = $this->productService->getProductTags();
        
        $producttags = $this->productService->getRelatedProductTags($id);
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        $solutionTagName = $this->tagService->getTag($id);
        $tagName = $solutionTagName->getTagName();

        return view('front-end.productlists',compact('banner','content','scenarioProducts','abouts','producttags', 'selectedTags','ads','tagCategories','id', 'tagId','tagName'));
    }

    public function showSolution(Request $request,$id){
        return redirect()->route('solution.show', ['id'=>$id])->with(['productTag'=>$request['product-filter']]);
    }

     public function searchFilterSubmit(Request $request){
        //return $request->get('slug');die();
        return redirect()->route('solution.searchFilter', ['id'=>$request->get('slug')]);
    }

    public function searchFilter($slug){
        $content = $this->content;
        $banner = $this->banner;
        $abouts = $this->abouts;
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        $slugDatas = $this->solutionService->searchfilter($slug);
        return view('front-end.search-filter',compact('banner','content','abouts','ads','slugDatas','slug'));
    }
    public function showProduct($slug){

        $productDetail=$this->productService->getProductBySlug($slug);

        $id=$productDetail->getproductid()->getId();
        $content = $this->content;
        $banner = $this->banner;
        $abouts = $this->abouts;
        $ads = $this->adService->getAdsByPage($this->page_id,2);
        $scenarioProduct = $this->productService->getProduct($id);
        return view('front-end.show-product',compact('banner','content','abouts','ads','scenarioProduct'));
    }

}
