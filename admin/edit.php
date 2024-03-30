<?php 

    if (isset($_POST['name'])){
        require_once('../models/product.class.php');
        $product = new Products();
        $product->name = $_POST['name'];
        $image = $_FILES['image']['name'];
        $product->categorie = $_POST['categorie'];
        $product->quantite = $_POST['quantite'];
        $product->image = $image=='' ? $product->getProduct($_GET['id'])->fetchColumn(4) : $image; 
        $product->description = $_POST['description'];
        $product->prix = $_POST['prix'];
        $product->solde = $_POST['solde'];
        $product->couleur = $_POST['couleur'] != null ? implode(',', $_POST['couleur']) : '';
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/' . $image);
        $product->EditProduct($_GET['id']);
    }
header('location:listProduct.php');
?>