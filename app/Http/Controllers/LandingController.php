<?php

namespace App\Http\Controllers;

use App\Services\PageBannerService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\LandingPageService;
class LandingController extends Controller
{
    protected $pageBannerService;
    public function __construct(LandingPageService $landingPageService,PageBannerService $pageBannerService)
    {
        $this->landingPageService = $landingPageService;
        $this->pageBannerService = $pageBannerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showLandingPage($slug){
        $apage_id = $this->pageBannerService->getPageId('about-GCR');
        $abouts = $this->pageBannerService->getPageContent($apage_id);
        $page = $this->landingPageService->getLandingPageBySlug($slug);
        $content = $page->getContent();
        $view = $page->getLandingThemeId()->getView();
        return view('front-end.landingPage.'.$view, compact('content', 'page','abouts'))->withShortcodes();
    }
}
