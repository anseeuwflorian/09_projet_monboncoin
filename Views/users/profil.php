<!-- <?= var_dump($_SESSION) ?>
<?= var_dump($products) ?> -->

<div class="d-flex text-center">
    <div>
        <p class='fs-3'>Vos Annonces</p>
    </div>

</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Photo</th>
                <th>Date</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- boucle pour créer chaque ligne en fonction du nb de produit -->
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <!-- boucle pour créer les cellules -->
                    <?php foreach ($product as $key => $info) : ?>
                        <!-- on exclu les champs voulus avec $key != champs -->
                        <?php if ($key != 'idCategory' && $key != 'idUser' && $key != 'idProduct'&& $key != 'title') : ?>
                            <?php if ($key == 'image') : ?>
                                <!-- si 'image' on va chercher l'image et on change sa taille -->
                                <td><img src="/image/<?= $info ?>" alt="" width="50px" class="zoom"></td>
                            <?php else : ?>
                                <!-- on affiche les infos dans chaque cellule -->
                                <td class="vertical-align: middle"><?= $info ?></td>
                            <?php endif ?>

                        <?php endif ?>
                    <?php endforeach ?>
                    <td>
                        <!-- création des boutons dans une cellule hors boucle -->
                        <a href="/detailProduct?id=<?= $product['idProduct'] ?>" class="btn btn-info m-1">Détails</a>
                        <a href="/modifProduct?id=<?= $product['idProduct'] ?>" class="btn btn-warning m-1">Modifier</a>
                        <a href="/suppProduct?id=<?= $product['idProduct'] ?>" class="btn btn-danger m-1">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<a href=" /ajoutProduct" class="btn btn-success w-100 mt-4">Créez votre annonce</a>