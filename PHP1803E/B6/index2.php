<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO UPLOAD FILE</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		$state = $_GET['state']??'';
		$img = $_GET['img']??'';
		define('PATH_UPLOAD', 'upload/images/');
	?>
	<div class="container">
		<form action="server/upload.php"  method="POST" enctype="multipart/form-data">
			<label for="txtFile">Chon File Upload</label>
			<input type="file" name="txtFile"  id="txtFile">
			<br>
			<button type="submit" name="btnUpload" id="btnUpload">Upload</button>
		</form>	
		<?php if($state==='ok'&&$img!==''):?>
		<img src="<?php echo PATH_UPLOAD.$img;?>" alt="">	
		<?php endif;?>
		<?php if($state==='fail'):?>
			<p><?php echo "Upload anh co dinh dạng png,jpeg,gif va dung luong nho hon 5Mb";?></p>
		<?php endif;?>
	</div>	
</body>
</html>