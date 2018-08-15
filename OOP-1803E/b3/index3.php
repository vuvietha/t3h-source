<?php
//khai bao abstract class
abstract class A{
	//Duoc phep khai bao thuoc tinh - Khong duoc phep dat tu khoa abstract dung truoc
	public $age = 20;

	//Khai bao ve phuong thuc 2 loai: phuong thuc abstract hoac phuong thuc binh thuong 
	//Pham vi truy cap cua phuong thuc abstract phai la public hoac protected
	abstract public function Test();
	abstract protected function Demo();
	public function Dinner(){
		return "Chicken";
	}

}

//$a = new A; => sai khong cho phep khoi tao doi tuong vi A la abstract class

class B extends A{
	public function Test(){
		return $this->age;
	}
	protected function Demo(){
		return $this->Dinner();
	}
}
class C extends B{
	public function Check(){
		return $this->Demo();
	}
}

$b = new B;
//echo $b->Demo(); => sai khong the goi vi Demo la protected
$c = new C;
echo $c->Check();

