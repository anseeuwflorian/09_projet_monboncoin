<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Mon Bon Coin | <?= $title ?> </title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- <a  href="/"><img src="/image/accueil.png" alt="accueil" class="w-25"></a> -->
                <a class="navbar-brand" href="/">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="/products">Tous les produits</a>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-2">
                                <a class="btn btn-secondary" href="/deconnexion">Déconnexion</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="btn btn-secondary" href="/profil">Profil</a>
                            </li>
                        </ul>
                    <?php else : ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-5">
                                <a class="btn btn-secondary" href="/connexion">Connexion</a>
                            </li>
                        </ul>
                    <?php endif ?>
                    <form class="d-flex" action="/recherche" method="POST">
                        <input class="form-control me-sm-2" type="search" placeholder="Recherche">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>