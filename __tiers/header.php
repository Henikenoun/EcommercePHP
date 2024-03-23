<nav class="navbar navbar-expand-lg bg-body-tertiary" style="height:5em;background:#21D192 !important">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Link</a>
          </li>
        </ul>
          <?php 
            // URL de la page à récupérer
            $nom_fichier = basename($_SERVER['PHP_SELF']);
            if($_SESSION['image'] == '')
              $avatar = 'img/avatar.svg' ;
            else
              $avatar = 'img/uploaded/'.$_SESSION['image'] ;
            if($nom_fichier == 'index.php'){
              echo"
                <img src='user/$avatar' alt='' id='avatar' style='width: 50px;margin-right: -146px;cursor:pointer;height:50px;border-radius:50%'>";
            }else{
              echo"
                <img src='../user/$avatar' id='avatar' style='width:50px;margin-right: -146px;cursor:pointer;height:50px;border-radius:50%'>";
            }
          ?>
          <div class='list d-flex flex-column rounded-bottom-2 invisible' id='list' style='background: #21D192; color:white;width: 170px;margin-top: 225px;position: relative;'>
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
                      <a class='nav-link text-white' href='../__tiers/EditProfil.php'>Modifier votre profile</a>
                  </li>
                  <li class='nav-item border-bottom'>
                      <a class='nav-link  text-white' href='../__tiers/resetPassword.php'>Changer le mot de passe</a>
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