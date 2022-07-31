<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Events\videoViwere;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\vedio;
use App\Traits\OfferTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Mcamara\LaravelLocalization\LaravelLocalization;
use LaravelLocalization;
class CrudController extends Controller
{
    use OfferTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        //return  $request;
        // validate data before insert to database

        // insert
//        $messages=$this->getMessages();
//        $rules=$this->getRules();
//        $validator= Validator::make($request->all(),$rules,$messages);
//        if($validator -> fails()){
//            return  redirect()->back()->withErrors($validator)->withInput($request->all());
////             return  $validator->errors();
////            return  $validator->errors()->first();
//        }
        // Save file photo in folder

        $file_name=$this->saveImage($request -> photo,'images/offers');
//        $file_extension = $request->photo->getClientOriginalExtension();
//        $file_name = time().'.'.$file_extension;
//        $path = 'images/offers';
//        $request->photo->move($path,$file_name);
        Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        return  redirect()->back()->with(['success' => ' تم اضافه البيانا بنجاح ']);
    }

    public function updateOffer(OfferRequest $request,$offer_id){
        $offer = Offer::find($offer_id);
        if(!$offer){
            return redirect()->back();
        }
//        $offer->update($request -> all());
        $offer->update([
           'name_ar' => $request->name_ar,
           'name_en' => $request->name_en,
           'price' => $request->price,
           'details_en' => $request->details_en,
           'details_ar' => $request->details_ar,
       ]);
        return  redirect()->back()->with(['success'=>'تم التحديث بنحاح']);
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
        //
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
        //
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

    public function getOffers(){
        return Offer::select('id','name_ar','name_en','price','details_ar','details_en')->get();
    }

//    public function stores(){
////        Offer::create([
////            'name' => 'Mohammed',
////            'price' => '999',
////            'details' => 'This is Good',
////        ]);
//        return 'OK';
//    }

//        public function getMessages(){
//        return $messages=[ 'name.required' => __('messages.offer name required'),
//            'price.required' =>  __('messages.offer price.required'),
//            'price.numeric' => __('messages.offer price.numeric'),
//            'details.required' =>  __('messages.offer details.required'),
//            'name.max' =>  __('messages.offer name.max'),
//            'name.unique' => 'يحب ان يكون الاسم فريد من نوعه'];
//}


//        public function getRules(){
//            return $rules=[
//                'name' => 'required|max:10|unique:offers,name',
//                'price' => 'required|numeric',
//                'details' => 'required',
//            ];
//        }


public function getAllOffers(){
     $offers=Offer::select (
         'id',
         'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
         'price',
         'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
         'created_at',
         'updated_at',
         'photo'
     )->get();

     return view('offers.all',compact('offers'));
}

public function editOffer($offers_id){
   $offer=Offer::find($offers_id);
  //      Offer::findOrFail($offers_id);
    if(!$offer){
        return redirect()->back();
    }
    $offer = Offer::select('id','price','name_ar','name_en','details_en','details_ar')->find($offers_id);
    return  view('offers.edit',compact('offer'));
}


public function getVideo(){
        $Vedios = vedio::first();
        event(new videoViwere($Vedios));
        return view('vodie')->with('video',$Vedios);
}

}
