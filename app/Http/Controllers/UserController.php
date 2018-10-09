<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Model\User;
class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    public function thongTinChiTiet($cmnd){
    	$info = $this->user->getByCMND($cmnd);
    	return view('admin.users.detail',compact('info'));
    }
    
}
