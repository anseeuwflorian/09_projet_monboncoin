<div class="container">
    <?php if($messageErreur) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?= $messageErreur ?> </strong>
        </div>
    <?php endif ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="login" class="form-label">Votre Email</label>
            <input type="email" class="form-control" id="email" name="login" placeholder="Votre email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>
        <div>
            <button type="submit" class="btn btn-success w-100">Connexion</button>
        </div>
    </form>
    <div class="text-center pt-5">
        <p><b> Pas encore de compte ? </b></p>
        <a href="/inscription" class="btn btn-primary w-25">Insciption</a>
    </div>
</div>