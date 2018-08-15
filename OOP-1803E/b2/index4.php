<?php
class A{
	function __destruct(){
		//magic method
		echo "<br>";
		echo "123";
	}

	function __construct($a,$b,$c){
		//magic method
		echo "XYZ";
		echo "<br>";
		//echo $a;

	}
	//Khi khong dinh nghia pham vi truy cap thi mac dinh la public
	function Test(){
		//return "ABC";
		//magic constant __FUNCTION__: lay ra ten ham dang truy cap vao no
		//return __FUNCTION__;
		//magic constant __CLASS__: lay ra ten class dang truy cap vao no
		return __CLASS__;
	}
	//No se tu dong chay khi ban truy cap vao 1 method khong ton tai trong class
	function __call($q,$r){
		//echo "Not Found Method";
		header("Location:index2.php");
	}

	////No se tu dong chay khi ban truy cap vao 1 method la static nhung khong ton tai trong class
	static function __callStatic($q,$r){
		header("Location:index2.php");
	}

	//Khi truy cap vao mot thuoc tinh khong ton tai thi ham __get tu dong chay va tham so truyen vao ham get chinh la gia tri thuoc tinh dang truy cap bat hop bat 
	function __get($key){
		echo "Ban dang truy cap vao thuoc tinh {$key} khong ton tai trong class";
		echo "<br>";

	}
	function __set($key,$value){
		echo "Key la : {$key} - Value : {$value}";
		echo "<br>";
	}
}
final class B{
	public function demo(){
		return "123";
	}

}
class D{
	final public function myDemo(){
		return "FFF";
	}
	public function demo(){
		return "YYY";
	}
}
class C extends D{
	public function myDemo(){
		return $this->demo();
	}

}
$c = new C;
echo $c->myDemo();
echo "<br>";
$a = new A(1,2,3);
//echo "<br>";
echo $a->Test();
echo "<br>";
//echo $a->myTest();
//echo A::myTest();
echo $a->age=20;
?>