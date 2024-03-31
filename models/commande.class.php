<?php 
class commande{
    public $user;
    public $produits;
    public $verif;
    public $msg;
    public $date;
    public $date_rep;

    function addCommande( $user, $produits  ){
        require_once('../connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $date=new DateTime();
        $date=$date->format('Y-m-d');
        $req="insert into commande(id_user,produits,date) values('$user','$produits','$date');";
        $pdo->exec($req);
    }
    function list(){
        require_once('user/connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $req="select * from commande";
        $res =$pdo->query($req);
        return $res;
    }
    function lister(){
        require_once('../user/connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $req="select * from commande";
        $res =$pdo->query($req);
        return $res;
    }
    function listByUser($user){
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $req="select * from commande where id_user=$user";
        $res =$pdo->query($req);
        return $res;
    }
    function getCommande($id){
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $req="select * from commande where id =$id ";
        $res =$pdo->query($req);
        return $res;
    }
    function adminGetCommande($id){
        require_once('../user/connexion.php');
        $cnx = new connexion();
        var_dump($id);
        $pdo = $cnx->connect();
        $req="select * from commande where id =$id ";
        $res =$pdo->query($req);
        return $res;
    }
    function delete($id){
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $res='';
        if($this->getCommande($id)->fetchColumn(3)!=1){
            $req="delete from commande where id =$id";
            $res =$pdo->exec($req);
        }
        return $res;
    }
    function modifier($id){
        require_once('../user/connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->connect();
        $req="Update commande set isverif= '$this->verif' , msg='$this->msg',date_reponse='$this->date_rep' where id =$id";
        $res =$pdo->exec($req);
        return $res;
    }
}

?>