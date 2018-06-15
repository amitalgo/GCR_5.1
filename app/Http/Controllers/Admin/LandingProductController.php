<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CheckPermissionService;
use App\Services\LandingProductService;

class LandingProductController extends Controller
{
    private $checkPermissionService,$landingProductService;
    public function __construct(CheckPermissionService $checkPermissionService,LandingProductService $landingProductService){

        $this->checkPermissionService = $checkPermissionService;
        $this->landingProductService = $landingProductService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->landingProductService->getAllProducts();
        $isAuthorize = $this->checkPermissionService->checkPermission();

        return view('admin.landingProducts', compact('products','isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.landingproduct");
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
           "name" => "required",
            "vendor" => "required",
            "description" => "required",
            "productImage" => "required"
        ]);
        $result = $this->landingProductService->saveProduct($request);
        if($result){
            return redirect()->route('admin.landingproducts.index')->with('success-msg', 'Product added successfully.');
        }else{
            return redirect()->route('admin.landingproducts.index')->with('error-msg', 'Please check the form and submit again.');
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
        $product = $this->landingProductService->getProduct($id);
        return view("admin.landingproduct",compact('product'));
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
            "name" => "required",
            "vendor" => "required",
            "description" => "required",
        ]);
        $result = $this->landingProductService->updateProduct($request, $id);
        if($result){
            return redirect()->route('admin.landingproducts.edit',['landingproduct'=>$id])->with('success-msg', 'Product updated successfully.');
        }else{
            return redirect()->route('admin.landingproducts.edit',['landingproduct'=>$id])->with('error-msg', 'Please check the form and submit again.');
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
