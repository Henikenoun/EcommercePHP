<?php
session_start();
$ids=$_POST['id'];
$quantites=$_POST['q'];
$coluleurs=$_POST['couleur'];
$produits=[];
for($i=0;$i<count($quantites);$i++){
    $produits[$ids[$i]] = ["quantite" => $quantites[$i] , "couleur" => $coluleurs[$i]];
}
$user=$_SESSION["id"];
$produits=json_encode($produits);
require_once('../../models/commande.class.php');
$comm = new Commande();
$comm->addCommande($user,$produits);
$_SESSION['panier'] = [];
$_SESSION['nb_product'] = 0;
$_SESSION['total'] = 0;
header('location:../listCommande.php');

?>