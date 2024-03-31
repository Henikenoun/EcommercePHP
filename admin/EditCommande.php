<?php require_once('../__tiers/header-admin.php') ?>
<?php 
    require_once('../models/commande.class.php');
    require_once('../models/user.class.php');
    require_once('../models/product.class.php');
    $comm = new Commande();
    $mod=new Products();
    $commande = $comm->adminGetCommande($_GET['id'])->fetchAll()[0];
    $products =json_decode($commande['produits'],true);
    $user=new User();
    $user=new User();
    $us = $user->getUser($commande['id_user'])->fetchAll()[0];
?>

<div class='row col-10'>
    <div style='margin-top:100px;margin-bottom:300px;margin-left:260px;'>
        
        <div class="container my-5">
            <div class="row justify-content-center border border-vert" style="border-color: #21D192 !important;">
                <div class="col-11 m-auto">
                    <h3 class="mb-5 w-25 text-center text-azra9" style="margin-top:-20px;background:#f8f9fc;">Details Commande</h3>
                    <div class="mb-5">
                        <div>Nom d'utilisateur qui passer la commande: <strong><?= $us['nom'] .' '. $us['prenom'] ?></strong></div>
                        <div>
                            les produits commander :
                            <?php 
                                $somme=0;
                                foreach($products as $key=>$p){
                                $prod=$mod->getProduct($key)->fetchAll()[0];
                                    echo $p['quantite']." de ".$prod['name']." de prix ".$prod['prix']*(1-$prod['solde']/100)."DT 
                                    de couleur ".$p['couleur']."  <img width='50' src='uploaded/".$prod['image']."' />";
                                    $somme+=$prod['prix']*(1-$prod['solde']/100);
                                }
                            ?>
                        </div>
                        <div>
                            le prix totale de commande est <strong><?= $somme ?>DT</strong>
                        </div>
                    </div>
                    <?php if ($commande['isverif'] == 0) { ?>
                        <div class="my-5">
                            <a type="submit" class="btn btn-success me-3" href='accept.php?id=<?=$commande['id']?>'>Accepter</a>
                            <a type="submit" class="btn btn-danger me-3"  onclick="msg(event)">Refuser</a>
                        </div>
                    <?php } ?>
                        <div class="d-none mb-5" id='msg'>
                            <h4>Quelle est la raison de refuser cette commande ?</h4>
                            <form action="refuser.php?id=<?=$commande['id']?>" method="post">
                                <textarea class="form-control mb-3" type="text" name="msg" ></textarea>
                                <input class="btn bg-azra9" type="submit" value="Envoyer">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function msg(e){
        e.preventDefault();
        div = document.getElementById( 'msg' );
        div.classList.remove("d-none");
        console.log(e);
    }
</script>
<?php require_once('../__tiers/footer-admin.php') ?>
