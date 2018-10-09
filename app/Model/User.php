<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    public function getByCMND($cmnd){
    	$data = DB::table('nguoidung')->select('HO_VA_TEN','SO_CMND','NGAY_SINH','EMAIL','DIEN_THOAI','NGAY_DANG_KY')->join('taikhoan_nguoidung','nguoidung.SO_CMND','=','taikhoan_nguoidung.NGUOI_DUNG')->where('SO_CMND',$cmnd)->first();
    	return $data;
    }
}
