<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Police extends Model
{
    public function getAll(){
    	$data = DB::table('taikhoan_canhsat')->get();
    	return $data;
    }

    public function getDetail(){
    	
    }
}
