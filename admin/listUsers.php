<?php require_once('../__tiers/header-admin.php') ?>
<div class='row col-10'>
    <div style='margin-top:100px; margin-left:260px;'>
    <?php
        require_once('../models/user.class.php');
        $user = new User();
        $users = $user->affUser();
    ?>
    <div class="premiere my-5">
        <div class="container-fluid contenu">
            <main>
                <h2 class="ms-5 text-azra9">Liste des utilisateurs :</h2>
                <div class="row justify-content-center mt-5">    
                    <div class="col-11">
                        <div class="card mb-4">
                            <div class="card-header header-table ">
                                <i class="fas fa-table me-1"></i>
                                Table des utilisateurs
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatablesSimple" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Image</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($users as $us){
                                                    if($us['role'] == 'user'){
                                                        echo "<tr>
                                                                <td>".$us['nom']."</td>
                                                                <td>".$us['prenom']."</td>
                                                                <td>".$us['email']."</td>
                                                                <td>".$us['tel']."</td>
                                                                <td>";
                                                        if($us['image'] ==''){
                                                            echo "<img src='../user/img/avatar.svg' width='40' height='40' class='rounded-5'>";
                                                        } else {
                                                            echo "<img src='../user/img/uploaded/".$us['image']."' width='40' height='40' class='rounded-5'>";
                                                        }
                                                        echo "</td>
                                                                <td class='ps-4'>
                                                                    <a class='i text-danger' href='deleteUser.php?id=". $us['id']."'>
                                                                        <i class='fas fa-trash'></i>
                                                                    </a>
                                                                </td>
                                                            </tr>";
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php require_once('../__tiers/footer-admin.php') ?>