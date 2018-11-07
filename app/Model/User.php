<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    public function getByCMND($cmnd){
    	$data = DB::table('nguoidung')->select('HO_VA_TEN','SO_CMND','NGAY_SINH','EMAIL','DIEN_THOAI','NGAY_DANG_KY','TINH_TRANG')->join('taikhoan_nguoidung','nguoidung.SO_CMND','=','taikhoan_nguoidung.NGUOI_DUNG')->where('SO_CMND',$cmnd)->first();
    	return $data;
    }
    public function themUser($ten,$email,$cmnd,$matkhau,$dienthoai,$ngaysinh,$hinhanh){
    	DB::table('nguoidung')->insert(['HO_VA_TEN'=>$ten,'DIEN_THOAI'=>$dienthoai,'SO_CMND'=>$cmnd,'NGAY_SINH'=>$ngaysinh,'HINH_ANH'=>$hinhanh,'NGAY_DANG_KY'=>date('y-m-d')]);
    	DB::table('taikhoan_nguoidung')->insert(['EMAIL'=>$email,'MAT_KHAU'=>$matkhau,'TINH_TRANG'=>1,'NGAY_KICH_HOAT'=>date('y-m-d'),'NGUOI_DUNG'=>$cmnd]);
    }

}
