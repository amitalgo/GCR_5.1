<?php

namespace App\Http\Controllers\Admin;

use App\Entities\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CountryService;
use App\Services\NewsService;

use App\Services\Impl\UploadService;
use App\Entities\NewsAttachment;

use Illuminate\Support\Facades\Storage;
use App\Services\CheckPermissionService;
use App\Services\PageBannerService;
use Validator;
use App\Http\Requests\NewsRequest;
class NewsController extends Controller
{
    private $countryService,$checkPermissionService,$pages;
    protected $newsService;
    protected $mul;
    public function __construct(CountryService $countryService,NewsService $newsService,UploadService $mul,CheckPermissionService $checkPermissionService,PageBannerService $pages)
    {
        $this->countryService=$countryService;
        $this->newsService=$newsService;
        $this->mul=$mul;
        $this->checkPermissionService = $checkPermissionService;
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('admin.newsmulti');exit;

        $news=$this->newsService->getAllNews();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        $pages = $this->pages->getAllPages();
        return view('admin.news',compact('news','isAuthorize','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = $this->pages->getAllPages();
        $countries= $this->countryService->getAllActiveCountry();
        return view('admin.createNews',['countries'=>$countries,'pages'=>$pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
       

        $result = $this->newsService->addNews($request);
        if($result){
            return redirect()->route('admin.news.index')->with('success-msg', 'News added successfully.');
        }else{
            return redirect()->route('admin.news.index')->with('error-msg', 'Image is not set OR something went wrong.');
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
        $news = $this->newsService->getActiveNews($id);
//        var_dump($news);exit;

        $countries= $this->countryService->getAllActiveCountry();
        $pages = $this->pages->getAllPages();
        return view('admin.createNews',compact('news','countries','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {

       // var_dump($request->all());exit;

    
        $result = $this->newsService->updateNews($request,$id);

        if($result){
            return redirect()->route('admin.news.edit',['news'=>$id])->with('success-msg', 'News updated successfully.');
        }else{
            return redirect()->route('admin.news.edit',['news'=>$id])->with('error-msg', 'Something went wrong.');
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
        $result = $this->newsService->deleteImgMedia($id);

        echo $result;

    }

    public function dynamicForm($id=null){
        $id = $this->newsService->getActiveNews($id);
       return view('admin.Form.eventForm',compact('id'));
    }


}
