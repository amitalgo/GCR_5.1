<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CheckPermissionService;
use App\Services\LandingBannerService;
class LandingBanner extends Controller
{
    private $landingBannerService,$checkPermissionService;
    public function __construct(CheckPermissionService $checkPermissionService,LandingBannerService $landingBannerService)
    {
        $this->landingBannerService = $landingBannerService;
        $this->checkPermissionService = $checkPermissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->landingBannerService->getAllBanners();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.landingbanners', compact('banners','isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landingbanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           "title" =>"required",
            "bannerimage-title" =>"required",
            "description" =>"required",
            "image" =>"required",
            "banner_image_description" =>"required",
        ]);
        $result  = $this->landingBannerService->saveData($request);

        if($result){
            return redirect()->route('admin.landingbanners.index')->with('success-msg', 'Carousal added successfully.');
        }else{
            return redirect()->route('admin.landingbanners.index')->with('error-msg', 'Please check the form and submit again.');
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
        $banner = $this->landingBannerService->getBanner($id);
        return view('admin.landingbanner',compact('banner'));
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
            "title" =>"required",
            "bannerimage-title" =>"required",
            "description" =>"required",
        ]);

        $result  = $this->landingBannerService->updateData($request,$id);

        if($result){
            return redirect()->route('admin.landingbanners.edit',['landingbanners'=>$id])->with('success-msg', 'Carousal added successfully.');
        }else{
            return redirect()->route('admin.landingbanners.edit',['landingbanners'=>$id])->with('error-msg', 'Please check the form and submit again.');
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
        $result =  $this->landingBannerService->deleteBannerCarousel($id);
        if($result){
             $resp = ['title'=>'Success','text'=>'Carousel Deleted Successfully'];
        }else {
            $resp = ['title'=>'Error','text'=>'Something Went Wrong'];
        }
        echo json_encode($resp);
    }


    public function dynamicForm(){
        return view('admin.Form.landingBannerForm');
    }

}
