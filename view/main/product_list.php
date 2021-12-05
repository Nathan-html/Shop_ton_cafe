<?php include ("controller/instanceProduit.php"); ?>

<body>
    <h1 class="text-center m-5">Produits <a href="form" title="Ajouter" class="btn btn-outline-success">+</a></h1>
    <main class="container">
    <table class="table shadow">
        <thead class="table-dark">
                <th scope="col" style="text-align:left;">Prix</th>
                <th scope="col" style="text-align:left;">Nom</th>
                <th scope="col"></th>
        </thead>
        <!-- foreach pour explorer l'objet qui contient tous le sproduits de la BDD obtenue via la premiere requete -->
        <?php foreach($getProducts as $key => $info):?>
        <tr>
            <td>
                <?php echo $info->price;?> €
            </td>
            <td><?php echo $info->title;?></td>
            
            <!-- on affiche les infos de chaque objet via la variables info du foreach -->
            <td class="text-end">
                <a href="<?php echo $info->idProduct ?>/detail" class="btn btn-primary">En savoir plus</a>
                <a href="<?php echo $info->idProduct ?>/form" title="Modifier" class="btn btn-warning">Modifier</a>
                <a href="<?php echo $info->idProduct ?>/delete" title="Supprimer" class="btn btn-danger">X</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>