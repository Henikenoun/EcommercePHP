<?php
    class User{
        public $nom;
        public $prenom;
        public $email;
        public $tel;
        public $password;
        public $image;
        //attributes role par defaut = user
        
        
        //chercher un utilisatuer
        function searchUser(){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from user where email='$this->email' and password='$this->password'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }

        // pour garantie que l'email doit étre unique
        function verifMail($email){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from user where email='$email'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }

        //Ajouter un utilisateur 
        function addUser(){
            require_once('../user/connexion.php');
            $cnx = new Connexion();
            $pdo = $cnx->connect();
            $test = $this->verifMail($this->email)->fetchColumn() ;
            if(!$test){
                $req= "insert into user (nom,prenom,email,tel,password) values ('$this->nom','$this->prenom','$this->email','$this->tel','$this->password')";
                $pdo->exec($req) or print_r($pdo->errorInfo());
                return false;
            }
            else{
                return true;
            }
        }

        //afficher la liste des utilisateur
        function affUser(){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from user";
            $res = $pdo->query($req) or print_r($pdo->errorInfo()) ;
            return $res ;
        }

        //Modifier l'utilisateur 
        function modifUser($id){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "UPDATE user SET nom='$this->nom' , prenom='$this->prenom' ,  tel='$this->tel' , image='$this->image' WHERE id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()) ;
        }
        
        //modifier le mot de passe
        function modifPass($id){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "UPDATE user SET password='$this->password' WHERE id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()) ;
        }
        //supprimer un utilisateur
        function deleteUser($id){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "DELETE FROM user WHERE id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()) ;
        }

        //recuperer un utilisateur
        function getUser($id)
        {
            require_once('../user/connexion.php');
            $cnx=new connexion();
            $pdo=$cnx->connect();
            $req="SELECT * FROM user where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }

        //supprimer l'utilisateur si leur role est admin
        function suppUser($id){
            require_once('../user/connexion.php');
            $cnx=new connexion();
            $pdo=$cnx->connect();
            if($this->getUser($id)->fetchColumn(5) == 'admin'){
                $req="DELETE FROM user WHERE id=$id";
                $pdo->exec($req);
            }
        }

    }

?>