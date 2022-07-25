<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsersController extends Controller
{
    public  function showUserName(){
        return 'Mohammed Alhakmy';
    }

    public function getIndex(){
//        $data=[];
//        $data['id']=66;
//        $data['name']='Laptops';
//        $data['description']='My name is mohammed i well be frank with you';
//        $obj = new \stdClass();
//        $obj->name ='000000';
//        $obj->id =000;
//    $obj->description ='00001111222223333355555';
//        $data=['ahmed','enginer'];
//        $data=[];
        return view('welcome');

    }
}
