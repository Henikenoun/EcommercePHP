<?php require_once('../__tiers/header-admin.php') ?>
<?php 
    require_once('../models/commande.class.php');
    $comm = new Commande();
    $commandes=$comm->lister()->fetchAll();
?>
<div class='row'>
    <div class='col-10' style='margin-top:100px;margin-left:250px;margin-bottom:300px'>
    <div class="container-fluid contenu">
                <main>
                    <h2 class="ms-5 text-azra9">Commande Refusées:</h2>
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
                                                    <th>Date_refuse</th>
                                                    <th>User</th>
                                                    <th>raison</th>
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
                                                        if($cmd['isverif'] ==2 ){
                                                        $products="";
                                                        require_once('../models/product.class.php');
                                                        require_once('../models/user.class.php');
                                                        $users=new User();
                                                        $user=$users->getUser($cmd['id_user'])->fetchAll()[0]['nom'];
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
                                                                            <img width ='40px'height='40px' src='uploaded/" . $p['image'] . "' />
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
                                                                <td>".$cmd['date_reponse']."</td>
                                                                <td>".$user."</td>
                                                                <td>".$cmd['msg']."</td>
                                                                ";echo"
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
<?php require_once('../__tiers/footer-admin.php') ?>

                
