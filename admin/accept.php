<?php 
    require_once ('../models/commande.class.php');
    require_once ('../models/product.class.php');
    $model = new Commande();
    $pm = new Products();
    $commande = $model->adminGetCommande($_GET['id'])->fetchAll()[0];
    foreach (json_decode($commande['produits'],true) as $key => $value) {
        $produit = $pm->getProduct($key)->fetchAll()[0];
        $pm->quantite = $produit['quantite']-$value['quantite'];
        $pm->EditProductQ($produit['id']);
    }
    $date=new DateTime();
    $model->date_rep = $date->format('Y-m-d');
    $model->verif = 1;
    $model->msg = 'Votre commande a été acceptée avec succès';
    $model->modifier($_GET['id']);
    header('location:commandeAccepter.php');
?>