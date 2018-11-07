<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Police;
use App\Model\DonVi;
class PoliceController extends Controller
{
    public function __construct(Police $police, DonVi $donVi){
        $this->police = $police;
        $this->donVi = $donVi;
    }
    public function index(){
    	$danhSach = $this->police->getAll();
    	return view('admin.police.index',compact('danhSach'));
    }
    public function getThemPolice(){
    	$dsDonVi = $this->donVi->getAll();
    	return view('admin.police.addPolice',compact('dsDonVi'));
    }
    public function postThemPolice(Request $request){
    	$sotaikhoan = $request->sotaikhoan;
        $ten = $request->ten;
        $tendangnhap=$request->tendangnhap;
        $matkhau = $request->matkhau;
        $hinhanh = $request->hinhanh;
        $donvi = $request->donvi;
        $ngaysinh = $request->ngaysinh;
        $hinhanh = $request->hinhanh;
        $this->police->themPolice($sotaikhoan,$ten,$tendangnhap,$matkhau,$hinhanh,$donvi);//2
        return redirect()->route('sosadmin.police.index');
    }
}
