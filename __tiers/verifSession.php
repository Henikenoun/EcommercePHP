<?php
    session_start();
    if(empty($_SESSION['name'])){
        header("location:user/login.php");
    }
?>