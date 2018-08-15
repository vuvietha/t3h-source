<?php

namespace App\Controller;
if(!defined('APP_PATH')){
	die('can not access');
}

class HomeController {
	public function index(){
		//echo "Hello MVC";
		require 'app/view/home/index_view.php';
	}
	function __call($r,$q){
		echo "Not Found request";
	}

}

$home = new HomeController;
$method = $_GET['m'] ?? 'index';
$home->$method();