<?php
class GiaiPTBN{
	public function giai($a,$b){
		return -$b/$a;
	}
}

//Kiem tra nguoi dung bam nut giai
if(isset($_POST['btnSubmit'])){
	
	//lay duoc he so a, b
	$hsa = $_POST['hsa'] ?? '';
	$hsa = is_numeric($hsa) ? $hsa : '';

	$hsb = $_POST['hsb'] ?? '';
	$hsb = is_numeric($hsb) ? $hsb : '';
	if($hsa===''||$hsb===''){
		header("Location:../index2.php?state=fail");
	}else{
		$pt = new GiaiPTBN;
		$nghiem = $pt->giai($hsa,$hsb);
		header("Location:../index2.php?state=ok&nghiem={$nghiem}");
	}
	
}
?>