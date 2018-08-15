<?php
session_start();

if(isset($_POST['btnLogin'])){
    // lay du lieu tu form gui len
    $user = $_POST['txtUser'] ?? '';
    $user = strip_tags($user);

    $pass = $_POST['txtPass'] ?? '';
    $pass = strip_tags($pass);

    // validate data
    if($user === '' OR $pass === ''){
        header("Location:../login.php?state=fail");
    } else {
        if($user === 'trieunt' && $pass === '123'){
            // lam cai gi do tiep theo
            // tao cac session
            $_SESSION['username'] = $user;
            // cho phep di vao trang home.php
            header('Location:../home.php');
        } else {
            header("Location:../login.php?state=err");
        }
    }
}


?>