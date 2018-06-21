<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Services\CheckPermissionService;
use Validator;
class TagController extends Controller
{

    private $tagService,$checkPermissionService;

    public function __construct(TagService $tagService,CheckPermissionService $checkPermissionService){
        $this->tagService = $tagService;
        $this->checkPermissionService = $checkPermissionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tagService->tagList();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.tags', compact('tags','isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagService->getParentTags();
        return view('admin.tag', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Amit 21-06-18
        $request['tagSlug']=strtolower(preg_replace('/\s+/','-',trim($request->title)));

        Validator::make($request->all(),[
            "title" => "required"
        ]);
        $result = $this->tagService->tagAdd($request);
        if($result){
            return redirect()->route('admin.tags.index')->with('success-msg', 'Tag added successfully.');
        }else{
            return redirect()->route('admin.tags.index')->with('error-msg', 'Please check the form and submit again.');
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
        $tag = $this->tagService->getTag($id);
        $tags = $this->tagService->tagList();
        return view('admin.tag', compact('tag','tags'));
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
        //Amit 21-06-18
        $request['tagSlug']=strtolower(preg_replace('/\s+/','-',trim($request->title)));

        Validator::make($request->all(),[
            "title" => "required"
        ]);
        $result = $this->tagService->updateTag($request, $id);
        if($result){
            return redirect()->route('admin.tags.edit', ['tag'=>$id])->with('success-msg', 'Tag updated successfully.');
        }else{
            return redirect()->route('admin.tags.edit', ['tag'=>$id])->with('error-msg', 'Please check the form and submit again.');
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
        //
    }
}
