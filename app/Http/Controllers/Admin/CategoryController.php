<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VideoCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\CheckPermissionService;
use Validator;
class CategoryController extends Controller
{
    protected $categoryService,$checkPermissionService;
    public function __construct(CategoryService $categoryService,CheckPermissionService $checkPermissionService)
    {
        $this->categoryService = $categoryService;
        $this->checkPermissionService = $checkPermissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategory();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.category',compact('categories','isAuthorize'));
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
    public function store(VideoCategoryRequest $request)
    {
        
        $cat = $request->get('category');
        $result  = $this->categoryService->addCategory($cat);
        if($result){
            return redirect()->back()->with('success-msg', ' Category added successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoCategoryRequest $request, $id)
    {
        
        $result  = $this->categoryService->updateCategory($request);
        if($result){
            return redirect()->back()->with('success-msg', ' Category updated successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
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
