<?php
class CommentaireManager extends Model{

	//Recupérer tt les commentaires dans la bdd
	public function getCommentaires()
	{	
		$commentaire=$this->getAll('commentaires','commentaire');
		return $commentaire; 
	}

	public function getCommentaire($id){ 
		if ($id)
		{
		    $req = $this->getbdd()->prepare('SELECT id_user,id_article,contenu, DATE_FORMAT(dateDernierModif, "%d/%m/%Y à %Hh%i") AS dateDernierModif FROM Commentaires WHERE id_article = ?');
		    $req->execute(array($id));
			$commentaires=array();
			foreach($req->fetchAll() as $commentaire){
			$commentaires[] = new Commentaire($commentaire);
			}

		   
		    return $commentaires;
		}
	       
	    }

	//Ajouter un acommentaire en bdd
	public function AddCommentaire($contenu,$id_user,$id_article)
	{	
		$bdd=$this->getBdd();
		$var=[];
		$req=$bdd->prepare('INSERT INTO Commentaires (id_user,id_article,contenu,dateDernierModif) VALUE(?,?,?,NOW())');
		$req->execute(array($id_user,$id_article,$contenu)); 
		dump($req->errorInfo());

	}


	//Supprimer un commentaire
	public function deleteCommentaire($id)
	{
	    $req = $this->getBdd()->prepare('DELETE FROM Commentaires WHERE id= :id');
	    $req->bindValue(':id', $id);
	    $req->execute();
	    $req->closeCursor();
	    return true;
	//    dump($req->errorInfo());

	}
}
?> 