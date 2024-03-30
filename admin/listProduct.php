<?php require_once('../__tiers/header-admin.php') ?>
<div class='row col-10'>
    <div style='margin-top:100px; margin-left:260px;'>
        <?php
            require_once('../models/product.class.php');
            $product = new Products();
            $products = $product->listProducts();
        ?>
        <div class="premiere mt-5">
            <div class="container-fluid contenu">
                <main>
                    <h2 class="ms-5 text-azra9">Liste des produits :</h2>
                    <div class="row justify-content-center mt-5">    
                        <div class="col-11">
                            <div class="card mb-4">
                                <div class="card-header header-table ">
                                    <i class="fas fa-table me-1"></i>
                                    Table des produits
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="datatablesSimple table" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Catégorie</th>
                                                    <th>Quantité</th>
                                                    <th>Image</th>
                                                    <th>Prix</th>
                                                    <th>Solde</th>
                                                    <th>Couleur</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($products as $prod){
                                                        echo "<tr>
                                                                <td>".$prod['name']."</td>
                                                                <td>".$prod['categorie']."</td>
                                                                <td>".$prod['quantite']."</td>
                                                                <td><img src='uploaded/".$prod['image']."' width='40' height='40'></td>
                                                                <td>".$prod['prix']."DT</td>
                                                                <td>".($prod['solde'] != 0 ? $prod['solde'] : 'Non')."</td>
                                                                <td>".$prod['couleur']."</td>
                                                                <td class='ps-4'>
                                                                    <a class='i' href='editProduct.php?id=".$prod['id']."'>
                                                                        <i class='fas fa-pen'></i>
                                                                    </a>
                                                                </td>
                                                                <td class='ps-4'>
                                                                    <a class='i text-danger' href='deleteProduct.php?id=".$prod['id']."'>
                                                                        <i class='fas fa-trash'></i>
                                                                    </a>
                                                                </td>
                                                            </tr>";
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


