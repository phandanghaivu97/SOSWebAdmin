<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class APIModel extends Model
{
    public function kiemTraDangNhap($email, $password){
        return DB::table('taikhoan_nguoidung')->where(['EMAIL'=>$email,'MAT_KHAU'=>$password])->first();
    }

    public function kiemTraEmailTonTai($email){
        return DB::table('taikhoan_nguoidung')->where('EMAIL',$email)->first();
    }

    public function kiemTraTaiKhoanBiKhoa($email){
        return DB::table('taikhoan_block')->where('EMAIL',$email)->where('DEN_NGAY','>=',date('Y-m-d'))->first();
    }

    public function luuNguoiDung(Array $dataUser, Array $dataAccount){
        DB::table('nguoidung')->insert($dataUser);
        $id = DB::getPdo()->lastInsertId();
        $dataAccount['NGUOI_DUNG'] = $id;
        DB::table('taikhoan_nguoidung')->insert($dataAccount);
    }

    public function luuHoatDong(Array $data){
        DB::table('lichsu')->insert($data);
    }
}
