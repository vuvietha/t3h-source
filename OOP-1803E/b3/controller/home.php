<?php
namespace b3\controller;
require '../index.php';

//keyword use : su dung nhung lop dc namespace dinh danh : tenNamespace\tenlop
use b3\controller\A as D; //As: dat lai ten cho class A

class B extends D{
	public function showInfo(){
		return $this->getAge().__NAMESPACE__;
	}

}

$b = new B;
echo $b->showInfo();