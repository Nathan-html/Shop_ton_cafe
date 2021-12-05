<?php
include ("model/product.php");

$product = new Produit;

// the controller of list page
if($url[count($url)-2]==$titleSite){
    $getProducts = $product->listProduct();
}

// the controller of item page
if ($url[count($url)-1]=='detail'){
    $getDetail = $product->detailProduct($url[count($url)-2]);
}

// the controller of the form editing
if ($url[count($url)-1]=="form" && $url[count($url)-2]!=$titleSite) :
    $getDetail = $product->detailProduct($url[count($url)-2]);
endif;

// Controller of forms valides
if ($url[count($url)-1]=='valider' && $url[count($url)-2]=='form'){
    if($url[count($url)-3]==$titleSite){
        $product->addProduct($_POST['nom'], $_POST['description'], $_POST['prix']);
        header("Location: /{$titleSite}");
    }
    if($url[count($url)-3]!=$titleSite){
        $product->modifyProduct($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['prix']);
        header("Location:/{$titleSite}");
    }  
}

// Delete a product
if($url[count($url)-1]=='delete') :
    $product->deleteProduct($url[count($url)-2]);
    header("Location: /{$titleSite}");
endif;

?>
