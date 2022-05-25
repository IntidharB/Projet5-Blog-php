<?php
class ContactManager extends Model{
	// Envoyer les mails en bdd
	public function Envoyer($nom,$prenom,$mail,$message)
	{	
		$bdd=$this->getBdd();
		$var=[];
		$req=$bdd->prepare('INSERT INTO Contact(nom,prenom,mail,message) VALUE(?,?,?,?)');
		return $req->execute(array(htmlentities($nom),htmlentities($prenom),htmlentities($mail),htmlentities($message))); 
	}
	
}