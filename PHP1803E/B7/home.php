<?php
session_start();
require_once 'checkLogin.php';
checkLogin();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>This is home page</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$username = $_SESSION['username']??'';

	?>
	<h1>Welcome: <?=$username;?></h1>
	<a href="logout.php">Logout</a>
</body>
</html>