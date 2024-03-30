<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
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
								if(isset($_POST['email']) && isset($_POST['pass'])){
									// var_dump($_POST);
									require_once('../models/user.class.php');
									$user=new User();
									$user->email = $_POST['email'];
									$user->password = $_POST['pass'];
									//user1 khater ynajjem yraja3li false lezem na3mel save le user elli sna3tou
									$user1 = $user->searchUser();
									$data = $user1->fetch();              
									if($data) {
										var_dump($data);
										session_start();
										$_SESSION['id'] = $data[0];
										$_SESSION['name'] = $data[1];
										$_SESSION['prenom'] = $data[2];
										$_SESSION['email'] = $data[3];
										$_SESSION['tel'] = $data[4];
										$_SESSION['role'] = $data[5];
										$_SESSION['image'] = $data[6];
										$_SESSION['password'] = $data[7];
										if($_SESSION['role']=='user')
											header('Location:../index.php');
										else
											header('Location:../admin.php');
									}
									if($user->verifMail($_POST['email'])->fetchColumn(3)){
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
            	<a href="forgetPassword.php">mot de passe oublié</a>
            	<a href="signUp.php" class="btn bg-vert">S'inscrire</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

</body>
</html>
