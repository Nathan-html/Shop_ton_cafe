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
        $req = $dbc->prepare('SELECT * FROM product WHERE idProduct = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $product = $req->fetchAll(PDO::FETCH_OBJ);
        return $product;

    }


    /**
     * Ajouter un produit
     * Exactement même principe qu'au dessus
     * @param [type] $idCategory  [description]
     * @param [type] $title       [description]
     * @param [type] $description [description]
     * @param [type] $price       [description]
     */
    public function addProduct($idCategory, $title, $description, $price) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('INSERT INTO product (idCategory, title, description, price) VALUES (:idCategory, :title, :description, :price)');
        $req->bindParam(':idCategory', $idCategory);
        $req->bindParam(':title', $title);
        $req->bindParam(':description', $description);
        $req->bindParam(':price', $price);
        $req->execute();

    }


    /**
     * Modifier le produit selectionner grâce a son id
     * @param  [type] $idProduct   [description]
     * @param  [type] $title       [description]
     * @param  [type] $description [description]
     * @param  [type] $price       [description]
     * @return [type]              [description]
     */
    public function modifyProduct($idProduct, $title, $description, $price) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('UPDATE product SET title = :title, description = :description, price = :price WHERE idProduct = :idProduct');
        $req->bindParam(':title', $title);
        $req->bindParam(':description', $description);
        $req->bindParam(':price', $price);
        $req->bindParam(':idProduct', $idProduct);
        $req->execute();

    }

    /**
     * Supprimer un produit
     * @param  [type] $idProduct [description]
     * @return [type]            [description]
     */
    public function deleteProduct($idProduct) {

        $dbc = $this->connexion();
        $req = $dbc->prepare('DELETE FROM product WHERE idProduct = :idProduct');
        $req->bindParam(':idProduct', $idProduct);
        $req->execute();
        
    }
}
