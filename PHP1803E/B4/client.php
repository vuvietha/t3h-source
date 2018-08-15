<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo method GET</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<!--Dung the a gui du lieu di bang method GET-->
	<a href="server/server.php?age=28&name=NTT&work=dev" title="demo get">Send data by method get</a>

	<!--Dung the form send data by method get-->
	<br>
	<br>
	<form action="server/login.php" method="POST">
		<label for="txtuser">Username</label>
		<input type="text" name="txtuser" id="txtuser">
		<br><br>
		<label for="txtpass">Password</label>
		<input type="password" name="txtpass">
		<br><br>
		<button type="submit" name="btnSubmit">Login</button>
	</form>
</body>
</html>