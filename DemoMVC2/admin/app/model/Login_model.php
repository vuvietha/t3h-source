<?php
namespace App\Model;
require "app/configs/database.php";
use App\Config\Database;
use\PDO;

class LoginModel extends Database{
	function __construct(){
		parent::__construct();
	}

	public function checkLoginAdmin($user,$pass){
		$data = [];
		$sql = "SELECT * FROM admins WHERE username = :user AND password=:pass AND status = 1 LIMIT 1";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':user', $user, PDO::PARAM_STR);
			$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}
}