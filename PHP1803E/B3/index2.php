<?php
//xu ly file trong php

//Mo file
$fp = fopen('public/data.txt', 'a+');
if($fp){
	//echo "Open Success";
	//Doc file
	//$data = fread($fp, filesize('public/data.txt'));
	//echo $data;

	//Ghi du lieu vao file
	$testData = 'Learning PHP thang 3';
	// fwrite($fp, $testData);

	$fp2 = fopen('public/data.txt', 'a+');
	// $data = fread($fp2, filesize('public/data.txt'));
	//echo $data;

	//dong file
	fclose($fp);
	fclose($fp2);
	//echo $data;


}else{
	echo "Open Fail";
}

//Kiem tra xem mot file co ton tai hay khong
if(file_exists('public/data.txt')){
	echo "yes";
}else{
	echo "no";
}
echo "<br>";
if(is_writable('public/data.txt')){
	echo "y";
}else{
	echo "n";
}

$testData = "Test abc";
echo "<br>";
// file_put_contents('public/data.txt', $testData); //Giong w+ cua fwrite
// rename('public/data.txt', 'public/php.txt');
// rename('public/php.txt', 'test.txt');
// copy('test.txt', 'public/php.txt');
// unlink('test.txt');
// mkdir('copy');
// copy('public/php.txt', 'copy/php.txt');
if(is_dir('css')){
	//echo "y";
	if(file_exists('public/php.txt')){
		copy('public/php.txt', 'css/php.txt');
	}else{

	}
	
}else{
	//echo "no";
	mkdir('css');
	if(file_exists('public/php.txt')){
		copy('public/php.txt', 'css/php.txt');
	}
}
echo "<br>";
if(is_dir('public/css')){
	echo "Ton tai";
}else{
	echo "Khong ton tai";
	mkdir('public/css');
}
echo "<br>";
$fpData = fopen('public/data.txt', 'r');
$str = fread($fpData, filesize('public/data.txt'));
fclose($fpData);
$strArr = explode(';', $str);
$strPass = $strArr[1];
$passArr = explode("'", $strPass);
$pass = $passArr[1];
echo $pass;
?>