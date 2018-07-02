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

        $id = $request['id'];

        $res = $this->userService->getUserById($id);
        $hashedPassword=$res->getpassword();
        $oldPassword = $request['oldPass'];

        if (Hash::check($oldPassword, $hashedPassword))
        {
            echo 1;
        }else{
            echo 0;
        }
        exit;
    }

    public function update(Request $request){
        $this->validate($request,[
            "newPass" => "min:6|required_with:cNewPass|same:cNewPass",
            "cNewPass"=>"min:6",
        ]);

        $result = $this->userService->changepassword($request);
        if($result){
            return redirect()->route('admin.changepassword')->with('success-msg', ' Password updated successfully.');
        }else{
            return redirect()->route('admin.changepassword')->with('error-msg', 'Something went wrong.');
        }

        exit;

    }
}