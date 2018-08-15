<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO PHP</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.container{
			width: 350px;
			margin: auto;
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-top: 30px;
		}
		form{
			width: 100%;
		}
		form input{
			width: 100%;
			height: 25px;
			border: 1px solid #ccc;
			border-radius: 3px;
		}
		form button{
			padding: 5px 15px;
			border-radius: 3px;
			background: violet;
			border: 1px solid #ccc;
			margin-top: 10px;
			color: white;

		}
		h4{
			text-align: center;
			color: red;
		}
	</style>
	
</head>
<body>
	<?php
			$mess = $_GET['state']??'';
			$number =  $_GET['num']??'';
		?>
	<div class="container">
		<h3>Kiem tra nam nhuan</h3>
		<form action="server/check.php" method="POST">
			<label for="txtYear">Nhap nam</label>
			<input type="number" name="txtYear" id="txtYear" value="<?php echo $number;?>">
			<br><br>
			<button type="submit" name="btnCheck">Kiem Tra</button>
		</form>
		<br>
		
		<?php if($mess!==''&&($mess==='err'||$mess==='fail')):?>
		<h4>
			Khong phai nam nhuan
		</h4>
		<?php endif;?>
		<?php if($mess!==''&&($mess==='ok')):?>
		<h4>
			Dung la nam nhuan
		</h4>
		<?php endif;?>
	</div>
</body>
</html>