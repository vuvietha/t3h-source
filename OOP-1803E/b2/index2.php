<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PTBN</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$state = $_GET['state']??'';		
		$nghiem = $_GET['nghiem']??'';		
	?>
	<div class="container">
		<?php if($state==='ok'&& $nghiem!==''):?>
			<h3>Nghiem la : <?php echo $nghiem;?></h3>
		<?php endif;?>
		<?php if($state==='fail'):?>
			<h3>Vui long nhap gia tri he so va phai la so</h3>
		<?php endif;?>
		<form action="server/ptbn.php" method="POST">
			<label for="hsa">HS a:</label>
			<input type="text" name="hsa" id="hsa">
			<br><br>
			<label for="hsb">HS b:</label>
			<input type="text" name="hsb" id="hsb">
			<br><br>
			<button type="submit" name="btnSubmit">Giai</button>
		</form>
	</div>
</body>
</html>