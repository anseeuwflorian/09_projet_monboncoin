<?php if ($error != "") : ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p><?= $error ?> </p>
    </div>
<?php else : ?>
    <div class="card">
        <div class="car-header bg-light text-center">
            <h3 class="p-3"><?= $product['productTitle'] ?></h3>
        </div>
        <div class="car-body text-center">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="image/<?= $product['image'] ?>" class="img-fluid img-thumbnail" alt="<?= $product['productTitle'] ?>">
                </div>
                <div class="col-12 col-md-6">
                    <iframe src="https://www.google.com/maps?q=<?= $user['city'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" width='100%' height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="p-2"></iframe>
                </div>
            </div>
            <p>Description:</p>
            <p><?= $product['description'] ?></p>
            <p>Prix:</p>
            <p><?= $product['price'] ?> €</p>
        </div>
        <a href="/panier" class="btn btn-success m-1">Ajouter au panier</a>
    </div>
<?php endif ?>