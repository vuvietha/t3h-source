<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMailPHPMailer($email,$subject,$content){
	//khoi tao doi tuong cho thu vien
	$mail = new PHPMailer(true); 
	try{
		//Server settings: cho phep hien thi loi khi khong send mail duoc
    	//$mail->SMTPDebug = 2;
    	$mail->isSMTP();   //Su dung SMTP cua gmail
    	$mail->Host = 'smtp.googlemail.com';
    	//khong can kiem tra quyen bao mat 
    	$mail->SMTPAuth = true;  
    	// $mail->Username = 'trieuntgvt3h@gmail.com';
        //$mail->Password = 'trieunt123';
    	$mail->Username = 'havv561@gmail.com';                 // SMTP username
    	$mail->Password = 'vuvietha';                           // SMTP password
    	$mail->SMTPSecure = 'tls';                            
    	$mail->Port = 587;                                    

    	//Recipients : cau hinh ai gui den - nguoi gui
    	$mail->setFrom('trieuntgvt3h@gmail.com', 'Demo-Mailer');
    	//send mail cho ai - nguoi nhan
    	$mail->addAddress($email);
    	$mail->addCC('havv56@gmail.com');

    	//dinh kem file
    	$mail->addAttachment('images/1.jpg');
    	$mail->addAttachment('images/1.jpg');

    	//send noi dung thu
    	 $mail->isHTML(true); //cho phep gui email duoi dinh dang html
    	 //tieu de thu
    	 $mail->Subject = $subject;
    	 //noi dung thu
    	 $mail->Body = $content;

    	 if($mail->send()){
    	 	return true;
    	 }else{
    	 	echo "<pre>";
    	 	print_r($mail->ErrorInfo);
    	 	die;
    	 }
    	 //return false;

	}catch(Exception $e){
		 echo 'Mailer error: ';
		 echo "<br/>";
		 print_r($mail->ErrorInfo);
		 die;
	}  
}



if(isset($_POST['btnSendMail'])){
	$email = $_POST['txtEmail']??'';
	$email = strip_tags($email);

	$subject = $_POST['txtSubject']??'';
	$subject = strip_tags($subject);

	$content = $_POST['txtContent']??''; 
	//noi dung thu khong can dung strip_tags de send mail html duoc
	if($email===''||$subject===''||$content===''){
		header("Location:../email.php?state=fail");
	}else{
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			//xu ly send mail
			if(sendMailPHPMailer($email,$subject,$content)){
				header("Location:../email.php?state=success");
			}else{
				header("Location:../email.php?state=bad");
			}

		}else{
			header("Location:../email.php?state=err");

		}
	}
}


function sendmail($email,$subject,$content){
	$header = "From:trieuntgvt3h@gmail.com \r\n"; 
	$header = "Cc:havv56@gmail.com \r\n"; 
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n"; 
	if(mail($email,$subject,$content,$header)){
		return true;
	}
	return false;
}
?>