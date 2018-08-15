<?php
class Person{
	//Pham vi truy cap + static + name
	public static $name ='NVA';
	public $age = 30;
	private static $money = 1000;
	protected static $email = 'admin@gmail.com';

	public static function eatSomething(){
		return "KFC";

	}
	private static function goToSleep(){
		return "23:00";
	}
	protected static function playGame(){
		return "LOL";
	}
	public function earnMoney(){
		//return $this->money; -> sai vi money la bien static
		//return Person::$money; -> Ok
		//keyword : self giup truy cap vao thuoc tinh la static - self chi dung cho bien static
		//return self::$money; - o ngoai lop thi khong the dung tu khoa self ma phai dung Person::$money
		$m = self::$money;
		//$e = self::getInfoEmail();
		$e = $this->getInfoEmail();// Khi mot phuong thuc ko phai static trieu goi mot phuong thuc la static thi dung con tro $this binh thuong
		return $m.'--'.$e;
	}
	public function checkAge(){
		return $this->age;
	}
	public static function getInfoEmail(){
		//return $this->email; -> sai
		//return self::$email; -> ok
		//return $this->checkAge(); -> sai
		//return Person::checkAge(); -> sai
		// Khi mot phuong thuc la static trieu goi mot phuong thuc khong phai la static thi phai khoi tao mot doi tuong. Vi phuong thuc static khong ton tai con tro $this. 
		//return (new self)->checkAge();-> ok
		//return (new self)::checkAge(); -> sai
		return (new Person)->checkAge();
	}

}
$person = new Person;
// $name = $person -> name;  // sai vi no la static
// echo $name;
$name = Person::$name;
echo $name;
echo "<br/>";
$age = $person->age;

// $money = Person::$money; //sai vi la private
// $email = Person::$email;
echo $age;
//echo $name+'--'+$age + '---'+$money+'--'+$email;
echo "<br/>";
$eat = Person::eatSomething();
echo $eat;
echo "<br/>";
$money = $person->earnMoney();
echo $money;
echo "<br/>";
echo Person::getInfoEmail();
?>
