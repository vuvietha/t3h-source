<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'namePd' => 'required|min:3|max:60',
            'catid'  => 'numeric',
            'sizeid' => 'numeric',
            'pricepd' =>'numeric',
            'qtypd' => 'numeric',
            'imagepd' => 'required|mimes:jpeg,bmp,png,gif,jpg',
            'despd' =>'required|min:3'
        ];
    }

    public function messages(){
        return [
            'namePd.required' => ':attribute khong duoc de trong',
            'namePd.min' => ':attribute khong duoc nho hon :min ki tu',
            'namePd.max' => ':attribute khong duoc lon hon :max ki tu',
            'catid.numeric' => 'vui long chon category',
            'sizeid.numeric' => 'vui long chon size',
            'pricepd.numeric' => 'vui long nhap gia tien',
            'qtypd.numeric' => 'vui long nhap so luong san pham',
            'imagepd.mimes' => 'Dinh dang file khong dung',
            'despd.required' => ':attribute khong duoc de trong',
            'despd.min' => ':attribute khong duoc nho hon :min ki tu'

        ];

    }
}
