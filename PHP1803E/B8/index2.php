<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Check Birthday</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		div.content{
			width: 300px;
			margin: 10px auto;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 15px;
		}
		input{
			width: 100%;
			height: 23px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin: 8px 0px;
		}
		button{
			padding: 3px 8px;
			border-radius: 3px;
			border: 2px solid #ccc;
		}
	</style>
</head>
<body>
	<?php
		$state = $_GET['state']??'';
		if($state==='wait'){
			$d = $_GET['days']??'';
		}
		$day = $_GET['d']??'';
	?>
	<div class="content">
		<form action="server/handle.php" method="POST">
			<label for="txtBirthday">Nhap ngay sinh</label>
			<input type="date" name="txtBirthday" id="txtBirthday" value="<?php echo $day;?>">
			<br>
			<button type="submit" name="btnSubmit">Check</button>
		</form>
		<div class="result">
			<?php if($state==='success'):?>
				Chuc mung sinh nhat ban
			<?php elseif($state==='over'):?>
				Da qua sinh nhat ban
			<?php elseif($state==='wait'):?>
				Con <?=$d?> ngay toi sinh nhat ban
			<?php endif;?>

		</div>
		
	</div>
</body>
</html>