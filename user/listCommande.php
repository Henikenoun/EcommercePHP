<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php') ?>
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous" defer></script>
    <script src='../assets/dataSimple.js' defer></script>
    <?php require_once('../__tiers/verifSession.php') ?>
    <title>Ecommerce</title>
</head>
<body class="overflow-x-hidden">
    <?php require_once('../__tiers/header.php') ?>
    <div class='row'>
    <div>
        <?php 
            require_once('../models/commande.class.php');
            $comm = new Commande();
            $commandes=$comm->listByUser($_SESSION['id'])->fetchAll();
        ?>
        <div class="premiere mt-5">
            <div class="container-fluid contenu">
                <?php if($commandes[0]): ?>
                    <main>
                        <h2 class="ms-5 text-azra9">Liste des produits :</h2>
                        <div class="row justify-content-center mt-5">    
                            <div class="col-11">
                                <div class="card mb-4">
                                    <div class="card-header header-table ">
                                        <i class="fas fa-table me-1"></i>
                                        Table des Commande
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="datatablesSimple table" id="mytable">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Date</th>
                                                        <th>Prix Total</th>
                                                        <th>Etat</th>
                                                        <th>Delete</th>
                                                        <th rowspan="4" class='text-center'>
                                                            <div class='d-flex justify-content-between mt-3'>
                                                                <div style='width:120px'><strong>Name</strong></div>
                                                                    <div style='width:50px'>
                                                                        <strong>Image</strong>
                                                                    </div>
                                                                    <div style='width:70px'>
                                                                        <strong>Quantite</strong>
                                                                    </div>
                                                                    <div style='width:50px'>
                                                                        <strong>Prix</strong>
                                                                    </div>
                                                                    <div style='width:70px'>
                                                                        <strong>Couleur</strong>
                                                                    </div>
                                                                </div>
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($commandes as $cmd){
                                                            if($cmd['isverif']==0){
                                                                $products="";
                                                                require_once('../models/product.class.php');
                                                                $mod=new Products();
                                                                $prods = json_decode($cmd['produits'], true);
                                                                $num = count($prods);
                                                                $somme=0;
                                                                foreach ($prods as $key => $product) {
                                                                    $p = $mod->getProduct($key)->fetchAll()[0];
                                                                    $somme+=$p['prix'] * (1 - ($p['solde'] / 100))*$product['quantite'];
                                                                    $products .= "<div class='d-flex justify-content-between mt-3'>
                                                                                <div style='width:150px'>" . $p['name'] . "</div>
                                                                                <div style='width:50px'>
                                                                                    <img width ='40px'height='40px' src='../admin/uploaded/" . $p['image'] . "' />
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " .$product['quantite']."
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " . $p['prix'] * (1 - ($p['solde'] / 100)) . "DT
                                                                                </div>
                                                                                
                                                                                <div style='width:50px'>
                                                                                " . $product['couleur'] . "
                                                                                </div>
                                                                                </div>
                                                                                ";
                                                                
                                                                    
                                                                }

                                                                echo "<tr>
                                                                        <td>".$cmd['id']."</td>
                                                                        <td>".$cmd['date']."</td>
                                                                        <td>".$somme."DT</td>
                                                                        <td class='text-warning'>en cours ...</td>
                                                                        ";if($cmd['isverif'] == 0)echo"
                                                                        <td class='ms-3'>
                                                                            <a class='i text-danger' href='deleteCommande.php?id=".$cmd['id']."'>
                                                                                <img width='60px' height='60px' src='img/images.png'/>
                                                                            </a>
                                                                        </td>";echo"
                                                                        <td colspan=" . $num . ">
                                                                        ".$products."
                                                                        </td>
                                                                    
                                                                        </tr>";
                                                            }
                                                            else if($cmd['isverif']==1){
                                                                $products="";
                                                                require_once('../models/product.class.php');
                                                                $mod=new Products();
                                                                $prods = json_decode($cmd['produits'], true);
                                                                $num = count($prods);
                                                                $somme=0;
                                                                foreach ($prods as $key => $product) {
                                                                    $p = $mod->getProduct($key)->fetchAll()[0];
                                                                    $somme+=$p['prix'] * (1 - ($p['solde'] / 100))*$product['quantite'];
                                                                    $products .= "<div class='d-flex justify-content-between mt-3'>
                                                                                <div style='width:150px'>" . $p['name'] . "</div>
                                                                                <div style='width:50px'>
                                                                                    <img width ='40px'height='40px' src='../admin/uploaded/" . $p['image'] . "' />
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " .$product['quantite']."
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " . $p['prix'] * (1 - ($p['solde'] / 100)) . "DT
                                                                                </div>
                                                                                
                                                                                <div style='width:50px'>
                                                                                " . $product['couleur'] . "
                                                                                </div>
                                                                                </div>
                                                                                ";
                                                                
                                                                    
                                                                }

                                                                echo "<tr>
                                                                        <td>".$cmd['id']."</td>
                                                                        <td>".$cmd['date']."</td>
                                                                        <td>".$somme."DT</td>
                                                                        <td class='text-success'>Acceptée</td>
                                                                        <td class='text-success'>".$cmd['msg']."</td>         
                                                                        <td colspan=" . $num . ">
                                                                        ".$products."
                                                                        </td>
                                                                    
                                                                        </tr>";
                                                            }
                                                            else{
                                                                $products="";
                                                                require_once('../models/product.class.php');
                                                                $mod=new Products();
                                                                $prods = json_decode($cmd['produits'], true);
                                                                $num = count($prods);
                                                                $somme=0;
                                                                foreach ($prods as $key => $product) {
                                                                    $p = $mod->getProduct($key)->fetchAll()[0];
                                                                    $somme+=$p['prix'] * (1 - ($p['solde'] / 100))*$product['quantite'];
                                                                    $products .= "<div class='d-flex justify-content-between mt-3'>
                                                                                <div style='width:150px'>" . $p['name'] . "</div>
                                                                                <div style='width:50px'>
                                                                                    <img width ='40px'height='40px' src='../admin/uploaded/" . $p['image'] . "' />
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " .$product['quantite']."
                                                                                </div>
                                                                                <div style='width=50px'>
                                                                                " . $p['prix'] * (1 - ($p['solde'] / 100)) . "DT
                                                                                </div>
                                                                                
                                                                                <div style='width:50px'>
                                                                                " . $product['couleur'] . "
                                                                                </div>
                                                                                </div>
                                                                                ";
                                                                
                                                                    
                                                                }

                                                                echo "<tr>
                                                                        <td>".$cmd['id']."</td>
                                                                        <td>".$cmd['date']."</td>
                                                                        <td>".$somme."DT</td>
                                                                        <td class='text-danger'>Refusée</td>
                                                                        <td class='text-danger'>".$cmd['msg']."</td>         
                                                                        <td colspan=" . $num . ">
                                                                        ".$products."
                                                                        </td>
                                                                    
                                                                        </tr>";
                                                            }
                                                            
                                                            

                                                    }
                                                    
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php require_once('../__tiers/footer.php') ?>
</body>
</html>
