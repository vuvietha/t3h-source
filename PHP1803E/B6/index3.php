<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO UPLOAD MULTIPLE FILE</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		div.container{
			width: 970px;
			border: 1px solid #ccc;
			margin: auto;
			padding: 15px;
			margin-top: 20px;
			
		}
		div.container ul.imgList{
			list-style: none;
			padding: 5px;
			margin-top: 10px;
			
		}
		div.container ul.imgList li{
			margin-right: 15px;
			display: inline-block;
			
		}
	</style>
</head>
<body>
	<?php
	$state = $_GET['state']??'';
	$img = $_GET['img']??'';
	$imgArr = [];
	if($img!==''){
		$imgArr = explode('/',$img);

	}
	define('PATH_UPLOAD', 'upload/images/')
	?>
	<div class="container">
		<form action="server/multiupload.php"  method="POST" enctype="multipart/form-data">
			<label for="txtFile">Chon File Upload</label>
			<input type="file" name="txtFile[]" multiple="multiple" id="txtFile">
			<br>
			<button type="submit" name="btnUpload" id="btnUpload">MultiUpload</button>
		</form>	
		<?php if($state==='ok' && !empty($imgArr)): ?>
			<ul class="imgList">
				
					<?php foreach($imgArr as $key => $item): ?>
						<li>
							<img width="300" height="300"  src="<?php echo PATH_UPLOAD.$item;?>" alt="">
						</li>
						
					<?php endforeach;?>
				
			</ul>
			
		<?php endif; ?>
		<?php if($state==='fail'): ?>
			<h4 style ="<?php echo 'color:red;' ?>">Dinh dang anh phai la png,jpeg,gif va dung luong nho hon 5MB</h4>
		<?php endif;?>
	</div>	
</body>
</html>
