<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\ProductNewSchemaService;
use App\Services\CheckPermissionService;
class ProductNewSchemaController extends Controller
{
   private $productNewSchemaService,$checkPermissionService, $productService;
    public function __construct(ProductNewSchemaService $productNewSchemaService,CheckPermissionService $checkPermissionService, ProductService $productService)
    {
       $this->productNewSchemaService = $productNewSchemaService;
       $this->checkPermissionService = $checkPermissionService;
       $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productNewSchemaService->getAllProducts();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.productsnewschema', compact('products','isAuthorize'));
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
        return $id;
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

    public function inquiry($id){
        $product = $this->productService->getProduct($id);
        return view('admin.productinquiries', compact('product'));
    }

    public function inquiryDetail($id, $inquiryId){
        $productInquiry = $this->productService->getProductInquiry($inquiryId);
        return view('admin.productinquiriesdetail', compact('productInquiry'));
    }
}
