<?php
namespace App\Model;
if(!defined('APP_PATH')){
	die('can not access');
}

require "app/configs/database.php";
use App\Config\Database;
use\PDO;

class ProductModel extends Database{
	function __construct(){
		parent::__construct();
	}
	public function updateDataById($namePd,$catPd, $sizePd, $price, $qty, $desPd, $imagePd,$id){
		$flag = false;
		$ut = date('Y-m-d H:i:s');
		$sql = "UPDATE products SET cat_id = :cat_id, size_id = :size_id, name_pd = :name_pd, image_pd = :image_pd, price_pd = :price_pd, qty_pd = :qty_pd, des_pd = :des_pd , update_time = :update_time WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':cat_id',$catPd, PDO::PARAM_INT);
			$stmt->bindParam(':size_id',$sizePd, PDO::PARAM_INT);
			$stmt->bindParam(':name_pd',$namePd, PDO::PARAM_STR);
			$stmt->bindParam(':image_pd',$imagePd, PDO::PARAM_STR);
			$stmt->bindParam(':price_pd',$price, PDO::PARAM_INT);
			$stmt->bindParam(':qty_pd',$qty, PDO::PARAM_INT);
			$stmt->bindParam(':des_pd',$desPd, PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$ut, PDO::PARAM_STR);
			$stmt->bindParam(':id',$id, PDO::PARAM_INT);
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;

	}
	public function checkEditNameByIdExists($namePd, $id){
		$flag = false;
		$sql = "SELECT name_pd FROM products WHERE id <> :idPd and  name_pd = :namePd";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':namePd',$namePd,PDO::PARAM_STR);
			$stmt->bindParam(':idPd',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$flag = true;
				}
			}
			$stmt->closeCursor();

		}
		return $flag;
	}
	public function getInfoDataById($idPd){
		$data = [];
		$sql = "SELECT * FROM products WHERE id = :idPd";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':idPd',$idPd,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();

		}
		return $data;

	}
	public function checkNamePdExists($namePd){
		$flag = false;
		$sql = "SELECT name_pd FROM products WHERE name_pd = :name_pd";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':name_pd',$namePd,PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$flag = true;
				}
			}
			$stmt->closeCursor();

		}
		return $flag;

	}
	public function getAllDataSizes(){
		$data = [];
		$sql = "SELECT * FROM sizes";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;

	}

	public function getAllDataCategories(){
		$data = [];
		$sql = "SELECT * FROM categories";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;

	}

	public function getAllDataProducts(){
		$data = [];
		$sql = "SELECT * FROM products";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}

	public function deleteProductById($id){
		$flag = false;
		$sql = "DELETE FROM products WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;
	}

	public function addDataProduct($namePd,$catPd, $sizePd, $price, $qty, $desPd, $imagePd){
		$flag = false;
		$sale_off = 0;
		$status = 1;
		$ct = date('Y-m-d H:i:s');
		$ut = null;
		$sql = "INSERT INTO products(cat_id, size_id, name_pd, image_pd, price_pd, sale_off, status_pd, qty_pd, des_pd,create_time , update_time) values(:cat_id, :size_id, :name_pd, :image_pd, :price_pd, :sale_off, :status_pd, :qty_pd, :des_pd,:create_time , :update_time) ";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':cat_id',$catPd, PDO::PARAM_INT);
			$stmt->bindParam(':size_id',$sizePd, PDO::PARAM_INT);
			$stmt->bindParam(':name_pd',$namePd, PDO::PARAM_STR);
			$stmt->bindParam(':image_pd',$imagePd, PDO::PARAM_STR);
			$stmt->bindParam(':price_pd',$price, PDO::PARAM_INT);
			$stmt->bindParam(':sale_off',$sale_off, PDO::PARAM_INT);
			$stmt->bindParam(':status_pd',$status, PDO::PARAM_INT);
			$stmt->bindParam(':qty_pd',$qty, PDO::PARAM_INT);
			$stmt->bindParam(':des_pd',$desPd, PDO::PARAM_STR);
			$stmt->bindParam(':create_time',$ct, PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$ut, PDO::PARAM_STR);
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;

	}


}