<?php require_once('__tiers/header-admin.php') ?>
<?php 
    require_once('models/commande.class.php');
    $comm = new Commande();
    $commandes=$comm->list()->fetchAll();
?>
<div class='row'>
    <div class='col-10' style='margin-top:100px;margin-left:250px;margin-bottom:300px'>
    <div class="container-fluid contenu">
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
                                                    <th>Action</th>
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
                                                        require_once('models/product.class.php');
                                                        $mod=new Products();
                                                        $prods = json_decode($cmd['produits'], true);
                                                        $num = count($prods);
                                                        $somme=0;
                                                        foreach ($prods as $key => $product) {
                                                            $p = $mod->adminGetProduct($key)->fetchAll()[0];
                                                            $somme+=$p['prix'] * (1 - ($p['solde'] / 100))*$product['quantite'];
                                                            $products .= "<div class='d-flex justify-content-between mt-3'>
                                                                        <div style='width:150px'>" . $p['name'] . "</div>
                                                                        <div style='width:50px'>
                                                                            <img width ='40px'height='40px' src='admin/uploaded/" . $p['image'] . "' />
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
                                                                ";if($cmd['isverif'] == 0)echo"
                                                                <td class='ms-3'>
                                                                    <a class='i text-danger' href='admin/EditCommande.php?id=".$cmd['id']."'>
                                                                        <img width='60px' height='60px' src='user/img/images.png'/>
                                                                    </a>
                                                                </td>";echo"
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
            </div>
    </div>
</div>
<?php require_once('__tiers/footer-admin.php') ?>

                
