<?php
    session_start();
    $link = basename($_SERVER['PHP_SELF']);
    if(empty($_SESSION['name'])){
        if($link=='index.php')
            header("location:user/login.php");
        elseif ($link=='amin.php') {
            header("location:../user/login.php");
        }else
            header("location:login.php");
    }
?>