<div class="row">
	<div class="col-lg-10 col-md-10 mx-auto article">
		<form class="form" role="form" action="<?=$baseurl;?>Article/Edit" method="post">
			<div class="form-group">
				<label for="author">Auteur :</label>
				<input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur" value="<?= $article->getAuteur(); ?>" required>
			</div>
			<div class="form-group">
				<label for="title">Titre :</label>
				<input type="text" class="form-control" id="title" name="titre" placeholder="Titre" value="<?= $article->getTitre(); ?>" required>
			</div>
			<div class="form-group">
				<label for="chapo">Chapô :</label>
				<textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8" required><?= $article->getChapo(); ?></textarea>
			</div>
			<div class="form-group">
				<label for="content">Contenu :</label>
				<textarea type="text" class="form-control" id="content" name="contenu" placeholder="Contenu de l'article" rows="25" required><?= $article->getContenu(); ?></textarea>
			</div>
			<br>
			<div class="form-actions">
			    <input type="hidden" id="id" name="id" value="<?= $article->getId(); ?>">
				<button type="submit" name="edit" class="btn btn-success">Modifier</button>
                	<a class="btn btn-primary" href="<?=$baseurl;?>List"<?= $article->getId(); ?>">Retour</a>
			</div>
		</form>
	</div>
</div>