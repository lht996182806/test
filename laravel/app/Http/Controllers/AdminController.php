<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
	*	后台首页
	*	/admin/index
    */
    public function index(){
        return view('login.info');
    }

}
