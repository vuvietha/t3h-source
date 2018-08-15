<?php
//nhan du lieu tu phia index.php gui len
$keyword = $_POST['key']??'';
$keyword = strip_tags($keyword);
$num = $_POST['num']??'';
$num = is_numeric($num) ? $num : 0;

//Du lieu tra ve cho phia client la kieu text (string)
//echo $num;
//du lieu tra ve kieu json (giong object trong js con php hieu la kieu json(ban chat la string))

$data = [];
$data['key'] = $keyword;
$data['num'] = $num;

//Chuyen mang ve chuoi json hay chinh la objec trong js
//echo json_encode($data)

//du lieu tra ve la mot ma html
// $html = '';
// $html.='<table><tr>';
// $html.='<td>123</td>';
// $html.='<td>abc</td>';
// $html.='<td>xyz</td>';
// $html.='</tr></table>';

// $html='';
// $html.='<ul>';
// $html.='<li><a href="#">dantri.com.vn</a></li>';
// $html.='<li><a href="#">facebook.com.vn</a></li>';
// $html.='<li><a href="#">vnexpress.net</a></li>';
// $html.='</ul>';
// echo $html;

//Kiem tra keyword ma nguoi dung nhap co nam trong data ko?
//Neu co tra ve du lieu mong muon cua nguoi dung
//Neu khong thong bao ko co du lieu

$fp = fopen('../database/data.txt', 'r+');
if($fp){
	//xu ly
	$dataSearch = fread($fp, filesize('../database/data.txt'));
	fclose($fp);
	$arrSearch = explode(';', $dataSearch);
	$dataKeyword = [];
	//print_r($arrSearch);
	foreach ($arrSearch as $key => $val) {
		$dataKeyword [] = explode('/', $val);
	}

	$flagCheck = false;
	foreach ($dataKeyword as $k => $value) {
		foreach ($value as $k2 => $v) {
			if($keyword == $v){
				$flagCheck = true;
				break;
			}
		}
	}
	// $strSearch = implode($arrSearch, '/');
	// $newArrSearch = explode('/', $strSearch);
	// foreach ($newArrSearch as $k => $v {
		
	// }
	//var_dump($newArrSearch);
	//var_dump($flagCheck);

	$dataTest = [
		[
			'baihat' => 'chay ngay di',
			'nhacsi' => 'STMTP',
			'img' => 'http://img1.blogtamsu.vn/2016/12/bst-kieu-toc-son-tung-mtp-blogtamsuvn7.jpg'
		],
		[
			'baihat' => 'con mua ngang qua',
			'nhacsi' => 'STMTP',
			'img' => 'http://img1.blogtamsu.vn/2016/12/bst-kieu-toc-son-tung-mtp-blogtamsuvn7.jpg'
		],
		[
			'baihat' => 'bua yeu',
			'nhacsi' => 'bich phuong',
			'img' => 'http://media.phunutoday.vn/files/quynh.nguyen/2018/04/17/5bich-phuong-la-ai-1-phunutodayvn-0145.jpg'
		]

	];
	require '../view/result_view.php';
}
?>