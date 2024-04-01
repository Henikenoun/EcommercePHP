<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    ob_start();
            $link = basename($_SERVER['PHP_SELF']);
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-commerce</title>
    <script src="https://kit.fontawesome.com/a81368914c.js" defer></script>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <?php 
        if($link == 'admin.php'){
          echo "<link href='css-admin/sb-admin-2.min.css' rel='stylesheet'>";
          echo"<script src='assets/dataSimple.js' defer></script>";
          echo "<link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>";
          echo "<link rel='stylesheet' href='assets/style.css'>";
        require_once('__tiers/fiche.php') ;
        require_once('__tiers/verifSession.php') ;
        require_once('__tiers/verifierAdmin.php'); 
        }else{
            echo "<link href='../css-admin/sb-admin-2.min.css' rel='stylesheet'>";
            echo"<script src='../assets/dataSimple.js' defer></script>";
            echo "<link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>";
            echo "<link rel='stylesheet' href='../assets/style.css'>";
            require_once('../__tiers/fiche.php') ;
            require_once('../__tiers/verifSession.php');
            require_once('../__tiers/verifierAdmin.php');
        }
        
    ?>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-azra9 sidebar sidebar-dark accordion" id="accordionSidebar" style='position: fixed;z-index: 100;'>
            <!-- Sidebar - Brand -->
            <?php $a= $link=='admin.php'?'admin.php' : '../admin.php' ; ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$a?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <?php $a= $link=='admin.php'?'admin/' : '' ; ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?=$a.'listProduct.php' ?>" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=$a.'addProduct.php' ?>" >
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un produit</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=$a.'listProduct.php' ?>" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>liste des produits</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=$a.'listUsers.php' ?>" >
                    <i class="fas fa-user"></i>
                    <span>liste des utilisateurs</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
<!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=$a.'commandeAccepter.php' ?>" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Commandes acceptées</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=$a.'commandeRefuser.php' ?>" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Commandes refusées</span>
                </a>
            </li>
            <!-- Divider -->
            <!-- Divider -->

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex" style="margin-top: 250px;">
                <p class="text-center mb-2"><strong>connecté en tant que : <span class='text-vert'> <?= $_SESSION['name'] ;?></span> </strong></p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar bg-azra9 topbar mb-4 static-top shadow d-flex justify-content-end" style="position: fixed;right: -2px;width: 88%;z-index: 2;">
                    <?php 
                        // URL de la page à récupérer
                        $nom_fichier = basename($_SERVER['PHP_SELF']);
                        if($_SESSION['image'] == '')
                        $avatar = 'img/avatar.svg' ;
                        else
                        $avatar = 'img/uploaded/'.$_SESSION['image'] ;
                        if($nom_fichier == 'admin.php'){
                        echo"
                            <img class='rounded-5 float-left' width='50' src='user/$avatar' alt='' id='avatar' style='margin-top:-220px;margin-right:-140px;'>";
                        }else{
                        echo"
                            <img class='rounded-5 float-left' width='50' src='../user/$avatar' id='avatar' style='margin-top: -220px;margin-right:-154px;'>";
                        }
                    ?>
                    <div class='list d-flex flex-column rounded-bottom-2 invisible bg-azra9 me-2' id='list' style='width: 180px;margin-top: 62px;position: relative;'>
                        <ul class='navbar-nav d-flex flex-column text-center'>
                        <?php 
                        $nom_fichier = basename($_SERVER['PHP_SELF']);
                        if($nom_fichier == 'admin.php'){
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
                                <a class='nav-link text-center  text-white' href='../__tiers/deconnexion.php'>logout</a>
                            </li>";
                        }
                        
                        ob_end_flush();
                        ?>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->