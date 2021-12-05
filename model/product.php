<?php
class Produit{


    public function __construct(){}


    /**
     * Connexion à la base de donné
     * @return [type] [description]
     */
    private function connexion() {

        include("model/settings.php");

        try {
            $dbc = new PDO("mysql:host=$servername;dbname=$bddname;charset=utf8", $username, $password);
            $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbc;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            echo "Code de l'erreur " . $e->getCode();
        }

    }


    /**
     * Obtenir tout les produits
     * @return [type] [description]
     */
    public function listProduct() {

        $dbc = $this->connexion();
        $req = $dbc->prepare('SELECT * FROM product');
        $req->execute();
        $products = $req->fetchAll(PDO::FETCH_OBJ);
        return $products;

    }


    /**
     * Recuperer un produit via son id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detailProduct($id) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('SELECT * FROM product WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $product = $req->fetchAll(PDO::FETCH_OBJ);
        return $product;

    }


    /**
     * Ajouter un produit
     * Exactement même principe qu'au dessus
     * @param [type] $name        [description]
     * @param [type] $description [description]
     * @param [type] $price       [description]
     */
    public function addProduct($name, $description, $price) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('INSERT INTO product (name, description, price) VALUES (:name, :description, :price)');
        $req->bindParam(':name', $name);
        $req->bindParam(':description', $description);
        $req->bindParam(':price', $price);
        $req->execute();

    }


    /**
     * Modifier le produit selectionner grâce a son id
     * @param  [type] $id          [description]
     * @param  [type] $name        [description]
     * @param  [type] $description [description]
     * @param  [type] $price       [description]
     * @return [type]              [description]
     */
    public function modifyProduct($id, $name, $description, $price) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('UPDATE product SET name = :name, description = :description, price = :price WHERE id = :id');
        $req->bindParam(':name', $name);
        $req->bindParam(':description', $description);
        $req->bindParam(':price', $price);
        $req->bindParam(':id', $id);
        $req->execute();

    }

    /**
     * Supprimer un produit
     * @param  [type] $id        [description]
     * @return [type]            [description]
     */
    public function deleteProduct($id) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('DELETE FROM product WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
        
    }
}
