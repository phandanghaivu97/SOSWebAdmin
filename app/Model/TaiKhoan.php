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

    public function thongTinTaiKhoanUser($tenDangNhap, $matKhau){
        $data = DB::table('taikhoan_nguoidung')->where(['EMAIL'=>$tenDangNhap,'MAT_KHAU'=>$matKhau])->first();
        return $data;
    }
    //danh sach tai khoan chua duoc xac nhan
    public function taiKhoanChuaXanNhan(){
        $data = DB::table('taikhoan_nguoidung')->select('nguoidung.ID','SO_CMND','HO_VA_TEN','EMAIL','NGAY_DANG_KY','TINH_TRANG','DIEN_THOAI')->join('nguoidung','taikhoan_nguoidung.NGUOI_DUNG','=','nguoidung.ID')->where('TINH_TRANG',0)->paginate(5);
        return $data;
    }
    public function getAll(){
    	$data = DB::table('taikhoan_nguoidung')->select('nguoidung.ID','SO_CMND','HO_VA_TEN','EMAIL','NGAY_DANG_KY','NGAY_KICH_HOAT','TINH_TRANG','DIEN_THOAI','taikhoan_nguoidung.ID as TK_ID')->join('nguoidung','taikhoan_nguoidung.NGUOI_DUNG','=','nguoidung.ID')->where('TINH_TRANG',1)->get();
    	return $data;
    }
    public function getById($id){
        return DB::table('taikhoan_nguoidung')->select('ID','EMAIL')->where('ID',$id)->first();
    }
    public function xacNhanTaiKhoan($id){
    	date_default_timezone_set("Asia/Bangkok");
    	return DB::table('taikhoan_nguoidung')->where('ID',$id)->update(['TINH_TRANG'=>'1','NGAY_KICH_HOAT'=>date('Y-m-d')]);
    }
    public function khoaTaiKhoan(Array $data){
        DB::table('taikhoan_block')->insert($data);
    }

}
