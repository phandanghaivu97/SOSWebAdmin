<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;

class AddUser extends Controller
{
    public function __construct(User $user){
		$this->user=$user;
	}
    
}
