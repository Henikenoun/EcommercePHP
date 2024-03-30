<?php 
    if(isset($_POST['name'] )){
        require_once('../models/product.class.php');
        $image = $_FILES['image']['name'];
        $product = new Products();
        $product->name = $_POST['name'];
        $product->categorie = $_POST['categorie'];
        $product->quantite = $_POST['quantite'];
        $product->image = $image; 
        $product->description = $_POST['description'];
        $product->prix = $_POST['prix'];
        $product->solde = $_POST['solde'];
        $product->couleur = $_POST['couleur'] != null ? implode(',', $_POST['couleur']) : '';
        $date = new DateTime();
        $product->date = $date->format('Y-m-d');

        move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/' . $image);
        $product->AddProduct();
        header('location:listProduct.php');
    }
?>