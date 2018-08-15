<?php
// cac ham xu ly ve mang trong php
$arr = [
	'name' => 'NVA',
	'work' => 'DEV',
	'age' => 28
];
echo "<pre>";
print_r(array_change_key_case($arr,CASE_UPPER));
echo "<br>";

$arrNumber = [1,2,3,1,2,3,5];
$arrSame = array_count_values($arrNumber);
echo "<pre>";
print_r($arrSame);
echo "<br>";

array_unshift($arrNumber, 100);
print_r($arrNumber);
array_shift($arrNumber);
print_r($arrNumber);
array_push($arrNumber, 100);
print_r($arrNumber);
$pop=array_pop($arrNumber);
print_r($arrNumber);
$number = [1,2,3,4,5,6,7,8,9];
$newNumber = array_chunk($number, 2,true); //true giu lai key cua cha , false tu dong danh lai key cho mang con 
print_r($newNumber);
echo "<br>";

//kiem tra mot bien cho phai la mang hay khong 
if(is_array($newNumber)){
	echo "yes";

}else{
	echo "no";
}
echo "<br>";

//kiem tra xem mot phan tu co nam trong mang hay khong
if(in_array(5, $number)){
	echo "Y";
}else{
	echo "N";
}
echo "<br>";

//kiem tra xem key co ton tai trong mang hay khong
if(array_key_exists('age', $arr)){
	echo "OK";
}else{
	echo "ERR";
}
echo "<br>";

//Lay tat ca cac gia tri cua key nam trong mang
$arrKey = array_keys($arr);
print_r($arrKey);
echo "<br>";


$arrNumberTest = [1,2,3,1,1,1,2,2,2,3,3,3,4,5,6,6,7];
//Loai bo cac phan tu trung nhau
$newArrNumberTest = array_unique($arrNumberTest);
print_r($newArrNumberTest);
echo "<br>";

//Chuyen mang khong tuan tu ve mang tuan tu ( tu dong danh lai key)
$newArr = array_values($arr);
print_r($newArr);
echo "<br>";

//Tinh tong cac phan tu trong mang
$sum = array_sum($arrNumberTest);
print_r($sum);
echo "<br>";

$numberSlice = [1,2,3,4,5,6,7,8,9];

$newNumberSlide = array_slice($numberSlice, 3,3);
print_r($newNumberSlide);
echo "<br>";

$newNumbersplice = array_splice($numberSlice, 3,3,[400,500,600]);
print_r($numberSlice);
echo "<br>";
$end = end($numberSlice);
echo $end;
echo "<br>";

arsort($arrNumberTest);
print_r($arrNumberTest);
echo "<br>";

asort($arrNumberTest);
print_r($arrNumberTest);
echo "<br>";

krsort($arr);
print_r($arr);
echo "<br>";

ksort($arr);
print_r($arr);
echo "<br>";

function sapXepMang($arr){
	$length  = count($arr);
	for($i=0;$i<$length;$i++){
		for($j=$i+1;$j<$length;$j++){
			if($arr[$i]<$arr[$j]){
				$temp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $temp;
			}
		}
	}

	return $arr;
}

function mySortArr($arr){
	foreach ($arr as $key => $value) {
		foreach ($arr as $k => $val) {
			if($value>$val){
				$tmp = $arr[$key];
				$arr[$key] = $arr[$k];
				$arr[$k] = $tmp;
			}
		}
	}
	return $arr;
}
$arrSort = sapXepMang($numberSlice);
print_r($arrSort);
echo "<br>";

$arrSort2 = mySortArr($numberSlice);
print_r($arrSort2);
echo "<br>";


$arrSort3 = sapXepMang($arrNumberTest);
print_r($arrSort3);
echo "<br>";

$arrSort3 = mySortArr($arrNumberTest);
print_r($arrSort3);
echo "<br>";

function findMinMax($arr){
	$min = $arr[0];
	$max = $arr[0];
	$length = count($arr);
	for($i=0;$i<$length;$i++){
		if($arr[$i]<$min){
			$min = $arr[$i];

		}
		if($arr[$i]>$max){
			$max = $arr[$i];
		}
	}
	$arrMinMax = [$min,$max];
	return $arrMinMax;
}

$arrMinMax = findMinMax($numberSlice);
print_r($arrMinMax);
echo "<br>";

function boiSochung($arr){
	$length = count($arr);
	$newArr = [];
	for($i=0;$i<$length;$i++){
		if($arr[$i]%2==0&&$arr[$i]%3==0){
			array_push($newArr, $arr[$i]);
		}

	}
	return $newArr;
}

$arrTestBoiSo = [1,2,3,5,6,9,0,5,12];
$arrBoiSo = boiSochung($arrTestBoiSo);
print_r($arrBoiSo);
echo "<br>";

function xoaSoChan(&$arr){
	$length = count($arr);
	for($i=0;$i<$length;$i++){
		if($arr[$i]%2==0){
			unset($arr[$i]);
		}
	}
	return $arr;
}

xoaSoChan($arrTestBoiSo);
print_r($arrTestBoiSo);
echo "<br>";
?>