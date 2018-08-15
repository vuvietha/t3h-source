<?php
namespace App\Controller;
if(!defined('APP_PATH')){
	die('can not access');
}

require 'app/core/MY_Controller.php';
require 'app/model/product_model.php';
use  App\Core\MY_Controller;
use App\Model\ProductModel;

class ProductController extends MY_Controller{
	private $pdModel;
	function __construct(){
		parent::__construct();
		$this->pdModel = new ProductModel();
		if(isset($_SESSION['errorAdd']) && !isset($_GET['state'])){
			unset($_SESSION['errorAdd']);
		}
		if(isset($_GET['state']) && $_GET['state']!=='exists'){
			unset($_SESSION['errNamePd']);
		}

	}
	public function handleEdit(){
		if(isset($_POST['btnEdit'])){
			//Lay thong tin cua form gui len
			$namePd = $_POST['namePd'] ?? '';
			$namePd = strip_tags($namePd);

			$catPd = $_POST['slcCat'] ?? '';
			$catPd = is_numeric($catPd) ? $catPd : 0;

			$sizePd = $_POST['slcSize'] ?? '';
			$sizePd = is_numeric($sizePd) ? $sizePd :0;

			$price = $_POST['pricePd'] ?? '';
			$price = strip_tags($price);
			$price = is_numeric($price) ? $price :0;

			$qty = $_POST['qtyPd'] ?? '';
			$qty = strip_tags($qty);
			$qty = is_numeric($qty) ? $qty :0;

			$desPd = $_POST['des_pd'] ?? '';

			//lay thong tin cua san pham
			$id = $_GET['id'] ??'';
			$id = is_numeric($id) ? $id : 0;
			$infoPd = $this->pdModel->getInfoDataById($id);
			
			$nameImage = $infoPd['image_pd'];
			//neu nguoi dung muon thay doi anh - kiem tra
			if(isset($_FILES['imagePd']) && !empty($_FILES['imagePd'])){
				if(isset($_FILES['imagePd']['name']) && !empty($_FILES['imagePd']['name'])){
					$nameImage = uploadFileData($_FILES['imagePd']);
				}
				
			}
			// echo $nameImage;
			// die;
			//validate data truoc khi update du lieu
			$dataErrors = validateAddProduct($namePd,$catPd, $sizePd, $price, $qty, $desPd, $nameImage);
			$checkEdit = true;
			foreach ($dataErrors as $key => $err) {
				if($err != ''){
					$checkEdit =false;
					break;
				}
				
			}
			//$checkEdit = true thi cho update
			if($checkEdit){				
				if(isset($_SESSION['editErr'])){
					unset($_SESSION['editErr']);
				}
				//Kiem tra xem ten san pham can thay doi co ton tai trong db hay khong. Neu co khong cho thay doi va nguoc lai
				$checkEditNamePd = $this->pdModel->checkEditNameByIdExists($namePd, $id);
				if($checkEditNamePd){
					//ten san pham da ton tai
					header("Location:?c=product&m=edit&id={$id}&state=err");
				}else{
					$up = $this->pdModel->updateDataById($namePd,$catPd, $sizePd, $price, $qty, $desPd, $nameImage, $id);
					if($up){
						header("Location:?c=product");
					}else{
						header("Location:?c=product&m=add&state=error");
					}

				}

			}else{			
				$_SESSION['editErr'] = $dataErrors;
				header("Location:?c=product&m=edit&id={$id}&state=fail");
			}

		}

	}
	//edit product
	public function edit(){
		//lay ra id cua tung san pham
		$idPd = $_GET['id'] ?? '';
		//lay ra thong tin cua san pham theo id
		$idPd = is_numeric($idPd) ? $idPd : 0;
		$infoPd = $this->pdModel->getInfoDataById($idPd);
		if(!empty($infoPd)){
			$data = [];
			$data['info'] = $infoPd;
			$data['lstCat'] = $this->pdModel->getAllDataCategories();
			$data['lstSize'] = $this->pdModel->getAllDataSizes();
			$header = [];
			$header['title'] = 'Edit Page';
			$header['content'] = 'Edit Page';
			$this->loadHeader($header);
			$this->loadView("app/view/product/edit_view.php",$data);
			$this->loadFooter();
			
		}else{
			//Chuyen sang trang not found 404
			$header = [];
			$header['title'] = 'Not Found Page';
			$header['content'] = 'Error Page';
			$this->loadHeader($header);
			$this->loadView("app/view/error/error_view.php");
			$this->loadFooter();


		}


	}
	public function index(){
		//Xu ly du lieu o day
		$data = [];
		$allPd = $this->pdModel->getAllDataProducts();
		$data['lstPd'] = $allPd;
		$data['name'] ='NVA';
		$data['age'] = 30;
		
		//load header
		$header = [];
		$header['title'] = 'This is product';
		$header['content'] = 'This is product';
		$this->loadHeader($header);
		//require "app/view/dashboard/index_view.php";

		//Load content view
		$this->loadView("app/view/product/index_view.php",$data);
		$this->loadFooter();
	}

	public function delete(){
		$id = $_POST['id'] ?? '';
		$id = is_numeric($id) ? $id : 0;
		//thuc thi xoa san pham
		if($id>0){
			$del = $this->pdModel->deleteProductById($id);
			if ($del){
				echo "OK";
			}else{
				echo "ERR";
			}

		}else{
			echo "ERR";
		}
	}
	public function add(){
		//xu ly data 
		$data = [];
		$data['lstCat'] = $this->pdModel->getAllDataCategories();
		$data['lstSize'] = $this->pdModel->getAllDataSizes();
		$data['errAdd'] = $_SESSION['errorAdd'] ?? [];
		$data['state'] = $_GET['state']??'';
		$data['errName'] = $_SESSION['errNamePd'] ?? '';
		//load header 
		$header = [];
		$header['title'] = "This is adding product";
		$header['content'] = "This is adding product";
		$this->loadHeader($header);
		$this->loadView("app/view/product/add_view.php",$data);
		$this->loadFooter();
	}

	public function handleAdd(){
		if(isset($_POST['btnSubmit'])){		
			$namePd = $_POST['namePd'] ?? '';
			$namePd = strip_tags($namePd);

			$catPd = $_POST['slcCat'] ?? '';
			$catPd = is_numeric($catPd) ? $catPd : 0;

			$sizePd = $_POST['slcSize'] ?? '';
			$sizePd = is_numeric($sizePd) ? $sizePd :0;

			$price = $_POST['pricePd'] ?? '';
			$price = strip_tags($price);
			$price = is_numeric($price) ? $price :0;

			$qty = $_POST['qtyPd'] ?? '';
			$qty = strip_tags($qty);
			$qty = is_numeric($qty) ? $qty :0;

			$desPd = $_POST['des_pd'] ?? '';

			//xu ly upload file
			$imagePd = null;
			if(isset($_FILES['imagePd'])){
				$imagePd = uploadFileData($_FILES['imagePd']);

			}

			//truoc khi insert data vao db can validate data

			$dataErrors = validateAddProduct($namePd,$catPd, $sizePd, $price, $qty, $desPd, $imagePd);

			$checkAdd = true;
			foreach ($dataErrors as $key => $err) {
				if($err != ''){
					$checkAdd =false;
					break;
				}
				
			}

			//neu $checkAdd = true => nguoi dung nhap du lieu hoan toan hop le => insert data vao db
			if($checkAdd){
				//can xoa bo di cac loi da luu o session
				if(isset($_SESSION['errorAdd'])){
					unset($_SESSION['errorAdd']);
				}
				//can kiem tra ten san pham moi them vao da ton tai trong db chua. neu chua thi cho them. ton tai thi khong cho them
				$checkNamePd = $this->pdModel->checkNamePdExists($namePd);
				if($checkNamePd){
					//Khong cho add them vi ten san pham da ton tai
					$_SESSION['errNamePd'] = $namePd;
					header("Location:?c=product&m=add&state=exists");

				}else{
					if(isset($_SESSION['errNamePd'])){
						unset($_SESSION['errNamePd']);
					}
					$add = $this->pdModel->addDataProduct($namePd,$catPd, $sizePd, $price, $qty, $desPd, $imagePd);
					if($add){
						header("Location:?c=product");
					}else{
						header("Location:?c=product&m=add&state=error");
					}

				}
				

			}else{
				//thong bao loi ra ngoai view de nguoi dung biet ho nhap sai du lieu o dau
				$_SESSION['errorAdd'] = $dataErrors;
				header("Location:?c=product&m=add&state=fail");
			}

		}
	}

}

$product = new ProductController();
$method = $_GET['m'] ?? 'index';
$product->$method();