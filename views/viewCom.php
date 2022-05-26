<h2 class="text-center m-2">les commentaires</h2>
	<?php foreach ($commentaires as $commentaire) { ?>

		<?php if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1) || $commentaire->getValider() == 1) {

		?>
			<div class='card-group col-lg-10 col-md-10 mx-auto'>

				<div class='   w-50  border-dark m-2'>
					<h3> <?= $commentaire->getUser_name() ?></h3>
					
					<p><?= $commentaire->getContenu(); ?></p>

					<h4> Ajouté le <?= $commentaire->getDateDernierModif(); ?>.</h4>


					<?php if (($_SESSION["user"]["id"] == $commentaire->getId_user()) || ($_SESSION["user"]["admin"] == 1)) {
					?>
					<?= "<a class='btn btn-danger sup-commentaire' href='DeleteCommentaire/" . $commentaire->getId() . "'>Supprimer</a>"; ?>
					<?php } ?>


					<?php if (($_SESSION["user"]["admin"] == 1) && $commentaire->getValider() == 0) {
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