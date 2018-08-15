<?php
define('PATH_UPLOAD', '../upload/images/');
if(isset($_POST['btnUpload'])){
	//Kiem tra xem nguoi dung da chon file hay chua?
	if(isset($_FILES['txtFile'])){
		 // echo "<pre>";
		 // print_r($_FILES);
		 // die();

		//Tien hanh upload file len server
		if($_FILES['txtFile']['error']==0){
			//file khong co loi thi moi cho upload
			$typeFile = $_FILES['txtFile']['type'];
			$sizeFile = $_FILES['txtFile']['size'];
			
			if(checkFileSize($sizeFile)&&checkFileType($typeFile)){
				$nameFile = $_FILES['txtFile']['name'];
				$tmpFile = $_FILES['txtFile']['tmp_name'];
				if($tmpFile!==''){
				//Bat dau upload
					if(move_uploaded_file($tmpFile , PATH_UPLOAD.$nameFile)){
						header("Location:../index2.php?state=ok&img={$nameFile}");
					}else{
						header("Location:../index2.php?state=err");

					}
				}

			}else{
				header("Location:../index2.php?state=fail");
			}
			
		}
	}
}

function checkFileSize($sizeFile){
	if($sizeFile>5242880)
		return false;
	return true;
}

function checkFileType($typeFile){
	$allowType = ['image/jpeg','image/png','image/gif'];
	if(in_array($typeFile, $allowType))
		return true;
	return false;

}

?>