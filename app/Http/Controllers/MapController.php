<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index($lat, $lng){
    	return view('admin.map.index',compact('lat','lng'));
    }
}
