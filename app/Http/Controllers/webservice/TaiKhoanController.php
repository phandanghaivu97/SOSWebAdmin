<?php

namespace App\Http\Controllers\webservice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TaiKhoan;
class TaiKhoanController extends Controller
{
    public function __construct(TaiKhoan $taiKhoan){
        $this->taiKhoan = $taiKhoan;
    }

    public function dangNhap($email,$password){
        $data = $this->taiKhoan->thongTinTaiKhoanUser($email,$password);
        if($data == null)
            echo '0';
        else
            echo '1';
    }

    public function dangKy(Request $request){
        $
    }
}
