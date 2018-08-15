<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo method POST</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h3>Register User</h3>
	<form action="server/handle.php" method="POST">
		<label for="txtemail">Email</label>
		<input type="email" name="txtemail" id="txtemail">
		<br><br>
		<label for="txtpass">Pass</label>
		<input type="password" name="txtpass" id="txtpass">
		<br><br>
		<button type="submit" name="btnRegister">Register</button>
	</form>
</body>
</html>