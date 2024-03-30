<?php require_once('../__tiers/header-admin.php') ?>
<div class='row col-10'>
    <div style='margin-top:100px; margin-left:260px;'>

<div class="container my-5">
    <div class="row justify-content-center border border-vert" style="border-color: #21D192 !important;">
        <div class="col-11 m-auto">
            <h3 class="mb-5 w-25 text-center text-azra9" style="margin-top:-20px;background:#f8f9fc;">Ajouter un produit</h3>
            <div>
                <form method="post" action='add.php' enctype="multipart/form-data">
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
                    <button type="submit" class="btn bg-azra9 mb-4">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php require_once('../__tiers/footer-admin.php') ?>

