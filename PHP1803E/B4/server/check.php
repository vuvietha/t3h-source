<?php
if(isset($_POST['btnCheck'])){
	$year = $_POST['txtYear']??'';
	$year = is_numeric($year)? $year : 0;
	if($year===0){
		header('Location: ../exp.php?state=err&num='.$year);
	}else{
		if(checkNamNhuan($year)){
			header('Location: ../exp.php?state=ok&num='.$year);
		}else{
			header('Location: ../exp.php?state=fail&num='.$year);
		}

	}
}
function checkNamNhuan($y){
	if ($y%400==0) {
		return true;
	}
	else if($y%4==0 && $y%100!=0){
		return true;
	}
	return false;

}

?>