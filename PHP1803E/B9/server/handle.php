<?php
session_start();

require_once '../helper/common_helper.php';

if(isset($_POST['btnSubmit'])){
	//Lay du lieu
	$user = $_POST['user']??'';
	$user = strip_tags($user);

	$pass = $_POST['pass']??'';
	$pass = strip_tags($pass);

	$email = $_POST['email']??'';
	$email = strip_tags($email);

	$phone = $_POST['phone']??'';
	$phone = strip_tags($phone);

	//validate du lieu
	$arrErrors = validateAddUser($user,$pass,$email,$phone);
	$checkFlag = true;
	foreach ($arrErrors as $key => $err) {
		if($err!=''){
			$checkFlag = false;
			break;
		}
	}
	if($checkFlag){
		//Du lieu hop le hoan toan
		if(isset($_SESSION['errors'])){
			unset($_SESSION['errors']);
		}
		header("Location:../login.php");
	}else{
		//Thong bao loi ra ngoai view
		$_SESSION['errors'] = $arrErrors;
		header("Location:../index2.php?state=fail");
	}

}


?>