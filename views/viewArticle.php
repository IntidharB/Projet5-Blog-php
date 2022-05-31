<div class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10 mx-auto">
			<h2><?= htmlentities($article->getTitre()); ?></h2>
			<p><strong><?= $article->getChapo(); ?></strong></p>
			<p><?= $article->getContenu(); ?></p>
			<p>Ecrit par <?= $article->getAuteur(); ?>, Modifié le <?= $article->getDateDernierModif(); ?></p>
			<a class="btn btn-primary retour" href="<?=htmlspecialchars($baseurl); ?>List">Retour</a>
			<?php if (!empty($user) && ($user['admin'] == 1)) { ?>
				<?= "<a class='btn btn-success modif-article' href='EditArticle/" . $article->getId() . "'>Modifier</a>"; ?>
				<?= "<a class='btn btn-danger sup-article' href='DeleteArticle/" . $article->getId() . "'>Supprimer</a>"; ?>
			<?php
			}
			?>


		</div>

	</div>
	<br>
	<br>





	<!-- Add commentaire -->
	<?php if (!empty($user)) {

	?>
		<div class="row">
			<div class="col-lg-10 col-md-10 mx-auto">
				<form class="form" role="form" action="AddCommentaire" method="post">
					<input type="hidden" name="id_article" value="<?= $article->getId(); ?>">
					<div class="form-group">
						<label for="content">Commentaire:</label>
						<textarea type="textarea" class="form-control" id="content" name="contenu" placeholder="Ajoutez votre commentaire" required></textarea>
					</div>
					<br>
					<div class="form-actions">
						<button type="submit" name="add" class="btn btn-primary">Ajouter</button>

					</div>
				</form>
			</div>
		</div>
	<?php
	} else {
	?>
		<span>connectez vous pour ajouter un commentaire</span>
		<br>

	<?php } ?>
	<!-- List des commentaires-->
	<h2 class="text-center m-2">les commentaires</h2>
	<?php foreach ($commentaires as $commentaire) { ?>

		<?php if ((!empty($user) && $user["admin"] == 1) || $commentaire->getValider() == 1) {

		?>
			<div class='card-group col-lg-10 col-md-10 mx-auto'>

				<div class='   w-50  border-dark m-2'>
					<h3> <?= $commentaire->getUser_name() ?></h3>
					
					<p><?= $commentaire->getContenu(); ?></p>

					<h4> Ajouté le <?= $commentaire->getDateDernierModif(); ?>.</h4>


					<?php if (($user["id"] == $commentaire->getId_user()) || ($user["admin"] == 1)) {
					?>
					<?= "<a class='btn btn-danger sup-commentaire' href='DeleteCommentaire/" . $commentaire->getId() . "'>Supprimer</a>"; ?>
					<?php } ?>


					<?php if (($user["admin"] == 1) && $commentaire->getValider() == 0) {
					?>
						<?= "<a class='btn btn-success valider' href='ValidCommentaire/" . $commentaire->getId() . "'>Valider</a>"; ?>
					<?php } ?>
				</div>
			</div>
			<hr>

		<?php }
		?>
	<?php
	}
	?>



</div>