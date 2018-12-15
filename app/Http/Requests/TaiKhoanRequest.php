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
            'tendangnhap' => 'required|between:8,16|alpha_num',
            'password' => 'required|between:8,16|alpha_num',
        ];
    }
    public function messages(){
        return [
            'tendangnhap.required' => 'Trường này không được để trống',
            'password.required' => 'Trường này không được để trống',
            'tendangnhap.between' => 'Tài khoản phải từ 8-16 ký tự',
            'password.between' => 'Mật khẩu từ phải 8-16 ký tự',
            'tendangnhap.alpha_num' => 'Tài khoản không được chứa ký tự đặc biệt',
            'password.alpha_num' => 'Mật khẩu không được chứa ký tự đặc biệt',
        ];   
    }
}
