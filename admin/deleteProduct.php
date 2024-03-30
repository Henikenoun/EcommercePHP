<?php
    require_once('../models/product.class.php');
    $id = $_GET['id'];
    $product = new Products();
    $products = $product->deleteProduct($id);
    // var_dump($id);
    header('location:listProduct.php');
?>