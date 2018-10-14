<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Report extends Model
{
    public function getName(){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGUOI_BI_BAO_CAO',DB::raw('COUNT(NGUOI_BI_BAO_CAO) as SO_LAN'))->join('nguoidung','danhsachbaocao.NGUOI_BI_BAO_CAO','=','nguoidung.SO_CMND')->groupBy('NGUOI_BI_BAO_CAO','HO_VA_TEN')->orderBy('SO_LAN','desc')->get();
    	return $data;
    }
    public function timKiem($keyWord){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGUOI_BI_BAO_CAO',DB::raw('COUNT(NGUOI_BI_BAO_CAO) as SO_LAN'))->join('nguoidung','danhsachbaocao.NGUOI_BI_BAO_CAO','=','nguoidung.SO_CMND')->groupBy('NGUOI_BI_BAO_CAO','HO_VA_TEN')->orderBy('SO_LAN','desc')->where('HO_VA_TEN','like',"%$keyWord%")->get();
    	return $data;
    }
    public function getDetail($cmnd){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGAY_BAO_CAO','GHI_CHU')->join('nguoidung','danhsachbaocao.NGUOI_BAO_CAO','=','nguoidung.SO_CMND')->where('NGUOI_BI_BAO_CAO',$cmnd)->get();
    	return $data;
    }
}
