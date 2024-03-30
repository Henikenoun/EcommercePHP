<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php') ?>
    <title>details produit</title>
</head>
<body>
<?php require_once('../__tiers/verifSession.php') ?>
<?php require_once('../__tiers/header.php') ?>
<?php 
            require_once('../models/product.class.php');
            $id = $_GET['id'];
            $product = new Products();
            $details= $product->getProduct($id)->fetchAll()[0];
            // var_dump($details['id']);
?>
    <div class="container mt-5">
        <h1 class="text-azra9"><?= $details['name'] ?></h1>
        <div class='product-details row mt-5'>
            <div class='product-image col-6'>
                <img src="../admin/uploaded/<?=$details['image']?>" class='rounded ms-3' alt='Product Image' width="500">
            </div>
            <div class='product-description col-5'>
                <p><?=$details['description']?></p>
                <p><strong>Categorie : </strong> <?=$details['categorie']?></p>
                <?php 
                    if($details['couleur'] != '')
                        $couleurs = explode(',', $details['couleur']);
                        
                        echo "<p><strong>Couleur disponible : </strong>";
                            foreach($couleurs as $col) {
                                echo "<span class='text-secondary'>". $col . "</span> - ";
                            }   
                        echo "</p>";
                ?>
                <p><strong>Quantité disponible : </strong> <?=$details['quantite']?></p>
                <?php 
                    echo "<p><strong>Prix : </strong>";
                    if($details['solde'] != 0){
                        
                        echo "<span class='text-danger'><del>".$details['prix']."DT</del></span> ==>
                        <span class='text-success'>".(float)$details['prix']*(1- $details['solde']/100)."DT</span>
                        "; 
                        echo "</p>";
                    }else echo"<span class='text-success'>".$details['prix']."DT</span>";
                ?>
                <a  href="panier.php?id=<?php echo $details['id']; ?>" class="btn bg-azra9 p-3 ms-3 mt-5"><img src="img/cart-shopping-solid (1).svg" class='me-5' alt="" width="20"> J'achète</a>
            </div>
        </div>
    </div>

<?php require_once('../__tiers/footer.php') ?>
</body>
</html>