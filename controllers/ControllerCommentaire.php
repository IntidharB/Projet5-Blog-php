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
		
		$commentaire=$this->commentaireManager->AddCommentaire($_POST['contenu'],$_SESSION['user']["id"],$_POST["id_article"]);
		$this->AddParam('commentaires',$commentaire);
		$this->redirect("Article/".$_POST['id_article']);
		
		
	}

	
	

	// Supprimer un commentaire
	public function DeleteComment($id)
	{
		$commentaire= $this->commentaireManager->getCommentaires($id);
		//vérifier l'exitance de l'id
		if(!empty($commentaire['id']))
		{
			$this->commentaireManager= new CommentaireManager();
			
			$commentaire=$this->commentaireManager->deleteCommentaire($_POST['id']);
			$this->AddParam('commentaire',$commentaire);
			// $this->redirect("Article/".$_POST['id_article']);
			
		}
	
	}


	// public function Deletecommentaire($id){
	// 	$this->commentaireManager = new CommentaireManager();
		
	//     	$commentaire= $this->commentaireManager->getCommentaires($id);
	//     	$this->AddParam('commentaire',$commentaire);
	// 	    $this->redirect("Article/".$_POST['id_article']);
	// }


}	
?>