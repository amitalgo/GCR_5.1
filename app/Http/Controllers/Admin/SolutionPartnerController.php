<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SolutionPartnerService;
use App\Services\CheckPermissionService;
use Validator;
class SolutionPartnerController extends Controller
{
    protected $solutionPartnerService,$checkPermissionService;
    public function __construct(SolutionPartnerService $partnerService,CheckPermissionService $checkPermissionService)
    {
        $this->solutionPartnerService = $partnerService;
        $this->checkPermissionService = $checkPermissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = $this->solutionPartnerService->getAllSolutionPartner();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.solutionPartner',compact('partners','isAuthorize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.createSolutionPartner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "title" => "required",
            "image" => 'required',
            "description" => "required"
        ]);
        $result = $this->solutionPartnerService->addSolutionPartner($request);
        if($result){
            return redirect()->route('admin.partners.index')->with('success-msg', 'Partner added successfully.');
        }else{
            return redirect()->route('admin.partners.index')->with('error-msg', 'Image is not set OR something went wrong.');
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
        $partner = $this->solutionPartnerService->getActiveSolutionPartner($id);
        return view('admin.createSolutionPartner',compact('partner'));
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
        Validator::make($request->all(),[
            "title" => "required",
            "description" => "required",
            "active" => "required"
        ]);
        $result = $this->solutionPartnerService->updateSolutionPartner($request,$id);
        if($result){
            return redirect()->route('admin.partners.edit',['partners'=>$id])->with('success-msg', 'Partner updated successfully.');
        }else{
            return redirect()->route('admin.partners.edit',['partners'=>$id])->with('error-msg', 'Something went wrong.');
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
