<?php require_once('../__tiers/header-admin.php') ?>
<div class='row col-10'>
    <div style='margin-top:100px; margin-left:260px;'>

<?php 
    require_once('../models/product.class.php');
    $product = new Products();
    $product = $product->getProduct($_GET['id'])->fetchAll();
?>
<div class="container my-5">
    <div class="row justify-content-center border border-azra9">
        <div class="col-11 m-auto">
            <h3 class="mb-5 w-25 text-center text-azra9" style="margin-top:-20px;background:#f8f9fc;">Modifier un produit</h3>
            <div>
                <form method="post" action="edit.php" enctype="multipart/form-data">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                    <div class="form-group mb-3">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Entrez le nom du produit" value="<?php echo $product[0]["name"]; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="categorie">Catégorie</label>
                        <select name="categorie" class="form-control" id="categorie">
                            <!-- Options de catégorie -->
                            <option value="informatique" <?php if($product[0]['categorie'] == "informatique") echo "selected"; ?>>Informatique</option>
                            <option value="sport" <?php if($product[0]['categorie'] == "sport") echo "selected"; ?>>Sport</option>
                            <option value="electromenager" <?php if($product[0]['categorie'] == "electromenager") echo "selected"; ?>>Électroménager</option>
                            <option value="vetement" <?php if($product[0]['categorie'] == "vetement") echo "selected"; ?>>Vêtements & Chaussures</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantite">Quantité</label>
                        <input type="text" name="quantite" class="form-control" id="quantite" placeholder="Entrez la quantité" value="<?php echo $product[0]['quantite']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"><?php echo $product[0]["description"]; ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prix">Prix en DT</label>
                        <input type="text" name="prix" class="form-control" id="prix" placeholder="Entrez le prix" value="<?php echo $product[0]['prix']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="solde">Solde</label>
                        <input type="text" name="solde" class="form-control" id="solde" placeholder="Entrez le solde" value="<?php echo $product[0]['solde']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="couleur">Couleur</label>
                        <select name="couleur[]" class="form-control" id="couleur" multiple>
                            <!-- Options de couleur -->
                            <option value="Rouge" <?php if(in_array("Rouge", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Rouge</option>
                            <option value="blanc" <?php if(in_array("blanc", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Blanc</option>
                            <option value="Vert" <?php if(in_array("Vert", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Vert</option>
                            <option value="Bleu" <?php if(in_array("Bleu", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Bleu</option>
                            <option value="Jaune" <?php if(in_array("Jaune", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Jaune</option>
                            <option value="noir" <?php if(in_array("noir", explode(",", $product[0]['couleur']))) echo "selected"; ?>>Noir</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        <img src="uploaded/<?php echo $product[0]['image'] ?>" alt="" width="60" height="60">
                    </div>
                    <button type="submit" class="btn bg-azra9 mb-5">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('../__tiers/footer-admin.php') ?>