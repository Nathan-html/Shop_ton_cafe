<?php include 'Controller/ProductController.php'; ?>

<body>
    <form class="container" method='post' action="form/valider">
        <input type="hidden" value="<?php if ($url[count($url)-2]!=$titleSite): echo $getDetail[0]->id; endif; ?>" name="id">
        <div class="mb-3">
            <label for="productName" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="productName" <?php if ($url[count($url)-2]!=$titleSite): ?> value="<?php echo $getDetail[0]->name; ?>"<?php endif; ?>>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" id="productDescription">
                <?php if ($url[count($url)-2]!=$titleSite): ?><?php echo $getDetail[0]->description; ?><?php endif; ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control" id="productPrice" <?php if ($url[count($url)-2]!=$titleSite): ?> value="<?php echo $getDetail[0]->price; ?>"<?php endif; ?>>
        </div>
        <div class="d-flex justify-content-center">
            <input class="btn btn-primary " type="submit" value="valider">
        </div>
    </form>
</body>