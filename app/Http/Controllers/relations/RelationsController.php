<?php

namespace App\Http\Controllers\relations;

use App\Models\phono;
use Illuminate\Http\Request;
use \App\User;
class RelationsController
{
    //

    public function hasOneRelation(){
        $user=User::with(['phono'=>function($sql){
            $sql->select('code','phono','user_id');
        }])->find(5);
//          $user->phono;
//       return $user->phono->code;
       return $user->phono->phono;
        return response()->json($user);
//\App\User::where('id',15)->first();
    }

    public function hasOneRelationRevers(){
//        return $phono = phono::find(5);

//        return  $phono = phono::select('code','id','phono','user_id')->find(5);


        //$phono = phono::find(5);
//        $phono = phono::with('user')->find(5);

        //$phono ->makeVisible(['user_id']); // make some attribaut visible

        $phono = phono::with(['user'=>function($sql){
            $sql->select('id','name');
        }])->find(5);


//        $phono->makeHidden(['code']); // make some attribaut Hidden


//        return $phono ->user; //return user of this number
//        return $phono->code;
        return $phono;

    }

    public function gethasphones(){
//      return  User::whereHas('phono')->get();
        return User::whereHas('phono',function ($q){
           $q->where('code','+967');
        })->get();


//        return User::whereDoesntHave('phono',function ($q){
//            $q->where('code','+967');
//        })->get();
    }

    public function getnothasphones(){
        return User::whereDoesntHave('phono')->get();
    }

    public function getUserWhereHasPhonoWithCondition(){
        return User::whereHas('phono',function ($q){
           $q->where('code','+967');
        })->get();
    }
}
