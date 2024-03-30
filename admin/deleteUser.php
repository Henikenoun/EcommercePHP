<?php
    require_once('../models/user.class.php');
    $id = $_GET['id'];
    $user = new User();
    $products = $user->deleteUser($id);
    // var_dump($id);
    header('location:listUsers.php');
?>