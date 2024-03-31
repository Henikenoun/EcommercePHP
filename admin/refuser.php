<?php 
    require_once ('../models/commande.class.php');
    require_once ('../models/product.class.php');
    $model = new Commande();
    $pm = new Products();
    $commande = $model->adminGetCommande($_GET['id'])->fetchAll()[0];
    $date=new DateTime();
    $model->date_rep = $date->format('Y-m-d');
    $model->verif = 2;
    $model->msg = $post['msg'];
    $model->modifier($_GET['id']);
    header('location:commandeRefuser.php');
?>