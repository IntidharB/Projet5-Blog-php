
<section class="container">

<?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'mot_de_passe':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'mail':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;
                        case 'email_length':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> email trop long
                                </div>
                            <?php 
                            break;
    
                            case 'mot_de_passe_length':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> pseudo trop long
                                </div>
                            <?php 
                            case 'already':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> compte deja existant
                                </div>
                            <?php 
    
                        }
                    }
                    ?>



    <form action="Inscrit" method="post">
                    <h2 class="text-center">Inscription</h2>       
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
                        <label>Confimer votre mot de passe  </label>
                        <input type="password" name="mot_de_passe_2" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                    </div>   
    </form>
</section>

