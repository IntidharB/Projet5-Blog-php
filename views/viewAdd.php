
<section class="container">
	<h2 class="text-center">Ajoutez un article:</h2>
	<hr>

	<!-- Add Articles Form -->
	<div class="row">
		<div class="col-lg-10 col-md-10 mx-auto">
			<form class="form" role="form" action="Add" method="post">
				
					<label for="author">Auteur :</label>
					<input type="text" class="form-control" id="author" name="auteur" placeholder="Auteur" required>
				
					<label for="title">Titre :</label>
					<input type="text" class="form-control" id="title" name="titre" placeholder="Titre" required>
				
				<div class="form-group">
					<label for="chapo">Chapô :</label>
					<textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8" required></textarea>
				</div>
				<div class="form-group">
					<label for="content">Contenu :</label>
					<textarea type="text" class="form-control" id="content" name="contenu" placeholder="Contenu de l'article" rows="25" required></textarea>
				</div>
				<br>
				<div class="form-actions">
					<button type="submit" name="add" class="btn btn-secondary">Ajouter</button>
					<a class="btn btn-primary retour" href="Accueil">Retour</a>
				</div>
			</form>
		</div>
	</div>
</section>
 <hr>

  