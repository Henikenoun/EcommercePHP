<?php
    class connexion{
        public function connect(){
            try
            {
                $dbc= new PDO('mysql:host=localhost;dbname=ecommercephp', 'root','');
                return $dbc;
            }
    
            catch(PDOException $e)
            {
                printf("Echec de la connexion : %s\n", $e->getMessage()); 
                exit();
            }  
        }
    }
?>