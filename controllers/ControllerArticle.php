<?php
class ControllerArticle extends ControllerBase
{

	private $articleManager;





	//Afficher les articles
	public function ListArticles()
	{
		$this->articleManager = new ArticleManager();
		$articles = $this->articleManager->getArticles();
		$this->AddParam('articles', $articles);
		$this->view('viewListArticles');
	}


	// Afficher les détails d'un article
	public function Article($id)
	{

		$this->articleManager = new ArticleManager();
		$article = $this->articleManager->getArticle($id);
		$this->AddParam('article', $article);
		$this->commentaireManager = new CommentaireManager();
		$commentaires = $this->commentaireManager->getCommentaire($id);
		$this->AddParam('commentaires', $commentaires);

		$this->view('viewArticle');
	}


	// Ajouter un article
	public function Add()
	{
		if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
			$this->articleManager = new ArticleManager();

			if (!empty($_POST['titre']) && !empty($_POST['chapo']) && !empty($_POST['contenu']) && !empty($_POST['auteur'])) {
				$article = $this->articleManager->AddArticle($_POST['titre'], $_POST['chapo'], $_POST['contenu'], $_POST['auteur']);
				$this->AddParam('articles', $article);
				$this->redirect("AddArticle");
			}
		} else {
			$this->redirect("Accueil");
		}
	}

	public function AddArticle()
	{
		if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
			$this->view('viewAdd');
		} else {
			$this->redirect("Accueil");
		}
	}




	// Modifier un article
	public function Edit()
	{

		$this->articleManager = new ArticleManager();
		if (!empty($_POST['id']) && !empty($_POST['titre']) && !empty($_POST['chapo']) && !empty($_POST['contenu']) && !empty($_POST['auteur'])) {

			$this->articleManager->EditArticle($_POST['id'], $_POST['titre'], $_POST['chapo'], $_POST['contenu'], $_POST['auteur']);
			$this->redirect("List");
		}
	}

	public function EditArticle($id)
	{

		$this->articleManager = new ArticleManager();

		$article = $this->articleManager->getArticle($id);
		$this->AddParam('article', $article);
		if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
			$this->view('viewEdit');
		} else {
			$this->redirect("List");
		}
		//Article/EditArticle/13
	}


	// Supprimer un article
	public function Delete()
	{
		//vérifier l'exitance de l'id
		if (!empty($_POST['id'])) {
			$this->articleManager = new ArticleManager();
			$this->articleManager->deleteArticle($_POST['id']);
			$this->redirect("List");
		}
	}


	public function DeleteArticle($id)
	{
		$this->articleManager = new ArticleManager();

		$article = $this->articleManager->getArticle($id);
		$this->AddParam('article', $article);
		if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
			$this->view('viewDelete');
		} else {
			$this->redirect("List");
		}
		// $this->view('viewDelete');
	}
}
