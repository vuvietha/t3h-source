<?php
//Xu ly ve chuoi trong php
$number = 10;
echo "Xu ly ve chuoi trong php";
$string ='This is string {$number}'.$number;

//Nhay kep duoc phep truyen bien vao chuoi
$string2 ="This is string 2 {$number}";
echo "<br>";
echo $string ;
echo "<br>";
echo $string2 ;
echo "<br>";

//long nhay don vao nhay don
$string3='chung ta dang hoc \'php\'';
echo $string3;
echo "<br>";
$string4="chung ta dang hoc 'php'";
echo $string4;
echo "<br>";
$string5='chung ta dang hoc "php"';
echo $string5;
echo "<br>";
$string6="chung ta dang hoc \"php\"";
echo $string6;
echo "<br>";
$fruit = 'tao,oi,man,le';
$arrFruit = explode(',',$fruit);
echo var_dump($arrFruit);
$strFruit = implode(',', $arrFruit);
echo "<br>";
echo $strFruit;
$nameClass = "LPHP 1803E";
$nameStudent = "Nguyễn Văn A";
echo "<br>";
echo strlen($nameClass);
echo "<br>";
echo strlen($nameStudent);
echo "<br>";

//mb_strlen ho tro ngon ngu tieng viet hoac co dau
echo mb_strlen($nameStudent);
echo "<br>";
echo str_repeat($nameClass, 5);
echo "<br>";
echo str_replace('LPHP', 'JS', $nameClass);
echo "<br>";
$password ="pass wifi la gi";
echo md5($password);
$strTest = "<script>alert('hello you')</script>";
echo "<br>";
$strTest2= htmlentities($strTest); //bien the html thanh  chuoi binh thuong (tranh loi xss - ky thuat hacker tan cong nguoi dung)
$strTest3 = html_entity_decode($strTest2);
echo $strTest3;
echo "<br>";
$strStripTag ="<h1><strong><i>Hello You</i></strong></h1>";
echo $strStripTag;
echo strip_tags($strStripTag,"<h1>,<strong>"); //giu lai the h1, strong trong chuoi 
$subString = substr($password, 5,4);
echo $subString;
echo "<br>";
echo strstr($password, 'w');
echo "<br>";
if(strpos($password, 'wifi')!==false){
	echo strpos($password, 'wifi');
}else{
	echo "Khong ton tai";
}
echo "<br>";
$url = "http://this-is-url-test-1000.html";
$arrUrl = explode('-',$url );
$endArr = end($arrUrl);
$idNumber = intval($endArr);
$end = strpos($endArr, '.');
$id = substr($endArr,0,$end);
echo $id;
echo "<br>";
echo $idNumber;
echo "<br>";
$testTrim = '      this is test    ';
echo trim($testTrim);
echo "<br>";
$testTrim2= 'c'.'      this is test    ';
echo ltrim($testTrim2);
echo "<br>";
$testTrim3= '      this is test    '.'c';
echo rtrim($testTrim3);
echo "<br>";
?>