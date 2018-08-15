<?php
 if(isset($_POST['btnSubmit'])){
 	$birthday = $_POST['txtBirthday']??'';
 	$birthday = date('Y-m-d',strtotime($birthday));
 	$dateArr = explode('-', $birthday);
 	$day = end($dateArr);
 	$month = $dateArr[1];
 	$year = date("Y");
 	$strBirthday = $year."-".$month."-".$day;
 	$today = date("Y-m-d");
 	$time = strtotime($strBirthday);
 	$time2 = strtotime($today);
 	if($time2<$time){
 		//Chua toi sinh nhat
 		$t = $time - $time2;
 		
 		$d = ceil($t/86400);
 		header("Location:../index2.php?state=wait&days={$d}&d={$birthday}");
 	}else if($time2==$time){
 		header("Location:../index2.php?state=success&d={$birthday}");
 	}else{
 		header("Location:../index2.php?state=over&d={$birthday}");

 	}
 	
 }

?>