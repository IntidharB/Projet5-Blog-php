<section>
        <h2 class=" text-center">Connexion</h2>
        <div class="error">
        <?=
        !empty($error)?$error:"";//if en seul ligne
        ?>
        </div>
            <form method="POST" action="Connect" class="p-5">
                

                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input  name="mail" type="email" class="form-control" placeholder="mail" id="mail" required data-validation-required-message="Entrez votre adresse email.">
                        <p class="help-block text-danger"></p>
                  </div>

                  <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Mot de passe</label>
			<input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">

                  </div>
                <button type="submit" class="btn btn-primary" name="btn-valider">Connexion</button>
            </form>
	    <p class="text-center"><a href="Inscription">Inscription</a></p>
</section>