<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliceRequest extends FormRequest
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
            'ten' => 'required|unique:taikhoan_canhsat,HO_VA_TEN',
            'tendangnhap' => 'required|between:8,16',
            'matkhau' => 'required|between:8,16|alpha_num',
            'hinhanh' => 'required'
        ];
    }
    public function messages(){
        return [
            'ten.required' => 'Vui lòng nhập tên',
            'ten.unique' => 'Tên đã tồn tại, vui lòng đổi thành "vd: Họ tên (1)" để phân biệt',
            'tendangnhap.required' => 'Vui lòng nhập tên đăng nhập',
            'tendangnhap.between' => 'Sai định dạng tên đăng nhập',
            'matkhau.required' => 'Mật khẩu không được để trống',
            'matkhau.between' => 'Độ dài mật khẩu phải từ 8-16 ký tự',
            'matkhau.alpha_num' => 'Mật khẩu chỉ bao gồm chữ và số',
            'hinhanh.required' => 'Vui lòng chọn hình ảnh',
        ];
    }
}
