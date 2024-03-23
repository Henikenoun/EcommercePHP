<?php 
    
    class Products{
        public $name;
        public $categorie;
        public $quantite;
        public $image;
        public $description;
        public $prix;
        public $solde;
        public $couleur;
        public $date;

        //ajouter un produit
        function AddProduct(){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req="INSERT INTO product (name, categorie, quantite, image, description , prix, solde, couleur, date)
            VALUES (:name, :categorie, :quantite, :image, :description, :prix, :solde, :couleur, :date)";
            $product = $pdo->prepare($req);
            $product->bindParam(':name', $this->name);
            $product->bindParam(':categorie', $this->categorie);
            $product->bindParam(':quantite', $this->quantite);
            $product->bindParam(':image', $this->image);
            $product->bindParam(':description',  $this->description);
            $product->bindParam(':prix', $this->prix);
            $product->bindParam(':solde', $this->solde);
            $product->bindParam(':couleur', $this->couleur);
            $product->bindParam(':date', $this->date);
            $product->execute();
        }

        //modifier un produit
        function EditProduct($productId){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
        
            $req = "UPDATE product SET name = :name, categorie = :categorie, quantite = :quantite,
                    image = :image, description = :description, prix = :prix, solde = :solde,
                    couleur = :couleur WHERE id = :productId";
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':categorie', $this->categorie);
            $stmt->bindParam(':quantite', $this->quantite);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':prix', $this->prix);
            $stmt->bindParam(':solde', $this->solde);
            $stmt->bindParam(':couleur', $this->couleur);
            $stmt->bindParam(':productId', $productId);
            $stmt->execute() or print_r($pdo->errorInfo());
        }
        

        //supprimer un produit
        function deleteProduct($id){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "DELETE FROM user WHERE id='$id'";
            $pdo->exec($req) or print_r($pdo->errorInfo()) ;
        }
        //lister les produits
        function listProduct(){
            require_once('../user/connexion.php');
            $cnx = new connexion();
            $pdo = $cnx->connect();
            $req = "select * from product ";
            $res = $pdo->query($req) or print_r($pdo->errorInfo()) ;
            return $res;
        }

        //recuperer un produit
        function getProduct($id)
        {
            require_once('../user/connexion.php');
            $cnx=new connexion();
            $pdo=$cnx->connect();
            $req="SELECT * FROM product where id='$id'";
            $res=$pdo->query($req) or print_r($pdo->errorInfo());
            return $res;
        }

    }

?>