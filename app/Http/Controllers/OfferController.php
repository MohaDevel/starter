<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Traits\OfferTraits;
use LaravelLocalization;
class OfferController extends Controller
{
    //

    use OfferTraits;

    public function create(){
        //view form to add this offer

        return view('ajaxoffers.create');

    }


    public function store(OfferRequest $request){
        //save offer into BD using AJAX

        // insset into DB

        $file_name=$this->saveImage($request -> photo,'images/offers');



        $offer = Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
if($offer){

    return response()->json([
        'status'=> true,
        'msg' =>'تم الحفظ بنجاح'
    ]);
}
else{

    return response()->json([
        'status'=> false,
        'msg' =>'لم بتم الحفظ'
    ]);
}
    }

    public function all(){
         $offers=Offer::select (
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
            'created_at',
            'updated_at',
            'photo'
        )->limit(10)->get();

        return view('ajaxoffers.all',compact('offers'));
    }

    public function delete(Request $request){
//        return $request;
        $offer  = Offer::find($request ->id);
        if(!$offer){
            return redirect()->back();
        }

        $offer->delete();
        return  response()->json([
            'status' => true,
            'msg' => 'Deleted Success',
            'id' => $request->id,
        ]);
    }

    public function edit(Request $request){
        $offer=Offer::find($request ->offer_id);
        //      Offer::findOrFail($offers_id);
        if(!$offer){
            return response()->json([
                'status' => false,
                '' => 'This is Not Found',
            ]);
        }
        $offer = Offer::select('id','price','name_ar','name_en','details_en','details_ar')->find($request ->offer_id);
        return  view('ajaxoffers.edit',compact('offer'));
    }

    public function update(Request $request){
//        return $request;

        $offer = Offer::find($request->id);
        if(!$offer){
            return response()->json([
               'status' => false,
               'msg' => 'هذه العرض غير موجود'
            ]);
        }
        $offer->update($request -> all());
//        $offer->update([
//            'name_ar' => $request->name_ar,
//            'name_en' => $request->name_en,
//            'price' => $request->price,
//            'details_en' => $request->details_en,
//            'details_ar' => $request->details_ar,
//        ]);
        return response()->json([
            'status' =>true,
            'msg' => 'Edited SuccessFully'
        ]);
    }
}
