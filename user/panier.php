<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../__tiers/fiche.php'); ?>
    <link rel="stylesheet" href="../assets/style.css">
    <title>Ecommerce</title>
</head>
<body>
<?php require_once('../__tiers/verifSession.php'); ?>
<?php require_once('../__tiers/header.php'); ?>

<?php 
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    require_once('../models/product.class.php');
    $model = new Products();
    $product = $model->getProduct($id)->fetch(PDO::FETCH_ASSOC);
    $quantite = $product['quantite'];
    if(empty($_SESSION['panier'])){
      $_SESSION['panier'] = [];
      $_SESSION['nb_product'] = 0;
      $_SESSION['total'] = 0;
    }
    $test=false;
    $total=0;
    foreach($_SESSION['panier'] as $key => $p){
      if($p['product']['id'] == $id) {
        $test=true;
        break;
      }
    }
    if(!$test){
      $_SESSION['panier'][$product['id']] = ['product' => $product, 'quantity' => 1];
      $_SESSION['nb_product']++;
      $_SESSION['total'] += $product['prix']*(1-($product['solde']/100));
    }
  }
?>

<script>
  function supprimerCommande(id) {
    if (confirm('Voulez-vous supprimer cet article ?')) {
      window.location.href = 'deleteProdPanier.php?id=' + id;
    }
  }
</script>

<!-- Form de commande -->
<div class="container-fluid py-5">
<?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])): ?>
<form method="post" action="panierFunction/commande.php">
  <table class="table table-hover text-center">
    <thead>
      <tr>
        <th scope="col">image</th>
        <th scope="col">Nom</th>
        <th scope="col">Quantité Disponible</th>
        <th scope="col">Quantité demandée</th>
        <th scope="col">couleur</th>
        <th scope="col">Prix</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($_SESSION['panier'] as $key=>$product): ?>
      <tr>
        <input type="hidden" name='id[]' value="<?=$product['product']['id']?>">
        <input type="hidden" name='q[]' value="<?=$product['quantity']?>">
        <td><img src="../admin/uploaded/<?php echo $product['product']['image']; ?>" width="40px" alt=""></td>
        <td><?= $product['product']['name']; ?></td>
        <td><?= $product['product']['quantite']; ?></td>
        <td class="d-flex justify-content-between">
          <a class='btn mx-3 bg-light' href="panierFunction/moins.php?id=<?=$product['product']['id'] ?>&quantite=<?=$product['quantity']?>&el=<?=$key?>">-</a>
          <div id="quantity" name="quantity" required class="form-control"><?=$product["quantity"] ?></div>
          <a class='btn mx-3 bg-light' href="panierFunction/add.php?id=<?=$product['product']['id'] ?>&quantite=<?=$product['quantity']?>&el=<?=$key?>">+</a>
        </td>
        <td>
          <select name="couleur[]" id="col" class="form-control">
          <?php foreach(explode(',', $product['product']['couleur']) as $col): ?>
            <option><?= $col ?></option>
          <?php endforeach; ?>
          </select>
        </td>
        <td><?php echo $product['product']['prix']*(1-($product['product']['solde']/100)); ?>DT</td>
        <td>
          <button type="button" class="btn btn-danger w-60" onclick="supprimerCommande(<?php echo  $product['product']['id'] ?>)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
            </svg>
          </button>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <th scope="row">Total</th>
        <td colspan="4"></td>
        <td class="bg-light text-success"><?= $_SESSION['total'] ?></td>
        <td>
          <svg style="position: absolute;margin-top: 19px;margin-left: 18px;color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
          </svg>
          <input type="submit" class="btn bg-vert px-5" value="Confirmer" >
        </td>
      </tr>
    </tbody>
  </table>
</form>
<?php else: ?>
  <h1 class="text-secondary text-center" style="height: 50vh;width: 100vw;padding-top: 150px;">Il n'y a aucun produit ajouté au panier pour le moment.</h1>
  <?php endif; ?>
  </div>
<!-- Fin form de commande -->

<?php require_once('../__tiers/footer.php'); ?>
</body>
</html>
