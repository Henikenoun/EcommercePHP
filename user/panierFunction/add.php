<?php 
    session_start();
    $id = $_GET['id'];
    $key = $_GET['el'];
    $quantite = $_GET['quantite'];
    var_dump($_SESSION['panier'][0]['product']);
    if($key==0){
        if ($quantite < $_SESSION['panier'][0]['product']['quantite']) {
            $_SESSION['panier'][0]['quantity']++;
            $_SESSION['total'] += $_SESSION['panier'][0]['product']['prix']*(1-($_SESSION['panier'][0]['product']['solde']/100));
        }
    }else{
        if ($quantite < $_SESSION['panier'][$id]['product']['quantite']) {
            $_SESSION['panier'][$id]['quantity']++;
            $_SESSION['total'] += $_SESSION['panier'][$id]['product']['prix']*(1-($_SESSION['panier'][$id]['product']['solde']/100));
        }
    }

    header('location:../panier.php');
?>