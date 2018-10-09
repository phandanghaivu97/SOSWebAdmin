<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TaiKhoan extends Model
{
    public function thongTinTaiKhoan($tenDangNhap, $matKhau){    	
    	$data = DB::table('taikhoanadmin')->where(['TEN_DANG_NHAP'=>$tenDangNhap,'MAT_KHAU'=>$matKhau])->first();
    	return $data;
    }

    public function getAll(){
    	$data = DB::table('taikhoan_nguoidung')->select('SO_CMND','HO_VA_TEN','EMAIL','NGAY_DANG_KY','NGAY_KICH_HOAT','TINH_TRANG','DIEN_THOAI')->join('nguoidung','taikhoan_nguoidung.NGUOI_DUNG','=','nguoidung.SO_CMND')->paginate(5);
    	return $data;
    }

    public function xacNhanTaiKhoan($cmnd){
    	date_default_timezone_set("Asia/Bangkok");
    	DB::table('taikhoan_nguoidung')->where('NGUOI_DUNG',$cmnd)->update(['TINH_TRANG'=>'1','NGAY_KICH_HOAT'=>date('Y-m-d')]);
    }
}
