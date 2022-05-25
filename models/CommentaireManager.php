<?php
class CommentaireManager extends Model{

	
	public function getCommentaires()
	{	
		$commentaire=$this->getAll('commentaires','commentaire');
		return $commentaire; 
	}

	//un commentaire par son id
	public function getCommentaire_Id($id){
		$req = $this->getbdd()->prepare('SELECT id,id_article,contenu, DATE_FORMAT(dateDernierModif, "%d/%m/%Y à %Hh%i") AS dateDernierModif FROM Commentaires WHERE id = ?');
		$req->execute(array($id));
		$result=$req->fetch();
		return new Commentaire($result);
	}
	//Recupérer tt les commentaires d'un article'
	public function getCommentaire($id){ 
		if ($id)
		{
		    $req = $this->getbdd()->prepare('SELECT Commentaires.id,Commentaires.id_user,Commentaires.id_article,Commentaires.contenu,Commentaires.valider, DATE_FORMAT(Commentaires.dateDernierModif, "%d/%m/%Y à %Hh%i") AS dateDernierModif,Concat(user.prenom," ",user.nom) AS user_name FROM Commentaires INNER JOIN user ON Commentaires.id_user=user.id WHERE id_article = ?');
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
		$req->execute(array(htmlentities($id_user),htmlentities($id_article),htmlentities($contenu))); 
		// dump($req->errorInfo());

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

	public function valideCommentaire($id)
	{
		$bdd=$this->getBdd();
		$req=$bdd->prepare('UPDATE Commentaires SET valider=1 WHERE id=:id');
		return $req->execute(array("id"=>htmlentities($id)));
	}
}
?> 