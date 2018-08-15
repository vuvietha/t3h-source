<?php
define('PATH_UPLOAD', '../upload/images/');
$checkUpload = false;
$checkFormat = true;
if(isset($_POST['btnUpload'])){
	if(isset($_FILES['txtFile'])){
		 // echo "<pre>";
		 // print_r($_FILES);
		 // die();
		$img='';
		if(checkFilesSize($_FILES['txtFile']['size'])&&checkFilesType($_FILES['txtFile']['type'])){
			foreach ($_FILES['txtFile']['error'] as $key => $items) {
				if($items==0){
					$nameType = $_FILES['txtFile']['type'][$key];
					$nameSize = $_FILES['txtFile']['size'][$key];
					$nameFile = $_FILES['txtFile']['name'][$key];
					$tmpName = $_FILES['txtFile']['tmp_name'][$key];
					if($tmpName!==''){
						if(move_uploaded_file($tmpName, PATH_UPLOAD.$nameFile)){
							$img.=($img==='') ? $nameFile :"/".$nameFile;
							$checkUpload = true;

						}
					}
					

				}
			}

			if($checkUpload){
				header("Location:../index3.php?state=ok&img={$img}");
			}else{
				header("Location:../index3.php?state=err");
			}

		}else{
			header("Location:../index3.php?state=fail");
		}

		// foreach ($_FILES['txtFile']['error'] as $key => $items) {
		// 	if($items==0){
		// 		$nameType = $_FILES['txtFile']['type'][$key];
		// 		$nameSize = $_FILES['txtFile']['size'][$key];
		// 		if(checkFileSize($nameSize)&&checkFileType($nameType)){
		// 			$nameFile = $_FILES['txtFile']['name'][$key];
		// 			$tmpName = $_FILES['txtFile']['tmp_name'][$key];
		// 			if($tmpName!==''){
		// 				if(move_uploaded_file($tmpName, PATH_UPLOAD.$nameFile)){
		// 					$img.=($img==='') ? $nameFile :"/".$nameFile;
		// 					$checkUpload = true;

		// 				}
		// 			}
		// 		}else{
		// 			$checkFormat = false;
		// 			break;
		// 		}

		// 	}
		// }


		// if($checkFormat){
		// 	if($checkUpload){
		// 		header("Location:../index3.php?state=ok&img={$img}");
		// 	}else{
		// 		header("Location:../index3.php?state=err");
		// 	}

		// }else{
		// 	header("Location:../index3.php?state=fail");

		// }	

	}
}

// function checkFileSize($fileSize){
// 	if($fileSize>5242880)
// 		return false;
// 	return true;
// }

// function checkFileType($fileType){
// 	$allowedType = ['image/png','image/gif','image/jpeg'];
// 	if(in_array($fileType, $allowedType))
// 		return true;
// 	return false;
// }

function checkFilesSize($fileSize){
	foreach ($fileSize as $key => $value) {
		if($value>5242880){
			return false;
		}

	}
	
	return true;
}

function checkFilesType($fileType){
	$allowedType = ['image/png','image/gif','image/jpeg'];
	foreach ($fileType as $key => $value) {
		if(!in_array($value, $allowedType))
			return false;
	}
	return true;
}
?>