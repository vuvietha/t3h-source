<?php
namespace App\Model;
if(!defined('APP_PATH')){
	die('can not access');
}

require 'app/configs/database.php';
use App\Config\Database;
use \PDO;

class ProductModel extends Database{
	function __construct(){
		//Tu dong goi ket noi database tu class cha sang
		parent::__construct();
	}

	public function getAllDataProducts(){
		//Thuc hanh su dung pdo php lam viec voi database mysql
		$data = [];
		$sql = "SELECT * FROM products";

		//Bat dau kiem tra cau lenh sql có hop phap ko
		$stmt = $this->db->prepare($sql);

		if($stmt){
			//truoc khi thuc thi can kiem tra cac tham so truyen vao cau lenh sql (neu co)
			//thuc thi cau lenh sql
			if($stmt->execute()){
				//Kiem tra xem co dong du lieu nao tra ve khong
				if($stmt->rowCount()>0){
					//tra ve du lieu
					//fetchAll : lay tat du lieu, fetch: lay 1 dong du lieu, FETCH_ASSOC: tra lai mot mang khong tuan tu voi key la ten truong trong bang
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			//ngat ket noi toi prepare
			$stmt->closeCursor();
		}
		return $data;

	}

	public function getDataProductById($id=0){
		$data = [];
		$sql = "SELECT * FROM products WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			//kiem tra tham so truyen vao cau lenh sql
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);

			//thuc thi cau lenh
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);

				}

			}
			$stmt->closeCursor();
		}
		return $data;

	}
	public function insertUserAdmin($username, $pass, $email, $role, $status){
		$ct = date('Y-m-d H:i:s');
		$ut = null;
		$flag = false;
		$sql = "INSERT INTO admins(username,password,email,role,status,create_time,update_time) VALUES(:user,:pass, :email, :role, :status, :ct, :ut)";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':user',$username,PDO::PARAM_STR);
			$stmt->bindParam(':pass',$pass,PDO::PARAM_STR);
			$stmt->bindParam(':email',$email,PDO::PARAM_STR);
			$stmt->bindParam(':role',$role,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':ct',$ct,PDO::PARAM_STR);
			$stmt->bindParam(':ut',$ut,PDO::PARAM_STR);

			//thuc thi cau lenh
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;

	}

	public function updateDataUser($username, $pass, $id){
		$flag = false;
		$sql = "UPDATE admins SET username = :user, password= :pass WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':user',$username, PDO::PARAM_STR);
			$stmt->bindParam(':pass',$pass,PDO::PARAM_STR);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				$flag = true;
			}
			$stmt->closeCursor();
		}
		return $flag;
	}

	public function deleteAdminById($id){
		$flag = false;
		$sql = "DELETE FROM admins WHERE id= :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				$flag=true;
			}
			$stmt->closeCursor();
		}
		return $flag;
	}

	public function testInnerJoin($id){
		$data = [];
		$sql = "SELECT categories.name_cat, sizes.name_size  FROM products INNER JOIN categories ON products.cat_id = categories.id INNER JOIN sizes ON sizes.id = products.size_id WHERE products.id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}

			}
			$stmt->closeCursor();
		}
		return $data;
	}

	public function testLikeSQL($keyword,$table='products'){
		$data = [];
		$key = "%".$keyword."%";
		$sql = "SELECT * FROM {$table} AS a WHERE a.name_pd LIKE :keywords OR a.price_pd LIKE :keyword";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':keywords',$key, PDO::PARAM_STR);
			$stmt->bindParam(':keyword',$key, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}

	public function testLimitSQL($start, $limit){
		$data = [];
		$sql = "SELECT * FROM products limit :start, :limits";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':start',$start, PDO::PARAM_INT);
			$stmt->bindParam(':limits',$limit, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

				}

			}
			$stmt->closeCursor();
		}
		return $data;

	}

	public function testBetweenSQL($from, $to){
		$data =[];
		$sql = "SELECT * FROM products WHERE price_pd BETWEEN :froms AND :to";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':froms',$from, PDO::PARAM_INT);
			$stmt->bindParam(':to',$to, PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

				}

			}
			$stmt->closeCursor();
		}
		return $data;

	}
}