<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class IndexController extends Controller
{
    public function index(){
    	if(Session::get('tenDangNhap')==null)
    		return redirect()->route('sosadmin.dangnhap');
    	return view('admin.index');
    }
}
