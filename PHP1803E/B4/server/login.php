<?php
// //Kiem tra xem nguoi dung da bam vao button login chua 
// if(isset($_GET['btnSubmit'])){
// 	//Nhan thong tin tu phia form gui len
// 	$username = $_GET['txtuser']??'';
// 	$username = strip_tags($username); //Ham strip_tags xoa bo tat ca cac the html tranh loi xss
// 	$password = $_GET['txtpass']??'';
// 	$password = strip_tags($password);
// 	echo "username:{$username} -password: {$password}";

// }

if(isset($_REQUEST['btnSubmit'])){
	//Nhan thong tin tu phia form gui len
	$username = $_REQUEST['txtuser']??'';
	$username = strip_tags($username); //Ham strip_tags xoa bo tat ca cac the html tranh loi xss
	$password = $_REQUEST['txtpass']??'';
	$password = strip_tags($password);
	//echo "username:{$username} -password: {$password}";
	if(checkLogin($username,$password)){
		echo "success";
	}else{
		echo "fail";
	}
	

	
}

function checkLogin($user,$pass){
	$fp = fopen('../database/data.txt', 'a+');
	if($fp){
		$data = fread($fp, filesize('../database/data.txt'));
		fclose($fp);
		$arrData = explode(';', $data);
		if($arrData!==1){
			$input = "{$user}/{$pass}";
			if(in_array($input,$arrData)){
			return true;
			}

		}else{
			if($data==="{$user}/{$pass}"){
				return true;
			}
		}	
		
		return false;
		
	}
	return false;

}

?>