<?php if ($error != "") : ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p><?= $error ?> </p>
    </div>
<?php else : ?>
    <div class="card">
        <div class="car-header bg-light text-center">
            <h3 class="p-3"><u><?= $product['productTitle'] ?></u></h3>
        </div>
        <div class="car-body text-center">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="image/<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['productTitle'] ?>">
                </div>
                <div class="col-12 col-md-6">
                    <iframe src="https://www.google.com/maps?q=<?= $user['city'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" width='100%' height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="p-2"></iframe>
                </div>
            </div>
            <div class="bg-light">
                <p class="fs-5"><u>Description:</u></p>
                <p><?= $product['description'] ?></p>
                <p class="text-info fs-4"><u>Prix: <?= $product['price'] ?> €</u></p>
                <a href="/panier" class="btn btn-success w-100 border-success">Ajouter au panier</a>
            </div>
        </div>
    </div>
<?php endif ?>