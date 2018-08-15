<?php
//Kiem tra xem nguoi dung da bam vao nut register chua
if(isset($_POST['btnRegister'])){
	//Lay du lieu
	$email = $_POST['txtemail']??'';
	$email = strip_tags($email);

	$password = $_POST['txtpass']??'';
	$password = strip_tags($password);
	//echo  $password;
	//die(); exit();
    //$str = $email.'/'.$password.';';
	//Kiem tra xem nguoi dung co nhap email va pass hay khong
	if(!empty($email)&& !empty($password)){
		//Luu thong tin vao file data.txt
		$fp = fopen('../database/data.txt', 'a+');
		//fwrite($fp,$str );
		//fclose($fp);
		if($fp){
			//Luu file
			if(filesize('../database/data.txt')>0){
				$data = ";{$email}/{$password}";
				
			}else{
				$data = "{$email}/{$password}";
				
			}
			fwrite($fp,$data);
			fclose($fp);
			echo "success";
		}
		
	}
}


?>