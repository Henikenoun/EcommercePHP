<?php 
session_start();
if(isset($_SESSION['panier'])) {
    foreach($_SESSION['panier'] as $key => $p) {
        if($p['product']['id'] == $_GET['id']) {
            $_SESSION['total'] -= $p['product']['prix'];
            unset($_SESSION['panier'][$key]);
        }
    }
    $_SESSION['panier'] = array_values($_SESSION['panier']);
}
header('location:panier.php');
?>
