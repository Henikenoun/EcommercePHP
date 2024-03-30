<?php
require_once('../models/commande.class.php');
$comm = new Commande();
$comm->delete($_GET['id']);
header('location:listCommande.php');
?>