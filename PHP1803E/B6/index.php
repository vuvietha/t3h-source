<?php
//su dung filter_var : kiem tra tinh hop le cua du lieu
$check = true;
if(filter_var($check,FILTER_VALIDATE_BOOLEAN)){
	echo "yes";

}else{
	echo "no";
}
echo"<br>";
$email = "test@gmail.com"; // email hop le  3 thanh phan : ten, @, domain
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	echo "ok";
}else{
	echo "fail";
}
echo"<br>";
$url = "https://facebook.com"; // url hop le: 2 thanh phan protocol http/https va ten mien 
if(filter_var($url,FILTER_VALIDATE_URL)){
	echo "dung";
}else{
	echo "sai";

}
echo"<br>";
$number = 100;
if(filter_var($number,FILTER_VALIDATE_INT)){
	echo "number";
}else{
	echo "not number";
}
echo"<br/>";

//filter_var : giup xoa bo di cac du lieu khong dung
$email2 ="adminquảntrị(123**)@gmail.com";
$newEmail = filter_var($email2,FILTER_SANITIZE_EMAIL);
echo $newEmail;
echo"<br/>";
$url2 = "https://(my   học web).com).edu.vn";
$newUrl = filter_var($url2,FILTER_SANITIZE_URL);
echo $newUrl;
echo"<br/>";
$string = "<h1><b>This is PHP</b></h1>";
echo $string;
echo"<br/>";
$newString = filter_var($string,FILTER_SANITIZE_STRING); //Xoa bo cac the html - chuoi hop le khong chua cac ky tu html bao quanh
echo $newString;
echo"<br/>";
$numberStr = "-ab100abc";
$newNumberStr = filter_var($numberStr,FILTER_SANITIZE_NUMBER_INT);
echo $newNumberStr;
echo"<br/>";
$floatStr ="-3.14abc";
$newFloatStr = filter_var($floatStr,FILTER_SANITIZE_NUMBER_FLOAT);
echo $newFloatStr;
?>