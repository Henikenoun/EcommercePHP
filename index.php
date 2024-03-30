<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('__tiers/fiche.php') ?>
    <link rel="stylesheet" href="assets/style.css">
    <title>Ecommerce</title>
</head>
<body style="background: #bdbfc1;">
<?php require_once('__tiers/verifSession.php') ?>
<?php require_once('__tiers/header.php') ?>
<?php 
require_once('models/product.class.php');

// Initialisation des variables
$prod = new Products();
$products = $prod->listProductsI()->fetchAll();
$solde = [];
$s=0;
$info = [];
$i=0;
$sport = [];
$sp=0;
$vetement = [];
$v=0;
$electro = [];
$e=0;
$new = [];
$n=0;

// Traitement des produits
foreach($products as $p){
    switch($p['categorie']){
        case 'informatique': $info[] = $p; break;
        case 'sport': $sport[] = $p; break;
        case 'vetement': $vetement[] = $p; break;
        case 'electromenager': $electro[] = $p; break;
    }
    if($p['solde'] != 0){
        $solde[] = $p;
    }
    $dateNow= new DateTime();
    $diff = $dateNow->diff(new DateTime($p['date']));
    if($diff->days < 30){
        $new[] = $p;
    }
}
function slider($item,$index) {
    $slide = "<div class='d-flex scroll-container overflow-auto' style='height: 380px;overflow-y:hidden !important;'>";
    $count = 0; 
    foreach($item as $it) {
        if($count < 9) { 
            if($index == 1)
                $img = "<div style='width: 28px;background: white;position: absolute;height: 17px;margin-top: 10px;margin-left: 7px;'></div>
                        <img width='40' height='40' style='position:absolute' src='user/img/new.png'/>
                        <img width='200' height='200' src='admin/uploaded/".$it['image']."'/>" ;
            else 
            $img= "<img width='200' height='200' src='admin/uploaded/".$it['image']."'/>" ;
            
            if($it['solde'] != 0)
                $soldé = "<div style='width: 40px;font-size: 11px;background: rgba(255,93,62,0.6);color: white;position: absolute;right: 6px;top: 7px;padding: 4px;'>-".$it['solde']." %</div>";
            else
                $soldé="";

            $prix = $it['solde'] == 0 ? "<span class='text-success'>".$it['prix']."DT</span>" : "<span class='text-danger'><del>".$it['prix']."DT</del></span> ==> <span class='text-success'>".$it['prix']*(1-$it['solde']/100)."DT</span>";
            $prod = "<div class='flex-shrink-0 me-2' style='width: 200px; height: 200px;'>
                        <div class='card mt-3'>
                            <div class='card-header' style='padding:0;'>
                                ".$soldé.$img."
                            </div>
                            <div class='card-body' style='font-size:15px;'>
                                ".$it['name']." <p>".$prix."</p><a class='btn bg-azra9' href='user/SingleProduct.php?id=".$it['id']."'>Details</a>
                            </div>
                        </div>
                    </div>";
            $slide .= $prod;
            $count++; 
        } else {
            break; 
        }
    }
    $slide .= "</div>"; 
    return $slide;
}

?>

<div id="carouselExampleInterval" class="carousel slide bg-dark" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="user/img/welcome.jpeg" class="d-block w-100" alt="..." height="500">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="user/img/solde.jpeg" class="d-block w-100" alt="..." height="500">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="user/img/512387-PIL6PZ-662.jpg" class="d-block w-100" alt="..." height="500">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container rounded" style="background: #eceff1;">
    <div class="row">
        <div class="col-10 m-auto rounded-3 mb-5" style="background: white;padding: 0;box-shadow: -1px -3px 40px 5px #5fcfc7;">
    <img src="user/img/DB_Sport.jpg" alt="" class="w-100" style="height: 300px;">
    <div class='bg-azra9 h-25 p-3 ' style="margin-bottom: -12px;">
        <h3>Découvrez nos meilleurs deals du moment</h3>
        <a href="user/solde.php" class="float-end nav-link" style="margin-top: -40px;">plus</a>
    </div>
    
            <!-- echantillon -->
            
            <!-- section offre -->
            <?php 
            if($solde)echo slider($solde,0) ;?>
            <!-- section new -->
            <?php 
            if($new){
                echo "<img src='user/img/new1.jpg' alt='' class='w-100' style='height: 300px;'>
                <div class='bg-azra9 h-25 p-3 ' style='margin-bottom: -12px;'>
                    <h3> Nouveauté & Remises | Boutique Officielle</h3>
                    <a href='user/new.php' class='float-end nav-link' style='margin-top: -40px;'>plus</a>
                </div>" ;
                echo slider($new,1) ;
            }?>
            <!-- section recemonded -->

            <!-- section sport -->
            <?php 
            if($sport){
                echo "<img src='user/img/sport.jpg' alt='' class='w-100' style='height: 300px;'>
                <div class='bg-azra9 h-25 p-3 ' style='margin-bottom: -12px;'>
                    <h3>Découvrez notre gamme des produits Sportif</h3>
                    <a href='user/sport.php' class='float-end nav-link' style='margin-top: -40px;'>plus</a>
                </div>" ;
                echo slider($sport,2);}?>
            <!-- section info -->
            <?php 
            if($info){
                echo "<img src='user/img/info.jpg' alt='' class='w-100' style='height: 300px;'>
                <div class='bg-azra9 h-25 p-3 ' style='margin-bottom: -12px;'>
                    <h3>Découvrez notre gamme des produits Informatique</h3>
                    <a href='user/info.php' class='float-end nav-link' style='margin-top: -40px;'>plus</a>
                </div>" ;
                echo slider($info,2) ;}?>

            <!-- section electro  -->
            <?php 
            if($electro){
                echo "<img src='user/img/electro.jpg' alt='' class='w-100' style='height: 300px;'>
                <div class='bg-azra9 h-25 p-3 ' style='margin-bottom: -12px;'>
                    <h3>Découvrez notre gamme des produits Électroménager</h3>
                    <a href='user/electro.php' class='float-end nav-link' style='margin-top: -40px;'>plus</a>
                </div>" ;
                echo slider($electro,2) ;}?>

            <!-- section vetement -->
            <?php 
            if($vetement){
                echo "<img src='user/img/vetement.jpg' alt='' class='w-100' style='height: 300px;'>
                <div class='bg-azra9 h-25 p-3 ' style='margin-bottom: -12px;'>
                    <h3>Découvrez notre gamme des Vêtements & Chaussures</h3>
                    <a href='user/vetement.php' class='float-end nav-link' style='margin-top: -40px;'>plus</a>
                </div>" ;
                echo slider($vetement,2) ;}?>



</div>
        </div>
    </div>
</div>
<?php require_once('__tiers/footer.php') ?>

</body>
</html>