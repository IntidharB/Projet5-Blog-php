<section class="container">
    <form action="Inscrit" method="post">
        <h2 class="text-center">Inscription</h2>
        <div class="error">
            <?=
            !empty($error) ? $error : ""; //if en seul ligne
            ?>
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="mail" class="form-control" placeholder="mail" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Confimer votre mot de passe </label>
            <input type="password" name="mot_de_passe_2" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
        </div>
    </form>
</section>