<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|max:50|unique:offers,name_ar',
            'name_en' => 'required|max:50|unique:offers,name_en',
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',
        ];
    }


            public function messages(){
        return [
            'name_ar.required' => __('messages.offer name_ar required'),
            'name_en.required' => __('messages.offer name_en required'),
            'price.required' =>  __('messages.offer price.required'),
            'price.numeric' => __('messages.offer price.numeric'),
            'details_ar.required' =>  __('messages.offer details_ar.required'),
            'details_en.required' =>  __('messages.offer details_en.required'),
            'name_ar.max' =>  __('messages.offer name_ar.max'),
            'name_en.max' =>  __('messages.offer name_en.max'),
            'name_en.unique' => 'يحب ان يكون الاسم فريد من نوعه',
            'name_ar.unique' => 'يحب ان يكون الاسم فريد من نوعه',

        ];
}
}
