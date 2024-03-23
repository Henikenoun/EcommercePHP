<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demander le mot de passe</title>
    <?php require_once('../__tiers/fiche.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                <h2 class="title">mot de passe oublié</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <input type="email" id="email" class="input" name="email" placeholder="Email" required>    
                        <?php
                            if(isset($_POST['email'])){
                                require_once('../__tiers/mail.php');
                                require_once('../models/user.class.php');
                                $email = $_POST['email'];
                                $user = new User();
                                $user = $user->verifMail($email);
                                $pass = $user->fetchColumn(7);
                                if($pass != null){
                                    $mail->setFrom('kenounheni4@gmail.com', 'Mailer');
                                    $mail->addAddress($email);
                                    $mail->Subject = 'mot de passe oublié';
                                    $mail->Body = "votre mot de passe et <b>".$pass."</b>";
                                    $mail->send();
                                    header('location:login.php');
                                }else{
                                    echo"<div class='text-danger' id='span-login'> Impossible de trouver votre compte  </div>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <input type="submit" id="sendEmailButton" class="btn" value="verifier le mot de passe">
            </form>
        </div>
    </div>

</body>
</html>
