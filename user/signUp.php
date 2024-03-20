<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<?php require_once('../__tiers/fiche.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>s'inscrire</title>
    <style>
		#span-ins{
		padding-top: 53px;
		font-size: 12px;
		margin-left: -200px;
		}
        .info{
            font-size: 12px;
            margin-top: 32px;
            margin-left: -233px;
        }
	</style>
</head>
<body>

    <?php 
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
            require_once('user.class.php');
            $user=new User();
            $user->nom = $_POST['name'];
            $user->prenom = $_POST['prenom'];
            $user->email = $_POST['email'];
            $user->tel = $_POST['tel'];
            $user->password = $_POST['pass'];
            $exist = $user->addUser();//yraja3 true ken el email deja utiliser
            if(!$exist)
                header('Location:login.php');
        }
    ?>
    <img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
        <form method="post">
            <img src="img/inscrire.jfif">
            <h2 class="title">S'inscrire</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <input type="text" id="name" name="name" class="input" placeholder="Nom" required>	
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <input type="text" id="prenom" name="prenom" class="input" placeholder="Prenom" required>	
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <input type="email" id="email" class="input" name="email" placeholder="Email" required>	
                    <?php 
                        if(isset($exist)){
                            if($exist)
                                echo"<div class='text-small text-danger' id='span-ins'>cet email existe déjà</div><br>";
                        }
                    ?>
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="div">
                    <input type="tel" id="tel" name="tel" class="input" placeholder="Telephone (e.g., 12345678)" minlength='8' maxlength="8" required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i"> 
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input type="password" id="password" name="pass" class="input" placeholder="Password" minlength="8" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,}$" required>
                    <div class='info text-secondary'>{ minuscule,majuscule,chiffre }</div>
                </div>
            </div>
            <input type="submit" class="btn" value="Login">
        </form>
        </div>
    </div>

</body>
</html>