<?php
class Giai{
	private $num;
	function __construct($number){
		$this->num = $number;
	}
	private function CheckNumber($n){
		//Kiem tra o day
		if($n<=0){
			return false;
		}else if($n==1 || $n==2){
			return true;
		}else{
			$checkFlag = true;
			for($i=2;$i<=sqrt($n);$i++){
				if($n%$i==0){
					$checkFlag =false;
					break;
				}
			}
			return $checkFlag;
		}

	}
	public function result(){
		return $this->CheckNumber($this->num);
	}
}
class Show extends Giai{
	function __construct($a){
		parent::__construct($a);
	}
	public function check(){
		return $this->result();

	}

}
if(isset($_POST['btnSubmit'])){
	$number = $_POST['number'] ?? '';
	$number = is_numeric($number) ? $number : '';
	if($number===''){
		header("Location:../index5.php?state=fail");

	}else{
		$checkNumber = new Show($number);
		if($checkNumber->check()){
			header("Location:../index5.php?state=success");
		}else{
			header("Location:../index5.php?state=err");

		}
	}
}

