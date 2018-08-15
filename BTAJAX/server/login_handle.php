<?php
$email = $_POST['email']??'';
$email = strip_tags($email);
$password = $_POST['password']??'';
$password = strip_tags($password);
if($email===''||$password===''){
	echo "Empty";
}else{
	$check = checkLogin($email,$password);
	echo $check;
}

function checkLogin($email,$password){
	$fp = fopen('../database/data.txt', 'r+');
	if($fp){
		$data = fread($fp, filesize('../database/data.txt'));
		fclose($fp);
		$dataArr = explode(';', $data);
		foreach ($dataArr as $key => $value) {
			$valueArr = explode('/', $value);
			if($valueArr[0]==$email&&$valueArr[1]==$password){
				return "true";
			}
		}
		return "false";

	}

}
?>