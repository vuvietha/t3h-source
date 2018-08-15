<?php
//namespace b3\trait; => namespace chi lam viec voi class trait khong phai class
trait A{
	private $name = 'NTT';
	private static $money = 10;
	public function getName(){
		return $this->name;
	}
	public static function getMoney(){
		return self::$money;
	}

}