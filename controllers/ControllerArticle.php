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
		if ((!empty($this->user) && $this->user["admin"] == 1)) {
			$this->articleManager = new ArticleManager();

			if ($this->Post->get('titre')!=null && $this->Post->get('chapo')!=null  && $this->Post->get('contenu')!=null && $this->Post->get('auteur')!=null){
				$article = $this->articleManager->AddArticle($this->Post->get('titre'), $this->Post->get('chapo'),$this->Post->get('contenu'), $this->Post->get('auteur'));
				$this->AddParam('articles', $article);
				$this->redirect("AddArticle");
			}
		}else{$this->redirect("Accueil");}
			
		
	}

	public function AddArticle()
	{
		if ((!empty($this->user) && $this->user["admin"] == 1)) {
			$this->view('viewAdd');
		}else {$this->redirect("Accueil");}
	}




	// Modifier un article
	public function Edit()
	{

		$this->articleManager = new ArticleManager();
		if ($this->Post->get('id')!=null && $this->Post->get('titre')!=null && $this->Post->get('chapo')!=null && $this->Post->get('contenu')!=null && $this->Post->get('auteur')!=null) {

			$this->articleManager->EditArticle($this->Post->get('id'),$this->Post->get('titre'), $this->Post->get('chapo'), $this->Post->get('contenu'), $this->Post->get('auteur'));
			$this->redirect("List");
		}
	}

	public function EditArticle($id)
	{

		$this->articleManager = new ArticleManager();

		$article = $this->articleManager->getArticle($id);
		$this->AddParam('article', $article);
		if ((!empty($this->user) && $this->user["admin"] == 1)) {
			$this->view('viewEdit');
		}else {$this->redirect("List");}//Article/EditArticle/13
	}


	// Supprimer un article
	public function Delete()
	{
		//vérifier l'exitance de l'id
		if ($this->Post->get('id')!=null) {
			$this->articleManager = new ArticleManager();
			$this->articleManager->deleteArticle($this->Post->get('id'));
			$this->redirect("List");
		}
	}


	public function DeleteArticle($id)
	{
		$this->articleManager = new ArticleManager();

		$article = $this->articleManager->getArticle($id);
		$this->AddParam('article', $article);
		if ((!empty($this->user) && $this->user["admin"] == 1)) {
			$this->view('viewDelete');
		} else {$this->redirect("List");}// $this->view('viewDelete');
	}
}
