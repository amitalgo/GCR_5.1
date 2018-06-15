<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CheckPermissionService;
use App\Services\QuickLinkService;
use App\Services\PageBannerService;
use Validator;
class QuickLinkController extends Controller
{
    private $checkPermissionService, $quickLinkService;
    public function __construct(CheckPermissionService $checkPermissionService, QuickLinkService $quickLinkService, PageBannerService $pages){
        $this->checkPermissionService = $checkPermissionService;
        $this->quickLinkService = $quickLinkService;
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $isAuthorize = $this->checkPermissionService->checkPermission();
        $quickLinks = $this->quickLinkService->getAllQuickLinks();
        return view('admin.quicklinks', compact('quickLinks', 'isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $pages = $this->pages->getAllPages();
        return view('admin.quicklink', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Validator::make($request->all(),[
            "title" => "required",
            "file" => 'required',
            "pages" => "required"
        ]);
        $result = $this->quickLinkService->saveQuickLink($request);
        if($result){
            return redirect()->route('admin.links.index')->with('success-msg', 'Quick Link added successfully.');
        }else{
            return redirect()->route('admin.links.index')->with('error-msg', 'Please check the form and submit again.');
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
    public function edit($id){
        $pages = $this->pages->getAllPages();
        $quickLink = $this->quickLinkService->getQuickLink($id);
        return view('admin.quicklink', compact('pages', 'quickLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        Validator::make($request->all(),[
            "title" => "required",
            "file" => 'required',
            "pages" => "required"
        ]);
        $result = $this->quickLinkService->updateQuickLink($request, $id);
        if($result){
            return redirect()->route('admin.links.index')->with('success-msg', 'Quick Download Link added successfully.');
        }else{
            return redirect()->route('admin.links.index')->with('error-msg', 'Please check the form and submit again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    }
}
