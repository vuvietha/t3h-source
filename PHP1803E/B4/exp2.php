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
			$oldStr = $_GET['oldStr']??'';
			$newStr =  $_GET['newStr']??'';
		?>
	<div class="container">
		<h3>Kiem boi so chung</h3>
		<form action="server/check2.php" method="POST">
			<label for="txtNumbers">Nhap chuoi so</label>
			<input type="text" name="txtNumbers" id="txtNumbers" value="<?php echo $oldStr;?>">
			<br><br>
			<button type="submit" name="btnCheck">Kiem Tra</button>
		</form>
		<br>
		<input type="text" name="txtValue" id="txtValue" value="<?php echo $newStr;?>">
	</div>
</body>
</html>