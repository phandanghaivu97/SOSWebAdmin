<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Police extends Model
{
    public function getAll(){
    	$data = DB::table('taikhoan_canhsat')->get();
    	return $data;
    }

    public function getDetail($id){
        $data = DB::table('taikhoan_canhsat')->where('SO_TAI_KHOAN',$id)->first();
    	return $data;
    }
    public function themPolice($ten,$tendangnhap,$matkhau,$hinhanh,$donvi){
    	DB::table('taikhoan_canhsat')->insert(['HO_VA_TEN'=>$ten,'TEN_DANG_NHAP'=>$tendangnhap,'MAT_KHAU'=>$matkhau,'HINH_ANH'=>$hinhanh,'NGAY_KICH_HOAT'=>date('y-m-d'),'TINH_TRANG'=>1,'DON_VI'=>$donvi]);
    }
    public function suaPolice($id, Array $data){
        DB::table('taikhoan_canhsat')->where('SO_TAI_KHOAN',$id)->update($data);
    }
}
