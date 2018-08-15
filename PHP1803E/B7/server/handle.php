<?php
session_start();

if(isset($_POST['btnLogin'])){
	//lay du lieu tu form gui len
	$user = $_POST['txtUser']??'';
	$user = strip_tags($user);

	$pass = $_POST['txtPass']??'';
	$pass = strip_tags($pass);

	//valide du lieu
	if($user===''||$pass===''){
		header("Location:../login.php?state=fail");
	}else{
		if($user==='admin'&&$pass==='123'){
			//tao cac session
			$_SESSION['username'] = $user;
			//cho phep di vao trang home.php
			header("Location:../home.php");
		}else{
			header("Location:../login.php?state=err");

		}
	}

}

?>