<?php
if(!defined('APP_PATH')){
	die('can not access');
}

class Route{
	public function home(){
		require_once 'app/controller/homeController.php';
	}
	public function product(){
		require_once 'app/controller/productController.php';
	}
	function __call($r,$q){
		echo "Not Found request";
	}

}

$route = new Route;
//index.php?c=home&m=index //quy uoc c la controller m la method
$c = $_GET['c'] ?? 'home';
$route->$c();