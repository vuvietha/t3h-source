<?php 
namespace App\Controller;
if(!defined('APP_PATH')){
	die('can not access');
}
require 'app/model/product_model.php';
use App\Model\ProductModel;

class ProductController {
	private $pdModel;
	function __construct(){
		$this->pdModel = new ProductModel();
	}
	public function index(){
		//echo "Hello MVC";
		//require 'app/view/product/index_view.php';
		$data = $this->pdModel->getAllDataProducts();
		echo "<pre>";
		print_r($data);
	}

	public function detail(){
		//require 'app/view/product/detail_view.php';
		$idPd = $_GET['id'] ?? '';
		$idPd = is_numeric($idPd) ? $idPd : 0;
		$infoPd = $this->pdModel->getDataProductById($idPd);
		echo "<pre>";
		print_r($infoPd);
	}

	public function insert(){
		$insert = $this->pdModel->insertUserAdmin('admin','12345','admin@gmail.com',-1,1);
		if($insert){
			echo "Success";
		}else{
			echo "fail";
		}
	}

	public function update(){
		$update = $this->pdModel->updateDataUser('havv','9999',1);
		if($update){
			echo "Update success";
		}else{
			echo "Update fail";
		}

	}
	public function delete(){
		$del = $this->pdModel->deleteAdminById(1);
		if($del){
			echo "Delete success";
		}else{
			echo "Delete fail";
		}
	}
	public function testInnerJoin(){
		$id = $_GET['id'] ?? '';
		$id = is_numeric($id) ? $id : 0;
		$data = $this->pdModel->testInnerJoin($id);
		echo "<pre>";
		print_r($data);
	}

	public function testLikeSQL(){
		$data = $this->pdModel->testLikeSQL("ao");
		echo "<pre>";
		print_r($data);

	}
	public function testLimitSQL(){
		$data = $this->pdModel->testLimitSQL(0,3);
		echo "<pre>";
		print_r($data);
	}
	public function testBetweenSQL(){
		$data = $this->pdModel->testBetweenSQL(300000,500000);
		echo "<pre>";
		print_r($data);
	}
	function __call($r,$q){
		echo "Not Found request";
	}

}

$product = new ProductController;
$method = $_GET['m'] ?? 'index';
$product->$method();