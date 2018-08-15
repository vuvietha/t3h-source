<?php
session_start();

if(!defined('APP_PATH')){
	die('can not access');
}
//Nhung file constant 
require_once 'app/configs/constant.php';
require_once 'app/helpers/common_helper.php';

class Route {
	public function dashboard(){
		require_once 'app/controller/DashboardController.php';
	}
	public function login(){
		require_once 'app/controller/LoginController.php';
	}

	public function product(){
		require_once 'app/controller/ProductController.php';
	}
	public function categories(){
		require_once 'app/controller/CategoryController.php';
	}
	public function sizes(){
		require_once 'app/controller/SizeController.php';
	}
	function __call($r,$q){
		echo "Not Found Request";
	}

}

$route = new Route;
$controller = $_GET['c'] ?? 'login';
$route->$controller();