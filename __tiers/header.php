<nav class='navbar navbar-expand-lg bg-body-tertiary bg-azra9' style='height:5em;'>
<div class='container-fluid'>
  <?php 
    $foldername = basename(dirname($_SERVER['PHP_SELF']));
    $link = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'index.php' :($foldername == 'produits' ? '../../index.php' : '../index.php'); ?>
      <a class='navbar-brand text-white me-5 text-uppercase' href='<?php echo $link; ?>'>Shipi-Shop</a>
      <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
          <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            <li class='nav-item'>
            <?php 
              $foldername = basename(dirname($_SERVER['PHP_SELF']));
              $link = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'user/sport.php' :'sport.php';
            ?>
              <a class='nav-link active text-white' aria-current='page' href='<?= $link ?>'>Poduits du sport</a>
            </li>
            <li class='nav-item'>
              <?php 
              $foldername = basename(dirname($_SERVER['PHP_SELF']));
              $link = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'user/electro.php' :'electro.php';
              ?>
              <a class='nav-link text-white' href='<?= $link ?>'>Electroménager</a>
            </li>
            <li class='nav-item'>
              <?php 
              $link = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'user/info.php' : 'info.php';
              ?>
              <a class='nav-link text-white' href='<?= $link ?>'>Produits informatique</a>
            </li>
            <li class='nav-item'>
              <?php 
              $link = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'user/vetement.php' : 'vetement.php';
               ?>
              <a class='nav-link text-white' href='<?= $link ?>'>Vêtements & Chaussures</a>
            </li>
              </ul>
          <?php 
          $prod_nb= isset($_SESSION['nb_product']) ? $_SESSION['nb_product'] : 0;
              // URL de la page à récupérer
            $nom_fichier = basename($_SERVER['PHP_SELF']);
            if($_SESSION['image'] == '')
              $avatar = 'img/avatar.svg' ;
            else
              $avatar = 'img/uploaded/'.$_SESSION['image'] ;
            if($nom_fichier == 'index.php'){
              echo"
              <div style='width: 20px;background: red;text-align: center;height: 20px;border-radius: 50%;position: absolute;right: 140px;margin-top: 24px;font-size: 15px;'>".$prod_nb."</div>
                <a class='nav-link' href='user/panier.php'><img src='user/img/cart-shopping-solid (1).svg' alt='' style='width: 35px;cursor:pointer;height:27px;'></a>
                <a class='nav-link' href='user/listCommande.php'><img src='user/img/bag-shopping-solid.svg' alt='' class='mx-3' style='width: 50px;cursor:pointer;height:28px;'></a>
                <img src='user/$avatar' alt='' id='avatar' style='width: 50px;margin-right: 5px;cursor:pointer;height:50px;border-radius:50%'>";
            }else{
              echo"
              <div style='width: 20px;background: red;text-align: center;height: 20px;border-radius: 50%;position: absolute;right: 140px;margin-top: 24px;font-size: 15px;'>".$prod_nb."</div>
                <a class='nav-link' href='panier.php'><img src='img/cart-shopping-solid (1).svg' alt='' style='width: 35px;cursor:pointer;height:27px;'></a>
                <a class='nav-link' href='listCommande.php'><img src='img/bag-shopping-solid.svg' alt='' class='mx-3' style='width: 50px;cursor:pointer;height:28px;'></a>
                <img src='../user/$avatar' id='avatar' style='width:50px;margin-right: 5px;cursor:pointer;height:50px;border-radius:50%'>";
            }
          ?>
          <div class='list d-flex flex-column rounded-bottom-2 invisible bg-azra9' id='list' style='color:white;width: 170px;position: absolute;
  right: 12px;
  top: 80px;
  z-index: 55;'>
            <ul class='navbar-nav d-flex flex-column text-center'>
            <?php 
              $nom_fichier = basename($_SERVER['PHP_SELF']);
              if($nom_fichier == 'index.php'){
                echo"
                  <li class='nav-item border-bottom'>
                      <a class='nav-link text-white' href='user/EditProfil.php'>Modifier votre profile</a>
                  </li>
                  <li class='nav-item border-bottom'>
                      <a class='nav-link  text-white' href='user/resetPassword.php'>Changer le mot de passe</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link  text-white' href='__tiers/deconnexion.php'>logout</a>
                  </li>";
              }else{
                echo"
                  <li class='nav-item border-bottom'>
                      <a class='nav-link text-white' href='../user/EditProfil.php'>Modifier votre profile</a>
                  </li>
                  <li class='nav-item border-bottom'>
                      <a class='nav-link  text-white' href='../user/resetPassword.php'>Changer le mot de passe</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link  text-white' href='../__tiers/deconnexion.php'>logout</a>
                  </li>";
              }
            ?>
            </ul>
          </div>
      </div>
    </div>
    <script>
      avatar = document.getElementById('avatar');
      list = document.getElementById('list');
      avatar.addEventListener('click', () => {
        list.classList.toggle('invisible')
      } );
    </script>
  </nav>
  <!-- <a href="inex.html">hi</a> -->