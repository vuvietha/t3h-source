<?php
// dinh nghia class trong OOP PHP
class student {
    // dinh nghia thuoc tinh
    // cu phap : pham vi truy cap + ten thuoc tinh
    private $maSV = 113;
    protected $hocbong = 1500000;
    public $name = 'NVA';

    // dinh nghia ve phuong thuc
    // pham vi truy cap + function + name
    public function diHoc(){
        return "LT PHP";
    }
    protected function thiHK(){
        return "Lan I";
    }
    private function hocLai($mon){
        return $mon;
    }

    public function hocCaiThien($monHoc = 'Java'){
        return $this->hocLai($monHoc);
    }
}

// dinh nghia object trong oop php
$obj = new student;
$obj2 = new student;

//truy cap vao thuoc tinh nam trong class
//$masv = $obj->maSV; // sai
//echo $masv;
//$hocbong = $boj2->hocbong; // sai
//echo $hocbong;
$name = $obj->name;
echo $name;
echo "<br>";
$hoc = $obj2->diHoc();
echo $hoc;
echo "<br>";
$thihk = $obj2->hocCaiThien();
echo $thihk;