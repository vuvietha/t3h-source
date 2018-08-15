<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BT PHP 01 - GIAI PT BAC HAI</title>
	<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		border: 0;
	}
	div.container{
		width: 500px;
		height: 350px;
		margin: auto;
		border: 1px solid green;
		background: #e2dfdf;
		padding: 10px;
		margin-top: 20px;
		box-shadow: 10px 10px 5px 2px #ccc;

	}
	div.container h2{
		text-align: center;
		margin-top: 25px;
	}
	p#error{
		color: red;
		font-weight: bold;
		text-align: center;
		
	}
	div.row{
		width: 100%;
		padding: 3px 10px;
	}
	input[label]{
		width: 30%;
	}
	input[type]{
		width: 70%;
		height: 25px;
		border: 2px solid #ccc;
		border-radius: 5px;
		margin: 10px 3px;
	}
	form button{
		padding: 7px 5px;
		color: white;
		background-color: #4a4ae8;
		border: 1px solid black;
		border-radius: 5px;
		cursor: pointer;
	}
	#giaiPT{
		margin-left: 150px;
	}
	p#result {
		font-weight: bold;
		font-size: 18px;
	}

</style>
</head>
<body>
	<?php
	$err = $_GET['err']??'';
	$checka = $_GET['checka']??'';
	$checkb = $_GET['checkb']??'';
	$checkc = $_GET['checkc']??'';
	$result = $_GET['result']??'';
	$nghiem = $_GET['nghiem']??'';
	$stylea = $checka? "style='border: 2px solid red'" : "style='border: 2px solid #ccc'";
	$styleb = $checkb? "style='border: 2px solid red'" : "style='border: 2px solid #ccc'";
	$stylec = $checkc? "style='border: 2px solid red'" : "style='border: 2px solid #ccc'";
	$a = $_GET['a']??'';
	$b = $_GET['b']??'';
	$c = $_GET['c']??'';
	?>
	<div class="container">
		<h2>Giải phương trình bậc 2</h2>
		<p id="error"><?php echo $err;?></p>
		<form action="server/server.php" method="POST">
			<div class="row">
				<label for="txtHSa">Nhập hệ số a</label>
				<input type="text" name="txtHSa" id="txtHSa" value="<?php echo $a?>" <?php echo $stylea;?> >
			</div>
			<div class="row">
				<label for="txtHSb">Nhập hệ số b</label>
				<input type="text" name="txtHSb" id="txtHSb" value="<?php echo $b?>" <?php echo $styleb;?> >
			</div>
			<div class="row">
				<label for="txtHSc">Nhập hệ số c</label>
				<input type="text" name="txtHSc" id="txtHSc" value="<?php echo $c?>" <?php echo $stylec;?> >
			</div>
			<div class="row">
				<button type="submit" name="giaiPT" id="giaiPT">Giải Phương Trình</button>
				<button type="submit" name="reset" id="reset">Reset</button>
			</div>
			<div class="row">
				<p id="result"><?php echo $result;?></p>
				<p id="nghiem"><?php echo $nghiem;?></p>
			</div>
			
		</form>
		
	</div>	
</script>

</body>

</html>