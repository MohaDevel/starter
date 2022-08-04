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


Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');


Route::get('fillable','CrudController@getOffers');


//Route::group(['prefix'=>'offers'],function (){
////    Route::get('stores','CrudController@stores');
//    Route::group(['prefix'=> LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){
//
//    });
//    Route::get('create','CrudController@create');
//    Route::post('store','CrudController@store')->name('offers.store');
//});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'offers'], function () {
        //   Route::get('store', 'CrudController@store');
        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name('offers.store');
        Route::get('edit/{offers_id}','CrudController@editOffer');
        Route::post('update/{offer_id}','CrudController@updateOffer')->name('offers.update');
        Route::get('delete/{offer_id}','CrudController@delete')->name('offers.delete');
        Route::get('all','CrudController@getAllOffers')->name('offers.all');
    });
    Route::get('youtube','CrudController@getVideo')->middleware('auth');



});


########################### Begin Ajax routes  #######################

Route::group(['prefix'=>'ajax-offers'],function (){

    Route::get('create','OfferController@create');

    Route::post('store','OfferController@store')->name('ajax.offersStore');

    Route::post('delete','OfferController@delete')->name('ajax.offersdelete');

    Route::get('all','OfferController@all')->name('ajaxoffers.all');



    Route::get('edit/{offer_id}','OfferController@edit')->name('ajax.offersedit');

    Route::post('update','OfferController@update')->name('ajaxoffers.update');
});





########################### End Begin Ajax routes  #######################




###########################  Begin Authentication && Guards #######################






Route::group(['middleware' =>'ChecAge','namespace'=>'Auth'],function (){
    Route::get('adult3','CustomeAuthController@Adulat')->name('adult3');
});

Route::get("/dashboard",function (){
   return 'Not Adoult';
})->name("not.adout");

Route::get('si00te','Auth\CustomeAuthController@site')->name('si00te');
Route::get('admin','Auth\CustomeAuthController@admin')->name('admin')->middleware('auth:web');
Route::get('admin/login','Auth\CustomeAuthController@adminLogin')->name('admin.login');
Route::post('admin/login','Auth\CustomeAuthController@checkAdminLogin')->name('save.admin.login');
Route::get('site','Auth\CustomeAuthController@site')->name('site')->middleware('auth:admin');;
Route::get('front','Auth\CustomeAuthController@front')->name('front');




########################### End  Begin Authentication && Guards   #######################
###########################   Begin Relations    #######################
Route::get('has-one','relations\RelationsController@hasOneRelation');


Route::get('has-one-relation','relations\RelationsController@hasOneRelationRevers');



Route::get('get-has-phone','relations\RelationsController@gethasphones');



Route::get('get-not-has-phone','relations\RelationsController@getnothasphones');



Route::get('get-use-has-phone-with-condition','relations\RelationsController@getUserWhereHasPhonoWithCondition');
###########################   End Relations    #######################


