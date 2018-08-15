<?php 
namespace App\Config;
use \PDO;

class Database {

	function __construct(){
		$this->connection();
	}

	function __destruct(){
		$this->disconnection();
	}

	protected $db;
	protected function connection (){
		try{
			$this->db = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8','root','');

			//giup bao loi khi viet sai cu phap
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//chong sql injection
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		}catch(PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();

		}
		return $this->db;
	}

	protected function disconnection(){
		//ngat ket noi den mysql bang pdo
		$this->db = null;
	}


}