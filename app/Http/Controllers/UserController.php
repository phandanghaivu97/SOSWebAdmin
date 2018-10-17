<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Model\User;
class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    public function thongTinChiTiet($cmnd){
    	$info = $this->user->getByCMND($cmnd);
    	return view('admin.users.detail',compact('info'));
    }
    public function getThemNguoiDung(){

    	return view('admin.account.addNguoidung');
    }
    public function postThemNguoiDung(Request $request){
        $ten = $request->ten;
        $email=$request->email;
        $cmnd = $request->cmnd;
        $matkhau = $request->matkhau;
        $dienthoai = $request->dienthoai;
        $ngaysinh = $request->ngaysinh;
        $hinhanh = $request->hinhanh;
        $this->user->themUser($ten,$email,$cmnd,$matkhau,$dienthoai,$ngaysinh,$hinhanh);//2
        return redirect()->route('sosadmin.taikhoan.index');
    }

}
