<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php') ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Ecommerce</title>
</head>
<body style="background: #bdbfc1;">
<?php require_once('../__tiers/verifSession.php') ?>
<?php require_once('../__tiers/header.php') ?>
<?php 
    require_once('../models/product.class.php');
    $model = new Products();
    $new = $model->getProductByCategory('electromenager')->fetchAll();
?>
<img src="img/electro.jpg" alt="" height="400px" class="w-100" />
<h1 style="text-align: center;position: absolute;top: 200px;left: 320px;color: white;text-transform: uppercase;">DÉCOUVREZ NOTRE GAMME D'ÉLECTROMÉNAGER</h1>

<div class="container rounded-bottom" style="background: #eceff1;">
    <div class="row">
        <div class="col-10 m-auto rounded-bottom mb-5 row" style="background: white;padding: 0;">
        <?php  
        if($new[0]['solde']==0)
            $sold='';
        else
        $sold = "<div style='width: 40px;font-size: 11px;background: rgba(255,93,62,0.6);color: white;position: absolute;right: 20px;top: 15px;padding: 4px;'>-".$new[0]['solde']." %</div>";
         $prix = $new[0]['solde'] == 0 ? "<span class='text-success'>".$new[0]['prix']."DT</span>" : "<span class='text-danger'><del>".$new[0]['prix']."DT</del></span> ==> <span class='text-success'>".$new[0]['prix']*(1-$new[0]['solde']/100)."DT</span>";
         foreach ($new as $n)
         echo"
            <div class='col-3 my-3'>
                <div class='card'>
                    <div class='card-header'>".$sold."
                        <img src='../admin/uploaded/".$new[0]['image']."' width='220' height='220' class='rounded' />
                    </div>
                    <div class='card-body'>
                    ".$new[0]['name']." <p>".$prix."</p><a class='btn bg-azra9' href='SingleProduct.php?id=".$new[0]['id']."'>Details</a>
                    </div>
                </div>
            </div>
            ";?>
        </div>
    </div>
</div>
<?php require_once('../__tiers/footer.php') ?>
</body>
</html>