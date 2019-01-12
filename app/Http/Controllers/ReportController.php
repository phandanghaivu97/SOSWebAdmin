<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Model\Report;
class ReportController extends Controller
{
    public function __construct(Report $report){
        $this->report = $report;
    }
    public function index(){
    	$danhSach = $this->report->getname();
    	return view('admin.report.index',compact('danhSach'));
    }
    public function timKiem(Request $request){
    	$keyWord = $request->search;
    	$danhSach = $this->report->timKiem($keyWord);
    	return view('admin.report.index',compact('danhSach'));
    }
    public function getDetail($id){
    	$danhSach = $this->report->getname();
    	$danhSachChiTiet = $this->report->getDetail($id);
    	return view('admin.report.index',compact('danhSach','danhSachChiTiet'));
    }

}
