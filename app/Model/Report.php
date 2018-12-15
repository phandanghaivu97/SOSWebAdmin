<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Report extends Model
{
    public function getName(){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGUOI_BI_BAO_CAO',DB::raw('COUNT(NGUOI_BI_BAO_CAO) as SO_LAN'))->join('nguoidung','danhsachbaocao.NGUOI_BI_BAO_CAO','=','nguoidung.ID')->groupBy('NGUOI_BI_BAO_CAO','HO_VA_TEN')->orderBy('SO_LAN','desc')->get();
    	return $data;
    }
    public function timKiem($keyWord){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGUOI_BI_BAO_CAO',DB::raw('COUNT(NGUOI_BI_BAO_CAO) as SO_LAN'))->join('nguoidung','danhsachbaocao.NGUOI_BI_BAO_CAO','=','nguoidung.ID')->groupBy('NGUOI_BI_BAO_CAO','HO_VA_TEN')->orderBy('SO_LAN','desc')->where('HO_VA_TEN','like',"%$keyWord%")->get();
        return $data;
    }
    public function getDetail($id){
    	$data = DB::table('danhsachbaocao')->select('HO_VA_TEN','NGAY_BAO_CAO','GHI_CHU','KINH_DO','VI_DO','NGUOI_BI_BAO_CAO')->join('nguoidung','danhsachbaocao.NGUOI_BI_BAO_CAO','=','nguoidung.ID')->where('NGUOI_BI_BAO_CAO',$id)->get();
    	return $data;
    }
}
