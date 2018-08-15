<?php
function checkLogin(){
	if(getSessionUser()===''){
		header("Location:login.php");
		die;

	}

	if(getCookieUser()===''){
		header("Location:login.php");
		die;

	}

}

function getSessionUser(){
	$user = $_SESSION['username']??'';
	return $user;
}

function checkLoginHome(){
	if(getSessionUser()!==''){
		header("Location:home.php");
		
	}
}

function getCookieUser(){
	$cookie = $_COOKIE['isLogined']??'';
	return $cookie;
}
?>