
<?php
session_start();
setcookie('isLogined','isLogined',time()+5,"/","",0);
// require_once 'checkLogin.php';
// checkLoginHome();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO login </title>

</head>
<body>
	<div class="container">
		<form action="server/handle.php" method="POST">
			<label for="txtUser">Username</label>
			<input type="text" name="txtUser" id="txtUser">
			<br><br>
			<label for="txtPass">Password</label>
			<input type="password" name="txtPass" id="txtPass">
			<br><br>
			<button type="submit" name="btnLogin">Login</button>
		</form>
		
	</div>
</body>
</html>