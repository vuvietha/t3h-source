<?php
namespace App\Controller;
require 'app/core/MY_Controller.php';
use  App\Core\MY_Controller;
if(!defined('APP_PATH')){
	die('can not access');
}

class SizeController extends MY_Controller{
	public function index(){
		//load xu ly du lieu
		//load header
		$header = [];
		$header['title'] = 'This is size';
		$header['content'] = 'This is size';
		$this->loadHeader($header);
		//require "app/view/dashboard/index_view.php";

		//Load content view
		$this->loadView("app/view/size/index_view.php");
		$this->loadFooter();
	}

}

$cat = new SizeController();
$method = $_GET['m'] ?? 'index';
$cat->$method();