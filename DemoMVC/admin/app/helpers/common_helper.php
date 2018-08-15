<?php

if(!defined('APP_PATH')){
	die('can not access');
}
// define('PATH_UPLOAD', '../publics/uploads/images/');
function uploadFileData($file){
	//xu ly upload 
	// echo "<pre>";
	// print_r($file);
	if($file['error'] == 0){
		$tmpName = $file['tmp_name'];
		$nameFile = $file['name'];
		if($tmpName !==''){
			if(move_uploaded_file($tmpName,PATH_IMAGE.$nameFile)){
				return $nameFile;
			}
		}

	}
	return;
}

function validateAddProduct($namePd, $catId, $sizeId, $price, $qty, $desPd, $image){
	$error = [];
	$error['namepd'] =($namePd ==='') ? 'Enter name product' : '';
	$error['catid']  = ($catId <= 0) ? 'Enter Category' : '';
	$error['sizeid'] = ($sizeId <= 0) ? 'Enter Size' : '';
	$error['price']  = ($price<=0) ? 'Enter Price' : '';
	$error['qty']    = ($qty<=0) ? 'Enter Quantity' : '';
	$error['despd']  = ($desPd ==='') ? 'Enter Description' : '';
	// $error['image']  = ($image ===''||$image===null) ? 'Enter Image' : '';
	$error['image']  = (empty($image)) ? 'Enter Image' : '';
	return $error;

}