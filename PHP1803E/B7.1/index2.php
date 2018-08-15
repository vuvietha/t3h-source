<?php
// khoi tao session
session_start();

// xoa cookie da thiet lap ben trang index.php
setcookie('PHP1803E','',time() - 3600, "/" , "", 0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo cookie</title>
</head>
<body>
    <!-- xu ly lay cookie ma ben index.php truyen sang -->
    <?php
        // lay ra gia tri cua cookie
        $myCookie = $_COOKIE['PHP1803E'] ?? '';
        // lay gia tri session ben trang index.php truyen sang
        $age = $_SESSION['age'] ?? '';
        $email = $_SESSION['email'] ?? '';

        if(isset($_SESSION['mySession'])){
            // huy - xoa 1 session
            unset($_SESSION['mySession']);
        }
        // huy - xoa toan bo session
        session_destroy();
    ?>
    <h1> hello <?= $myCookie; ?></h1>
    <h2>my age : <?= $age; ?></h2>
    <h2>my Email : <?= $email; ?></h2>
    <h2> Name session <?php echo $_SESSION['mySession'] ?? 'khong con ton tai no nua'; ?></h2>
</body>
</html>