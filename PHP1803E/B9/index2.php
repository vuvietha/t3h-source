<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo Validate Form PHP</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	div{
		width: 350px;
		margin: 10px auto;
		border: 1px solid #ccc;
		border-radius: 3px;
		padding: 15px;
	}
	input{
		width: 95%;
		height: 23px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin: 10px 0px;
		padding:  3px 5px;
	}
	button{
		padding:5px 12px;
		border-radius: 3px;
	}
</style>
</head>
<body>
	<?php
	$state = $_GET['state'] ?? '';
	$errors = $_SESSION['errors'] ?? [];
	?>

	<div>
		<?php if($state==='fail' && !empty($errors)): ?>
			<ul>
				<?php foreach($errors as $err):?>
					<?php if($err!==''):?>
						<li style="color:red;"><?php echo $err;?></li>
					<?php endif;?>
				<?php endforeach;?>
			</ul>
		<?php endif;?>
		<br><br>
		<form action="server/handle.php" method="POST">
			<label for="user">Username</label>
			<input type="text" name="user" id="user">
			<br>
			<label for="pass">Password</label>
			<input type="password" name="pass" id="pass">
			<br>
			<label for="email">Email</label>
			<input type="text" name="email" id="email">
			<br>
			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone">
			<br><br>
			<button type="submit" name="btnSubmit">Register</button>
		</form>
	</div>
	
</body>
</html>