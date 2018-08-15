<?php
class Sport{
	private $name="Ronaldo";
	protected $nameSport = "Sapa";
	public function player(){
		return $this->name;
	}
	protected function truotTuyet(){
		return $this->nameSport;

	}
}

//Ke thua trong oop php
class Football extends Sport{
	protected $nameSport2 = "New York";
	function playFootball(){
		return $this->player();
	}
	public function Test(){
		return $this->truotTuyet();
	}

	//tinh da hinh - override dinh nghia lai phuong thuc lop cha
	public function truotTuyet(){

		//return $this->nameSport2;
		//parent tu khoa goi phuong thuc lop cha khi lop con override lai no
		return parent::truotTuyet();
	}
}
class Tennis extends Football{
	
}
$fb = new Football;
echo $fb->playFootball();
echo "<br/>";
//echo $fb->truotTuyet(); // sai vi protected chi dung trong noi bo lop va noi bo lop ke thua
echo $fb->Test();
?>