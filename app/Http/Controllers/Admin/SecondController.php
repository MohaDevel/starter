<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SecondController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth')->except('showMohammed0');
        $this->middleware('auth')->except('showMohammed1');
    }

    //
    public  function showString(){
        return 'Mohammed 777387891';
    }


    public  function  showMohammed(){
        return 'This is showMohammed';
    }

    public  function  showMohammed0(){
        return 'This is showMohammed0000';
    }

    public  function  showMohammed1(){
        return 'This is showMohammed1111';
    }

    public  function  showMohammed2(){
        return 'This is showMohammed2222';
    }
}
