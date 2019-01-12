<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Model\Police;
use App\Http\Requests\PoliceRequest;
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
    //cac ham them moi
    public function getThemPolice(){
    	$dsDonVi = $this->donVi->getAll();
    	return view('admin.police.addPolice',compact('dsDonVi'));
    }
    public function postThemPolice(PoliceRequest $request){
        $ten = $request->ten;
        $tendangnhap=$request->tendangnhap;
        $matkhau = $request->matkhau;
        $hinhanh = $request->hinhanh;
        $donvi = $request->donvi;
        $this->police->themPolice($ten,$tendangnhap,$matkhau,$hinhanh,$donvi);//2
        return redirect()->route('sosadmin.police.index');
    }
    //cac ham sua
    public function getSuaPolice($id){
        $data = $this->police->getDetail($id);
        $dsDonVi = $this->donVi->getAll();
        return view('admin.police.edit',compact('dsDonVi','data'));
    }

    public function postSuaPolice(Request $request){
        $id = $request->id;
        $ten = $request->tene;
        $tendangnhap=$request->tendangnhap;
        $matkhau = $request->matkhau;
        $hinhanh = $request->hinhanhe;
        $donvi = $request->donvi;
        $data  = array('HO_VA_TEN'=>$ten,'TEN_DANG_NHAP'=>$tendangnhap,'MAT_KHAU'=>$matkhau,'DON_VI'=>$donvi);
        $this->police->suaPolice($id,$data);
        return redirect()->route('sosadmin.police.index');
    }
}
