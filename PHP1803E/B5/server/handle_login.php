<?php
$username = $_POST['user']??'';
$username = strip_tags($username);

$password = $_POST['pass']??'';
$password = strip_tags($password);

if($username==='' or $password===''){
	echo "EMPTY";
}else{
	if($username==='admin' && $password==='123'){
		echo "OK";

	}else{
		echo "ERR";
	}
}

?>