<?php
// khoi tao session
session_start();

// thiet lap cookie
setcookie('PHP1803E','T3H Ha Noi',time()+3600,"/","",0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo Cookie PHP</title>
</head>
<body>
    <?php
        // tao ra 1 session va gan gia tri cho no
        $_SESSION['mySession'] = 'This is Session';
        $_SESSION['age'] = 20;
        $_SESSION['email'] = 'admin@gmail.com';
    ?>
    <h1>Demo Cookie</h1>
    <a href="index2.php"> Go to index2.php</a>
</body>
</html>