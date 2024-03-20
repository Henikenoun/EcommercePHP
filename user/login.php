<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<?php require_once('../__tiers/fiche.php'); ?> <!-- contient les fichier css et bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		#span-login{
		padding-top: 53px;
		font-size: 12px;
		margin-left: -176px;
		}
	</style>
</head>
<body>	
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="email" class="input" name="email" placeholder="email" required>	
							  <?php 
								if(isset($_POST['email']) && $_POST['pass']){
									// var_dump($_POST);
									require_once('user.class.php');
									$user=new User();
									$user->email = $_POST['email'];
									$user->password = $_POST['pass'];
									//user1 khater ynajjem yraja3li false lezem na3mel save le user elli sna3tou
									$user1 = $user->searchUser();
									if($user1){
										session_start();
										$_SESSION['id'] = $user1->fetchColumn(0);
										$_SESSION['name'] = $user1->fetchColumn(1);
										$_SESSION['role'] = $user1->fetchColumn(5);
										header('Location:../index.php');
									}
									elseif($user->verifMail($_POST['email'])){
										echo"<div class='text-danger' id='span-login'> mot de passe incorrect </div>
										";
									}
									else
										echo"<div class='text-danger' id='span-login'> Impossible de trouver votre compte  </div>";

								}
							?>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="pass" class="input" placeholder="Password" required>
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

</body>
</html>
