<?php
//$btcq = "/^[1-9][0,2,4,6,8]\d[1,3,5,7,9]\d[0,5]$/";
$btcq = "/^[1-9][0,2,4,6,8]\d[^0,2,4,6,8]\d[0,5]$/";
$number = "121305";
if(preg_match($btcq, $number,$match)){
	echo "yes";
	echo "<pre>";
	print_r($match);
}else{
	echo "no";
}

$btcq2 = "/^[0](9[6-8]|8[6])\d{7}$/";
$phoneNumber = "0164493992";
if(preg_match($btcq2, $phoneNumber)){
	echo "OK";
}else{
	echo "ERR";
}
echo "<br/>";
//viet check ngay thang : dd/mm/YYYY
$checkDate = "/^(0[1-9]|1[0-9]|2[0-9]|3[0,1])\/(0[1-9]|1[0-2])\/[1-9]\d{3}$/";
$date = "30/04/2018";
if(preg_match($checkDate, $date,$match)){
	//echo "True";
	//echo "<pre>";
	//print_r($match);
	//Kiem tra ngay thang co chuan hay khong sau khi dinh dang ngay thang cua no la dung
	//Kiem tra rieng cho thang 2
	$month = (int)$match[2];
	$day = (int)$match[1];
	$arrYear = explode('/',$match[0]);
	$year = end($arrYear);
	$year = (int)$year;
	//echo $year;
	if($month==2){
		if($day>=1&&$day<=28){
			echo "Dinh dang dung";
		}elseif($day==29){
			//Kiem tra nam
			if($year%400==0||($year%4==0&&$year%100!=0)){
				echo "Dinh dang dung";
			}else{
				echo "Dinh dang sai";
			}

		}else{
			echo "Dinh dang sai";
		}

	}else{
			//Check cho cac thang khac
		$arrDate = [
			1 => 31,
			3 => 31,
			4 => 30,
			5 => 31,
			6 => 30,
			7 => 31,
			8 => 31,
			9 => 30,
			10 => 31,
			11 => 30,
			12 => 31

		];
		$flag = false;
		foreach ($arrDate as $key => $val) {
			if($month==$key&&$day==$val){
				$flag = true;

			}
		}
		if($flag){
			echo "Dung";
		}else{
			echo "Sai";
		}	
	}
}else{
	echo "False";
}


?>