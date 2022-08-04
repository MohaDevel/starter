<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class CustomeAuthController extends Controller
{
    //

    public function Adulat(){

        return view('custome.index');
    }


    public function si00te(){
        return view('si00te');
    }
    public function admin(){
        return view('admin');
    }
    public function front(){
        return view('offers.front');
    }

    public function adminLogin(){
        return view('auth.adminLogin');
    }


    public function checkAdminLogin(Request $request){

        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]
        );
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
           return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
