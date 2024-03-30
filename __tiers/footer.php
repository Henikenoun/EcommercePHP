  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-dark mt-5"
          style="background-color: #ECEFF1"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4 text-white bg-azra9"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Rejoignez-nous sur les réseaux sociaux :</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Entreprise</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
            Découvrez Shipi-Shop - Votre Boutique en Ligne <br>
            Plongez dans notre sélection soigneusement choisie, alliant qualité et variété.
             Explorez dès maintenant pour des découvertes qui vous surprendront.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Produits</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <?php 
              $a = basename($_SERVER['PHP_SELF']) == 'index.php' ? 'user/' :'';
            ?>
            <p>
              <a href="<?= $a?>info.php" class="text-dark">Informatique</a>
            </p>
            <p>
              <a href="<?= $a?>sport.php" class="text-dark">sport</a>
            </p>
            <p>
              <a href="<?= $a?>electro.php" class="text-dark">Électroménager</a>
            </p>
            <p>
              <a href="<?= $a?>vetement.php" class="text-dark">Vêtements & Chaussures</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Liens utiles</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">Shipi shop services</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Devenir un affiliée</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Frais d'envoi</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Aide</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fas fa-home mr-3"></i> Sfax, 3001, Tunisia</p>
            <p><i class="fas fa-envelope mr-3"></i> shipiShop@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 216 25874581</p>
            <p><i class="fas fa-print mr-3"></i> + 216 12345678</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2024 Copyright:
      <?php 
              $nom_fichier = basename($_SERVER['PHP_SELF']);
              if($nom_fichier == 'index.php'){
                echo"<a class='text-dark' href='index.php'>Ecommerce.com</a>";
              }else{
                echo"<a class='text-dark' href='../index.php'>Ecommerce.com</a>";
              }
            ?>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->