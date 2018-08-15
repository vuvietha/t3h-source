<?php
//Dinh nghia 1 interface
interface Person{
	//Tuyet doi khong duoc phep dinh nghia thuoc tinh
	//private $age => sai 
	//duoc phep ding nghia phuong thuc nhung la phuong thuc rong
	//Pham vi truy cap cua phuong thuc trong interface bat buoc la public
	public function playGame();
	public function playFootball();
	public function playChess();
	
}

//$person = new Person //Sai ko the khoi tao doi tuong vi Person la interface

interface Student extends Person{
	public function doSomething();
}

class A implements Student{
	public function playGame(){
		return "LOL";
	}

	public function playFootball(){
		return "Viet Nam";
	}

	public function playChess(){
		return "TQ";
	}
	public function doSomething(){
		return "Nhan Hoc Bong";
	}
}
$a = new A;
echo $a->playGame();