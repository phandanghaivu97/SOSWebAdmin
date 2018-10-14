<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Police;

class PoliceController extends Controller
{
    public function __construct(Police $police){
        $this->police = $police;
    }
    public function index(){
    	$danhSach = $this->police->getAll();
    	return view('admin.police.index',compact('danhSach'));
    }
}
