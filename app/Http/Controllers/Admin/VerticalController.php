<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CheckPermissionService;
use App\Services\VerticalService;
use Validator;
class VerticalController extends Controller
{

    private $verticalService,$checkPermissionService;
    public function __construct(VerticalService $verticalService,CheckPermissionService $checkPermissionService)
    {
        $this->verticalService = $verticalService;
        $this->checkPermissionService = $checkPermissionService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verticals = $this->verticalService->getAllVerticals();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.verticals',compact('verticals','isAuthorize'));
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
        $vertical = $this->verticalService->getVertical($id);
        return view('admin.verticalImage',compact('vertical'));
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
        Validator::make($request->all('files'),[
            "image" => "required",
        ]);
        $result = $this->verticalService->updateVertical($request,$id);
        if($result){
            return redirect()->route('admin.verticals.edit',['verticals'=>$id])->with('success-msg', 'Successfully Done');
        }else{
            return redirect()->route('admin.verticals.edit',['verticals'=>$id])->with('error-msg', 'Something went wrong.');
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
