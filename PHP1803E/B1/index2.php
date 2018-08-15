<?php
declare(strict_types=1);
//Dinh nghia ham
//2 kieu dinh nghia
//(1)dinh nghia ham de chay duoc tren moi phien ban php
//(2)Dinh nghia ham chi chay duoc tren php7 tro len

//(1)
function checkNumber($a=9,$b=20){
	if($a%2==0){
		return true;
	}
	return false;

}

$check = checkNumber('8');
if($check){
	echo "Day la so chan";

}else{
	echo "Day la so le";
}
echo "<br/>";

//(2)
function checkNumber2(int $a) : bool{
	if($a%2==0){
		return true;
	}
	return false;
}
$check2 = checkNumber2(8);
if($check2){
	echo "Day la so chan - Kieu 2";

}else{
	echo "Day la so le";
}

function kiemTraSoNguyenTo (int $a) : bool{
	if($a<=1){
		return false;

	}else{
		for($i=2;$i<=sqrt($a);$i++){
			if($a%$i==0){
				return false;
			}
		}
		return true;
	}
}
echo "<br>";
$checkSoNT = kiemTraSoNguyenTo(2);
if($checkSoNT){
	echo "La so nguyen to";
}else{
	echo "Khong la so nguyen to";
}
echo "<br>";
//tu khoa static
function demoStatic(){
	static $dem = 1;
	$dem++;
	echo $dem;
}
demoStatic();
echo "<br>";
demoStatic();

//tham chieu(tham bien): la 1 bien truyen vao trong ham khi di ra khoi ham thi bien bi thay doi gia tri
 //va tham tri: la 1 bien truyen vao trong ham khi di ra khoi ham thi khong bi thay doi gia tri
$number = 10;
function testThamTri($number){
	$number = $number+20;
	return $number;
}
echo "<br>";
echo testThamTri($number);
echo "<br>";
echo $number;
function testThamChieu(&$number){
	$number = $number+20;
	return $number;
}
echo "<br>";
echo testThamChieu($number);
echo "<br>";
echo $number;
?>

