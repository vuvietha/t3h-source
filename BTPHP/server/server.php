<?php
if(isset($_POST['giaiPT'])){
	$a = $_POST['txtHSa']??'';
	$b = $_POST['txtHSb']??'';
	$c = $_POST['txtHSc']??'';
	$checka = ($a==''||is_numeric($a)==false);
	$checkb = ($b==''||is_numeric($b)==false);
	$checkc = ($c==''||is_numeric($c)==false);
	if($checka || $checkb || $checkc ){
		$err ="Vui lòng nhập hệ số phương trình và dữ liệu phải là số";		
		header("Location: ../index.php?err={$err}&checka={$checka}&checkb={$checkb}&checkc={$checkc}&a={$a}&b={$b}&c={$c}");
	}else{
		$resultArr = giaiPTBH($a,$b,$c);
		header("Location: ../index.php?result={$resultArr[0]}&nghiem={$resultArr[1]}&a={$a}&b={$b}&c={$c}");
	}
	
}
if(isset($_POST['reset'])){
	header("Location: ../index.php");
}

function giaiPTBH($a,$b,$c){
	$result = '';
	$nghiem = '';
	if($a==0){
		if($b==0){
			if($c==0){
				$result='Phương trình vô số nghiệm';

			}
			else{
				$result='Phương trình vô nghiệm';

			}
		}else{
			
			$x=-$c/$b;
			$result='Phương trình có một nghiệm: ';
			$nghiem = "Nghiệm : {$x}";
			
		}
	}else{
		$del = $b*$b - 4*$a*$c;
		if($del<0){
			$result='Phương trình vô nghiệm';
		}elseif ($del==0) {
			$x=-$b/2*$a;
			$result='Phương trình có nghiệm kép: ';
			$nghiem = "Nghiệm : {$x}";
		}else{
			$x=(-$b+sqrt($del))/(2*$a);
			$y=(-$b-sqrt($del))/(2*$a);
			$result='Phương trình có hai nghiệm phân biệt: ';
			$nghiem = "Nghiệm : x = {$x} - y = {$y}";
		}

	}
	$resultArr = [$result,$nghiem];
	return $resultArr;
}

?>