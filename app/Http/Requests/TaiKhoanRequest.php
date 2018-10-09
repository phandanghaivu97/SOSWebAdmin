<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiKhoanRequest extends FormRequest
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
            'tendangnhap' => 'required',
            'password' => 'required',
        ];
    }
    public function messages(){
        return [
            'tendangnhap.required' => 'Trường này không được để trống',
            'password.required' => 'Trường này không được để trống',
        ];   
    }
}
