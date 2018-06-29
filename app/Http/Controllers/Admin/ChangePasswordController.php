<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/06/2018
 * Time: 12:35 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.changepassword',compact('session'));
    }

    public function chkoldPass(Request $request){
        print_r(Hash::check($request['oldPass']));
        exit;
        $result = $this->userService->chkPass($request);
        echo $result;

    }
}