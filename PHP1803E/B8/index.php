<?php
//Thiet lap mui gio trong php
//date_default_timezone_set('Asia/Ho_Chi_Minh');
//Xu ly ngay thang trong php
//$date = Date('Y-m-d'); //date trong MySql
$date = Date('Y-m-d H:i:s'); //datetime trong MySql
//echo $date;

$today  = date('Y-m-d');
$tomorrow = '2018-05-30';

//strtotime : lay ra so minisecond tu ngay 01/01/1970 den ngay can tinh
$time1 = strtotime($today);
$time2 = strtotime($tomorrow);
//echo $time1."-----".$time2;
$date_time = mktime(0,0,0,5,(29+3),2018);
echo $date_time;
$myDate = date('Y-m-d',$date_time);
echo "<br/>";
echo $myDate;

$myToday = date('Y-m-d H:i:s',strtotime('+3hours'));
echo "<br/>";
echo $myToday;

$date2 = date('Y-m-d',strtotime('+4months+3weeks+2days'));
echo "<br/>";
echo $date2;
?>