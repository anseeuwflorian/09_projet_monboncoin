<?php var_dump($products) ?>


<div class="container p-5">
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