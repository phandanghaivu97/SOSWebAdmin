<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\TaiKhoan;
class IndexController extends Controller
{
    public function __construct(TaiKhoan $taiKhoan){
        $this->taiKhoan = $taiKhoan;
    }
    public function index(){
        $data = $this->taiKhoan->taiKhoanChuaXanNhanaaaaaaaaa();
    	return view('admin.index',compact('data'));
    }
}
