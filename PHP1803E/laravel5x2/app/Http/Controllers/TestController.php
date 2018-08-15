<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	function __construct(){
		//Khai bao - su dung middelware o day
		//$this->middleware('checkLoginUser:user');
		//$this->middleware('checkLoginUser:user')->only('check');
		//$this->middleware('checkLoginUser:user')->except('check');
		$this->middleware('checkLoginUser:user')->only('check','abc');
	}
	public function check(){
		return "Demo middleware Controller";
	}
    public function show(){
    	return "Hello World";
    }

    public function abc(){
    	return "abc";
    }
}
