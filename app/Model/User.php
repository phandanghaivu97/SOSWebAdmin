<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    public function getByID($id){
    	$data = DB::table('nguoidung')->select('nguoidung.ID','HO_VA_TEN','SO_CMND','NGAY_SINH','EMAIL','DIEN_THOAI','NGAY_DANG_KY','TINH_TRANG','taikhoan_nguoidung.ID as TK_ID')->join('taikhoan_nguoidung','nguoidung.ID','=','taikhoan_nguoidung.NGUOI_DUNG')->where('nguoidung.ID',$id)->first();
    	return $data;
    }
    public function themUser($ten,$email,$cmnd,$matkhau,$dienthoai,$ngaysinh,$hinhanh){
    	DB::table('nguoidung')->insert(['HO_VA_TEN'=>$ten,'DIEN_THOAI'=>$dienthoai,'SO_CMND'=>$cmnd,'NGAY_SINH'=>$ngaysinh,'HINH_ANH'=>$hinhanh,'NGAY_DANG_KY'=>date('y-m-d')]);
        //last insert id
        $id = DB::getPdo()->lastInsertId();
    	DB::table('taikhoan_nguoidung')->insert(['EMAIL'=>$email,'MAT_KHAU'=>$matkhau,'TINH_TRANG'=>1,'NGAY_KICH_HOAT'=>date('y-m-d'),'NGUOI_DUNG'=>$id]);
    }
    public function getSuaNguoiDung($id){
        $data = DB::table('nguoidung')->select('nguoidung.ID','HO_VA_TEN','SO_CMND','NGAY_SINH','EMAIL','DIEN_THOAI','NGAY_DANG_KY','TINH_TRANG','taikhoan_nguoidung.ID as TK_ID','MAT_KHAU')->join('taikhoan_nguoidung','nguoidung.ID','=','taikhoan_nguoidung.NGUOI_DUNG')->where('nguoidung.ID',$id)->first();
        return $data;
    }
    public function SuaNguoiDung(Array $dataNguoiDung,Array $dataTaiKhoan,$idNguoiDung,$idTaiKhoan){
        $status = false;
        if($dataNguoiDung != null && $idNguoiDung != null){
            $status = true;
            // ham tra ve true khi co dong duoc thay doi
            DB::table('nguoidung')->where('ID',$idNguoiDung)->update($dataNguoiDung);
        }
        if($dataTaiKhoan != null && $idTaiKhoan != null){
            $status = true;
            DB::table('taikhoan_nguoidung')->where('ID',$idTaiKhoan)->update($dataTaiKhoan);
        }
        return $status;
    }
    public function getHistoryLocation($id){
        $data = DB::table('lichsu')->join('nguoidung','nguoidung.ID','=','lichsu.NGUOI_DUNG')->where('NGUOI_DUNG',$id)->get();
    	return $data;
    }

    public function layLichSu(){
        $data = DB::table('lichsu')->select('KINH_DO','VI_DO','THOI_GIAN')->get();
        return $data;
    }
}
