<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\TaiKhoanRequest;
use App\Model\TaiKhoan;
class TaiKhoanController extends Controller
{
    public function __construct(TaiKhoan $taiKhoan){
        $this->taiKhoan = $taiKhoan;
    }

    public function index(){
        $danhSachTaiKhoan = $this->taiKhoan->getAll();
        return view('admin.account.index',compact('danhSachTaiKhoan'));
    }

    public function formdangNhap(){
    	return view('admin.login');
    }

    public function kiemTraDangNhap(TaiKhoanRequest $request){
    	$tenDangNhap = $request->tendangnhap;
    	$matkhau = $request->password;
    	$infoTaiKhoan = $this->taiKhoan->thongTinTaiKhoan($tenDangNhap,$matkhau);
    	if($infoTaiKhoan==null){
    		session()->flash('msg','Đăng nhập thất bại!');
    		return view('admin.login');
    	}
    	else {
    		Session::put(['tenDangNhap'=>$infoTaiKhoan->TEN_DANG_NHAP,'quyen'=>$infoTaiKhoan->QUYEN,'hinhAnh'=>$infoTaiKhoan->HINH_ANH]);
    		return redirect()->route('sosadmin.trangchu');
    	}
    }
    public function xacNhanTaiKhoan($cmnd){
        $this->taiKhoan->xacNhanTaiKhoan($cmnd);
        return 'succcess';
    }
}
