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
<div class="container mt-5 pt-5">
    <div class="row justify-content-center border border-azra9 pb-5">
        <div class="col-11 m-auto ">
            <h3 class="mb-5 bg-white w-25 text-center text-azra9" style="margin-top:-20px" >Modifier Utilisateur</h3>
            <div>
                <form method="post">
                    <div class="form-group mb-3">
                        <label for="old">L'ancien mot de passe</label>
                        <input type="text" name="old" class="form-control" id="old" placeholder="Entrez votre nom">
                        <?php 
                            if(isset($_POST['old']) && isset($_POST['pass']) ){
                                require_once('../models/user.class.php');
                                $user = new User();
                                $user->password = $_POST['pass'];
                                // var_dump($_SESSION);
                                if($_SESSION['password'] == $_POST['old']){
                                    $user->modifPass($_SESSION['id']); 
                                    $_SESSION['password'] = $_POST['pass'];
                                    header('location:../index.php');
                                }else{
                                    echo "<div class='text-danger'>mot de passe incorrect</div>";
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="new">Le nouveau mot de passe</label>
                        <input type="text" name="pass" class="form-control" id="new" placeholder="Entrez votre nom" minlength="8" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,}$" required>
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