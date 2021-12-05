<!DOCTYPE html>
<html lang="fr">

<?php

require('model/settings.php');
require('view/section/head.php');
require('view/section/header.php');

switch ($url[count($url)-1]) {

    // Page Create of the CRUD
    case 'form':
        include 'view/main/product_form.php';
        break;
        
    // Page Delete of the CRUD
    case 'valider':
        include 'controller/instanceProduit.php';
        break;

    // Page Update of the CRUD
    case 'detail':
        include 'view/main/product_detail.php';
        break;

    // Page Delete of the CRUD
    case 'delete':
    include 'controller/instanceProduit.php';
    break;

    default :
        if($url[count($url)-2]==$titleSite && $url[count($url)-1]==''){
            include 'view/main/product_list.php';
        }
        else{
            include 'view/error/404.php';
        }
    break;
}

require("view/section/footer.php");

?>

</html>