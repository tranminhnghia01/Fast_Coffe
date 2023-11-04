<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|max:12',
            'email'=>'required',
            'address'=>'required',
            'city_id'=>'required',
            'province_id'=>'required',
            'ward_id'=>'required',
            'avatar' =>'image|mimes:png,jpg|max:2048'
        ];
    }
    public function messages()
    {
        return[
            'required' =>':attribute không được để trống',
        ];
    }
    // public function attributes()
    // {
    // }
}
