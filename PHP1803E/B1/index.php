<?php
//toan bo ma lenh php nam trong cap the nay
/* Comment nhieu dong*/
echo "<h1>Hello PHP1803E</h1>";

//Khai bao bien 
//trong php co phan biet chu hoa chu thuong
$name;
$Name;
//$9name => Sai
//$ name => Sai
$break;//hop le - trong php cho phep dat ten bien trung voi tu khoa
$_break;
$if; //Hop le
$a = 12;
$b='a';
echo $$b;
echo "<br/>";
//dinh nghia hang so
define('PI', 3.14); // Su dung tren phien ban PHP tu 5.6 va php7
echo PI;
echo "<br/>";
define('MY_ARRAY', [1,2,3]);
var_dump(MY_ARRAY);
echo "<br/>";

//khi trong class co dinh nghia mot namespace. Muon dinh nghia mot hang so bat buoc phai dung const khong the dung define
const PI_NEW = 3.14;  // Chi su dung tren phien ban php7 tro len
echo PI_NEW;
echo "<br/>";
const MYARR = [1,2,3];

//echo chi lam viec voi chuoi var_dump co the in ra array, object...
//echo khong cho biet kieu du lieu cua phan tu in ra var_dump cho phep in ra ca kieu du lieu
var_dump(MYARR);
echo "<br/>";
$a = 10;
// var_dump($a);
$b='12'; //number string $b la chuoi so nen cong binh thuong php se tu dong convert chuoi so sang chuoi de thuc hien cong
//var_dump($b);
$sum = $a + $b;
var_dump($sum);
$str = 'Chung ta dang hoc php';
$str2 = 'day la buoi dau tien';
$str3 = $str . $str2;

echo $str3;
echo "<br/>";
$test = false; //false '' 0 bang nhau ve gia tri, true 1 giong nhau ve gia tri
if($test == ''){
	echo 'Yes';
}else{
	echo "No";
}
$d; //Han che toi da su dung truong hop nay 
var_dump($d);
echo "<br/>";
$e= null; //nen thay bang cach nay
$f = ''; //Mot bien duoc goi la rong khi no khong co gia tri hoac duoc gan bang null hoac ''
var_dump($e);
echo "<br/>";
if(empty($e)){
	echo "OK";
}else{
	echo "Err";

}
echo "<br/>";

if (isset($e)){ // kiem tra co ton tai hay khong 
	echo "OK1";

}else{
	echo "Err1";

}
echo "<br/>";
$numberString = '100';
$numberString2 = 100;

if(is_numeric($numberString)){
	echo "Dung";
}else{
	echo "Sai";
}
echo "<br/>";
if(is_int($numberString)){
	echo "Dung123";
	echo gettype($numberString);
	echo "<br/>";
	echo gettype($numberString);
	//settype($numberString, 'int');
	$numberString=(int)$numberString;
	echo "<br/>";
	echo gettype($numberString);
	echo $numberString;
}else{
	echo "Sai123";
	echo "<br/>";
	echo gettype($numberString);
	//settype($numberString, 'int');
	$numberString=(int)$numberString;
	echo "<br/>";
	echo gettype($numberString);
}
echo "<br/>";
$intNumber = 10.305;
echo intval($intNumber);
echo "<br/>";
echo floatval($intNumber);
echo "<br/>";
$numberStringTest = '1000 abc'; 
//$numberStringTest = (int)$numberStringTest;
settype($numberStringTest, 'int');
echo $numberStringTest; //=> 1000
echo "<br/>";
$test1 =200;
$test2=200;
$test3=($test2-$test1 > $test1) ? $test2 : $test1;
echo $test3;
echo "<br/>";
$test4 =($test5)??$test3; 
//$test4 = (isset($test5)) ? $test5 : $test3;
echo $test4;
echo "<br/>";
$compare = $test1<=>$test2; //Bieu thuc ben trai lon hon ben phai tra ve 1, nho hon tra ve -1, bang nhau tra ve 0
echo $compare;
echo "<br/>";
$i = 9;
$j = 10;
$total = (++$i)-($j++) -($i--) - (--$j);
// 			10   10      10        10
echo $total;
?>