<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php'); ?>
    <title>modifier le profil</title>
</head>
<body>
<?php require_once('../__tiers/verifSession.php') ?>
<?php require_once('../__tiers/header.php') ?>
<?php 
    if(isset($_POST['name'] )){
        require_once('../models/user.class.php');
        $image=$_FILES['image']['name'];
        $user = new User();
        $user->nom = $_POST['name'];
        $user->prenom = $_POST['prenom'];
        $user->tel = $_POST['tel'];
        $user->image = $image;
        move_uploaded_file($_FILES['image']['tmp_name'],'img/uploaded/'.$image);
        // var_dump($_SESSION);
        $_SESSION['image'] = $image ;
        $_SESSION['nom'] = $_POST['name'] ;
        $_SESSION['prenom'] = $_POST['prenom'] ;
        $_SESSION['tel'] = $_POST['tel'] ;
        $_SESSION['image'] = $image ;
        $user->modifUser($_SESSION['id']);
        header('location:../index.php');
    }
  ?>
<div class="container mt-5">
    <div class="row justify-content-center border border-azra9">
        <div class="col-11 m-auto ">
            <h3 class="mb-5 bg-white w-25 text-center text-azra9" style="margin-top:-20px" >Modifier Utilisateur</h3>
            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="username">Nom</label>
                        <input type="text" name="name" class="form-control" id="username" placeholder="Entrez votre nom " value='<?= $_SESSION['name']; ?>'>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrez votre prenom " value='<?= $_SESSION['prenom']; ?>'>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value='<?= $_SESSION['email']; ?>' disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tel">telephone</label>
                        <input type="text" name="tel" class="form-control" id="tel" value='<?= $_SESSION['tel']; ?>' placeholder="Entrez votre numéro ">
                    </div>
                    <div class="form-group mb-3">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="image" class="form-control-file" id="avatar">
                    </div>
                    <button type="submit" class="btn bg-azra9 mb-5">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
  </div>
  <?php require_once('../__tiers/footer.php') ?>
</body>
</html>