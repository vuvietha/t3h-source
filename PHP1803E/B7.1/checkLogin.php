<?php

function checklogin()
{
    if(getSessionUser() === ''){
        header("Location:login.php");
        die;
    }

    if(getCookieUser() === ''){
        header("Location:login.php");
        die;
    }
}

function checkIsLogined(){
    if(getSessionUser() !== ''){
        header("Location:home.php");
    }
}


function getSessionUser(){
    $user = $_SESSION['username'] ?? '';
    return $user;
}

function getCookieUser(){
    $cookie = $_COOKIE['isLogined'] ?? '';
    return $cookie;
}

?>