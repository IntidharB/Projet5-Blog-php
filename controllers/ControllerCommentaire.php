<?php
class ControllerCommentaire extends ControllerBase{

	private $commentaireManager;
	

	

 
	//Afficher les Commentaire
	public function ListCommentaires()
	{
		$this->commentaireManager= new CommentaireManager();
		$commentaires= $this->commentaireManager->getCommentaires();
		$this->AddParam('Commentaire',$commentaires);
			
	}
	

	

	// Ajouter un commentaire
	public function AddComment(){
	
		$this->commentaireManager= new CommentaireManager();
		if ($this->Post->get('contenu')!=null && $this->Post->get('id_article')!=null) {

		$commentaire=$this->commentaireManager->AddCommentaire($this->Post->get('contenu'),$this->user["id"],$_POST["id_article"]);
		$this->AddParam('commentaires',$commentaire);
		$this->redirect("Article/".$this->Post->get('id_article'));
		
		
	}}

	
	

	// Supprimer un commentaire
	public function DeleteComment($id)
	{	$this->commentaireManager= new CommentaireManager();
		$commentaire= $this->commentaireManager->getCommentaire_Id($id);
		
		//vérifier l'exitance de l'id
		if(!empty($commentaire->getId()))
		{
			// $this->commentaireManager= new CommentaireManager();
			
			$this->commentaireManager->deleteCommentaire($id);
			$this->AddParam('commentaire',$commentaire);
			$this->redirect("Article/". $commentaire->getId_article());
			
		}
	
	}

	public function valideComment($id){
		$this->commentaireManager= new CommentaireManager();
		$commentaire= $this->commentaireManager->getCommentaire_Id($id);
		$this->commentaireManager->ValideCommentaire($id);
		$this->AddParam('commentaire',$commentaire);
		$this->redirect("Article/". $commentaire->getId_article());

	}


}
