<?php
class ArticleManager extends Model{
	//Recupérer tt les articles dans la bdd
	public function getArticles()
	{	
		$article=$this->getAll('articles','Article');
		return $article; 
	}

	//Recupérer un article 
	public function getArticle($id){ 
        if ($id)
        {
            $req = $this->getbdd()->prepare('SELECT id, titre, auteur, chapo, contenu, DATE_FORMAT(dateDernierModif, "%d/%m/%Y à %Hh%i") AS dateDernierModif FROM articles WHERE id = ?');
            $req->execute(array($id));
            $article = new Article($req->fetch(PDO::FETCH_ASSOC));
            return $article;
        }
       
    }

	//Ajouter un article en bdd
	public function AddArticle($titre,$chapo,$contenu,$auteur)
	{	
		$bdd=$this->getBdd();
		$var=[];
		$req=$bdd->prepare('INSERT INTO Articles(titre,chapo,contenu,auteur,dateDernierModif) VALUE(?,?,?,?,NOW())');
		return $req->execute(array($titre,$chapo,$contenu,$auteur)); 
	}


	//Modifier un article 
	public function EditArticle( $id,$titre,$chapo,$contenu,$auteur)
	{	
		$bdd=$this->getBdd();
		$var=[];
		$req=$bdd->prepare('UPDATE Articles SET titre= :titre, chapo= :chapo, contenu= :contenu, auteur= :auteur, dateDernierModif= NOW() WHERE id = :id');
		return $req->execute(array("id"=>$id,"titre"=>$titre,"chapo"=>$chapo,"contenu"=>$contenu,"auteur"=>$auteur)); 
		// dump($req->errorInfo());
		
	}
	//Supprimer un article
	public function deleteArticle($id)
	{
	    $req = $this->getBdd()->prepare('DELETE FROM Articles WHERE id= :id');
	    $req->bindValue(':id', $id);
	    $req->execute();
	    $req->closeCursor();
	    return true;
	   // dump($req->errorInfo());

	}

	
}
?>