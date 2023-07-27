<!-- <?php var_dump($products) ?> -->

<div class="container">
    <?php if (isset($categories)) : ?>
        <div class="container pb-5">
            <form action="" method="GET">
                <label for="cat" class="form-label mt-4">Choix de la catégorie</label>
                <div class="form-group d-flex pb-2">
                    <select name="idCat" class="form-select" id="cat">
                        <option value="">Catégories</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['idCategory'] ?>" <?= isset($_GET['idCat']) && $_GET['idCat'] == $category['idCategory'] ? "selected" : null ?>><?= $category['title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-25">Lancer la recherche</button>
                </div>
            </form>
        </div>
    <?php endif ?>

    <div class="row justify-content-around">
        <?php foreach ($products as $product) : ?>
            <div class="card bg-light mb-3 p-1" style="max-width: 20rem;">
                <div class="card-header text-center"><?= $product['catTitle'] ?></div>
                <img src="image/<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['productTitle'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $product['productTitle'] ?></h4>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <p class="card-text text-success"><?= $product['price'] . '€' ?></p>
                    <a href="/panier?id=<?= $product['idUser'] ?>" class="btn btn-success m-1">Ajouter au panier</a>
                    <a href="/detailProduct?id=<?= $product['idProduct'] ?>" class=" btn btn-info m-1">Détails</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<!-- Autre méthode, demande plus de contrôle, l'utilisateur peut modifier l'url en ajoutant un ?= et ne pas avoir le formulaire-->

<!-- <?php
        $currentUrl = $_SERVER['REQUEST_URI'];
        $targetUrl = "/products";

        if ($currentUrl === $targetUrl) { ?>

    <div class="container p-5">
        <div class="container p-5">
            <form action="" method="GET">
                <div class="form-group">
                    <label for="cat" class="form-label mt-4">Choix de la catégorie</label>
                    <select class="form-select" id="cat">
                        <option value="">Catégories</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['idCategory'] ?>"> <?= $category['title'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit" class="btn btn-dark w-25">Valider</button>
                </div>
            </form>
        </div>

    <?php } ?>

    <div class="row justify-content-around">
        <?php foreach ($products as $product) : ?>
            <div class="card bg-light mb-3 p-1" style="max-width: 20rem;">
                <div class="card-header text-center"><?= $product['catTitle'] ?></div>
                <img src="image/<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['productTitle'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $product['productTitle'] ?></h4>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <p class="card-text text-success"><?= $product['price'] . '€' ?></p>
                    <a href="/panier?id=<?= $product['idUser'] ?>" class="btn btn-success m-1">Ajouter au panier</a>
                    <a href="/detailProduct?id=<?= $product['idProduct'] ?>" class=" btn btn-info m-1">Détails</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </div> -->
