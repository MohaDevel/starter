<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
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
    public function store(Request $request)
    {
        //
//        return  $request;
        // validate data before insert to database

        // insert
        $rules=[
            'name' => 'required|max:10|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];

        $messages=$this->getMessages();
        $validator= Validator::make($request->all(),$rules,$messages);
        if($validator -> fails()){
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
//             return  $validator->errors();
//            return  $validator->errors()->first();
        }
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details
        ]);
        return  redirect()->back()->with(['success' => ' تم اضافه البيانا بنجاح ']);
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
        return Offer::select('id','name','price','details')->get();
    }

//    public function stores(){
////        Offer::create([
////            'name' => 'Mohammed',
////            'price' => '999',
////            'details' => 'This is Good',
////        ]);
//        return 'OK';
//    }

        public function getMessages(){
        return $messages=[ 'name.required' => __('messages.offer name required'),
            'price.required' =>  __('messages.offer price.required'),
            'price.numeric' => __('messages.offer price.numeric'),
            'details.required' =>  __('messages.offer details.required'),
            'name.max' =>  __('messages.offer name.max'),
            'name.unique' => 'يحب ان يكون الاسم فريد من نوعه'];
}
}
