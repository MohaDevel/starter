<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
//Route::get('/', function () {
//    return view('welcome')->with([
//                                        'data' => 'this data is',
//                                        'mohammed_Alhakmy' => '777387891',
//                                        'age' => 87,
//                                        ]);
//});

Route::get('/', function () {
//    $data=[];
//    $data['id']=66;
//    $data['name']='Laptops';
//    $data['description']='My name is mohammed i well be frank with you';
//    $objd = new \stdClass();
//    $objd->name ='000000';
//    $objd->id =000;
//    $obj->description ='00001111222223333355555';
    return view('welcome');
});
Route::get('/test',function (){
    return 'testing1';
})->name("b");

Route::get('/test1{id?}',function (){
    return 'testing5';
})->name("c");
Route::get('/test2{id?}',function (){
    return 'this is id is ';
})->name("d");
Route::namespace('Front')->group(function (){
    // all route only access controller or method in folder name Front
    Route::get('users','UsersController@showUserName');
});
//Route::group(['prefix' => 'users','middleware' => 'auth'],function (){
Route::group(['prefix' => 'users','middleware' => 'auth'],function (){
    Route::get('/',function (){
        return 'Angry';
    });
//   Route::get('show','UsersController@showUserName');
});
Route::get('check',function (){
   return 'middleware';
})->middleware('auth');
Route::get('second','Admin\SecondController@showString');
Route::group(['namespace' => 'Admin'],function (){
   Route::get('showMoh','SecondController@showMohammed')->middleware('auth');
   Route::get('showMoh0','SecondController@showMohammed0');
   Route::get('showMoh1','SecondController@showMohammed1');
   Route::get('showMoh2','SecondController@showMohammed2');
});
Route::get('login',function (){
    return 'يحب عليك الدخول ';
})->name('login');
//Route::resource('news','NewsController');
Route::get('index','Front\UsersController@getIndex');
Route::get('/land',function (){
   return view('landing');
});
Route::get('/abous',function (){
   return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
