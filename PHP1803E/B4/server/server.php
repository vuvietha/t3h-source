<?php
//$_GET la mot bien toan cuc kieu mang
$name=$_GET['name']??'';
//$name = isset($_GET['name']) ? $_GET['name']:'';
$age = $_GET['age']??'';
$work = $_GET['work']??'';
echo "My name :{$name} - age :{$age} - work: {$work}";


?>