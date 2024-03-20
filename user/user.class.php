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
            require_once('connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from user where email='$this->email' and password='$this->password'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            if($res->fetchColumn(0))
                return $res;
            else
                return false;
        }

        // pour garantie que l'email doit étre unique
        function verifMail($email){
            require_once('connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from user where email='$email'";
            $res = $pdo->query($req) or print_r($pdo->errorInfo());
            return $res->fetchColumn(3);
        }

        //Ajouter un utilisateur 
        function addUser(){
            require_once('connexion.php');
            $cnx = new Connexion();
            $pdo = $cnx->connect();
            $test = $this->verifMail($this->email) ;
            if(!$test){
                $req= "insert into user (nom,prenom,email,tel,password) values ('$this->nom','$this->prenom','$this->email','$this->tel','$this->password')";
                $pdo->exec($req) or print_r($pdo->errorInfo());
                return false;
            }
            else{
                return true;
            }
        }
    }

?>