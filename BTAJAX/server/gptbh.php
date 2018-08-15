<?php
$a = $_POST['a']??'';
$a = strip_tags($a);
$b = $_POST['b']??'';
$b = strip_tags($b);
$c = $_POST['c']??'';
$c = strip_tags($c);

$result = giaiPTBH($a,$b,$c);
echo json_encode($result);
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