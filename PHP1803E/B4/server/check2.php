<?php
if(isset($_POST['btnCheck'])){
	$str = $_POST['txtNumbers']??'';
	if($str!=''){
		$strArr = explode(',', $str);		
		$newArr = kiemTraBSC($strArr);
		$newStr = implode(',', $newArr);
		echo $newStr;
	}
	
	header("Location: ../exp2.php?newStr={$newStr}&oldStr={$str}");


}
function kiemTraBSC($arr){
	$newArr = [];
	foreach ($arr as $key => $value) {
		if($value%2==0&&$value%3==0){
			array_push($newArr, $value);

		}
	}
	return $newArr;

}
?>