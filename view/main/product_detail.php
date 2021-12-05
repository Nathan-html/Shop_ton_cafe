<?php include 'controller/instanceProduit.php'; ?>

<main class="container">
<!-- Affichage du détail du produit via l'objet créer via la requete 2 -->
    <div class="d-flex justify-content-center text-end m-5">
        <h1><?php echo $getDetail[0]->title;?></h1>
        <p class="px-1"><?php echo $getDetail[0]->price;?> €</p>
    </div>
    <div class="shadow p-3">
        <h2>Description</h2>
        <p><?php echo $getDetail[0]->description;?></p>
        <p class="text-center"><a class="btn btn-primary" href="/<?php echo $titleSite ?>">Retourner à l'accueil</a></p>
    </div>
</main>