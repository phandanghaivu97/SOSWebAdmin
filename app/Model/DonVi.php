<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DonVi extends Model
{
    public function getAll(){
    	$data = DB::table('donvi')->get();
    	return $data;
    }
}
