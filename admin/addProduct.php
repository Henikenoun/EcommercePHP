<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php'); ?>
    <title>Ajouter un produit</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php require_once('../__tiers/verifSession.php') ?>
<?php require_once('../__tiers/header.php') ?>
<?php 
    if(isset($_POST['name'] )){
        require_once('../models/product.class.php');
        $image = $_FILES['image']['name'];
        $product = new Products();
        $product->name = $_POST['name'];
        $product->categorie = $_POST['categorie'];
        $product->quantite = $_POST['quantite'];
        $product->image = $image; 
        $product->description = $_POST['description'];
        $product->prix = $_POST['prix'];
        $product->solde = $_POST['solde'];
        $product->couleur = $_POST['couleur'] != null ? implode(',', $_POST['couleur']) : '';
        $date = new DateTime();
        $product->date = $date->format('Y-m-d');
        var_dump($product);

        move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/' . $image);
        $product->AddProduct();
        header('location:../index.php');
    }
?>
<div class="container mt-5">
    <div class="row justify-content-center border border-azra9">
        <div class="col-11 m-auto">
            <h3 class="mb-5 bg-white w-25 text-center text-azra9" style="margin-top:-20px">Ajouter un produit</h3>
            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Entrez le nom du produit" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="categorie">Catégorie</label>
                        <select name="categorie" class="form-control" id="categorie">
                            <option value="informatique">Informatique</option>
                            <option value="sport">Sport</option>
                            <option value="electromenager">Électroménager</option>
                            <option value="vetement">Vêtements & Chaussures</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantite">Quantité</label>
                        <input type="text" name="quantite" class="form-control" id="quantite" placeholder="Entrez la quantité" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prix">Prix</label>
                        <input type="text" name="prix" class="form-control" id="prix" placeholder="Entrez le prix" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="solde">Solde</label>
                        <input type="text" name="solde" class="form-control" id="solde" placeholder="Entrez le solde" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="couleur">Couleur</label>
                        <select name="couleur[]" class="form-control" id="couleur" multiple>
                            <option value="blanc">Blanc</option>
                            <option value="Rouge">Rouge</option>
                            <option value="Vert">Vert</option>
                            <option value="Bleu">Bleu</option>
                            <option value="Jaune">Jaune</option>
                            <option value="noir">Noir</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <button type="submit" class="btn bg-azra9 mb-5">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="../assets/select2.js"></script>
<?php require_once('../__tiers/footer.php') ?>
</body>
</html>
