<?php
namespace b3\main;
require_once 'index4.php';

class B{
	public function Test(){
		return "This is ".__FUNCTION__;
	}
}

class C extends B{
	use \A;
	public function Demo(){
		//return $this->Test();
		//return $this->getName();
		return \A::getMoney(); //Nen dung kieu nay
		//return self::getMoney(); //Khong hay dung kieu nay
	}
}
$c = new C;
echo $c->Demo();