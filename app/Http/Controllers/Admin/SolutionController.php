<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SolutionService;
use App\Services\CheckPermissionService;
use App\Services\TagService;
use Validator;
class SolutionController extends Controller
{
    protected $solutionService,$checkPermissionService,$tagService;
    public function __construct(SolutionService $solutionService,CheckPermissionService $checkPermissionService,TagService $tagService)
    {
        $this->solutionService = $solutionService;
        $this->checkPermissionService = $checkPermissionService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = $this->solutionService->getAllSolution();
        $isAuthorize = $this->checkPermissionService->checkPermission();
        return view('admin.solutions',compact('solutions','isAuthorize'));
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
        $stag = $this->solutionService->getSolutionById($id);
        $linkedTag = $this->solutionService->findSolutionInSolutionTag($id);
        $tags = $this->tagService->getActiveTags();
        return view('admin.solutionTags',compact('stag','tags','linkedTag'));
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
            "tags"=>"required",
            "solution"=>"required"
        ]);
        $result = $this->solutionService->addUpdateSolutionTag($request,$id);
        if($result){
            return redirect()->route('admin.solutions.index')->with('success-msg', 'Tags Added successfully.');
        }else{
            return redirect()->route('admin.solutions.index')->with('error-msg', 'Please check the form and submit again.');
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
