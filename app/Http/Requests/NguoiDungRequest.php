<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungRequest extends FormRequest
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
            'ten' => 'required',
            'email' => 'required|email',
            'cmnd' => 'required|numeric|between:9,10',
            'matkhau' => 'required|between:8,16|alpha_num',
            'dienthoai' => 'required|between:10,13|numeric',
            'ngaysinh' => 'required|before:'.date('Y-m-d'),
            'hinhanh' => 'required',
        ];
    }
    public function messages(){
        return [
            'ten.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Sai định dạng email',
            'cmnd.required' => 'Vui lòng nhập số CMND',
            'cmnd.numeric' => 'Sai định dạng số CMND',
            'cmnd.between' => 'CMND không hợp lệ',
            'matkhau.required' => 'Mật khẩu không được để trống',
            'matkhau.between' => 'Độ dài mật khẩu phải từ 8-16 ký tự',
            'matkhau.alpha_num' => 'Mật khẩu chỉ bao gồm chữ và số',
            'dienthoai.required' => 'Vui lòng nhập số điện thoại',
            'dienthoai.between' => 'Độ dài từ 10-13 số',
            'dienthoai.numeric' => 'Sai định dạng số điện thoại',
            'ngaysinh.before' => 'Ngày sinh không hợp lệ',
            'hinhanh.required' => 'Vui lòng chọn hình ảnh',
        ];
    }
}
