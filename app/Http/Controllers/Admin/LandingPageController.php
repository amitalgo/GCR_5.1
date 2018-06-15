<?php

namespace App\Http\Controllers\Admin;

use App\Services\Impl\LandingProductServiceImpl;
use App\Services\LandingProductService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\LandingBannerService;
use App\Services\LandingThemeService;
use App\Services\LandingPageService;
use App\Services\CheckPermissionService;
use App\Repositories\LandingProductRepo;
use App\Http\Requests\LandingPageRequest;
use Validator;
class LandingPageController extends Controller
{
   private $landingBannerService,$themeService,$landingPageService,$checkPermissionService;
   private  static $landingProductRepo;
   private static $landingProdService;
   public function __construct(LandingBannerService $landingBannerService,LandingThemeService $themeService,LandingPageService $landingPageService,CheckPermissionService $checkPermissionService,LandingProductRepo $landingProductRepo, LandingProductService $landingProductService)
   {
       $this->landingBannerService = $landingBannerService;
       $this->themeService = $themeService;
       $this->landingPageService = $landingPageService;
       $this->checkPermissionService = $checkPermissionService;
        self::$landingProductRepo = $landingProductRepo;
        self::$landingProdService = $landingProductService;

   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingPages = $this->landingPageService->getAllLanding();
        $isAuthorize = $this->checkPermissionService->checkPermission();
       
        return view('admin.landingpages', compact('landingPages','isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = $this->landingBannerService->getAllBanners();
        $themes = $this->themeService->getAllActiveThemes();
        return view('admin.landingpage',compact('banners','themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LandingPageRequest $request)
    {
        // $this->validate($request,[
        //     "title"=>"required",
        //     "content"=>"required",
        //     "theme"=>"required",
        //     "banner"=>"required",
        //     "meta-title"=>"required",
        //     "meta-keyword"=>"required",
        //     "meta-description"=>"required",
        // ]);
        $result  = $this->landingPageService->saveData($request);
        if($result){
            return redirect()->route('admin.landingpages.index')->with('success-msg', 'Landing Page added successfully.');
        }else{
            return redirect()->route('admin.landingpages.index')->with('error-msg', 'Please check the form and submit again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $banners = $this->landingBannerService->getAllActiveBanners();
        $themes = $this->themeService->getAllActiveThemes();
        $landingpage = $this->landingPageService->getLandingPage($id);
        return view('admin.landingpage',compact('banners','themes','landingpage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $this->validate($request,[
              "title" => "required|unique:App\Entities\LandingPage,title,".$id.",id,isActive,1",
             "content"=>"required",
             "theme"=>"required",
             "banner"=>"required",
             "meta-title"=>"required",
             "meta-keyword"=>"required",
             "meta-description"=>"required",
             "active"=>"required",
         ]);
        $result  = $this->landingPageService->updateData($request,$id);
        if($result){
            return redirect()->route('admin.landingpages.edit',['landingpages'=>$id])->with('success-msg', 'Landing Page updated successfully.');
        }else{
            return redirect()->route('admin.landingpages.edit',['landingpages'=>$id])->with('error-msg', 'Please check the form and submit again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public static function getTest($id) {
//        $products = self::$landingProductRepo->getAllProducts();
        $products = LandingProductServiceImpl::getProducts();
        dd($products);
//        return view('front-end.component.landingComponent.products');
    }
}
