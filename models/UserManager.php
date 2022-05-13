<?php

class UserManager extends Model{
	public function __construct()
	{	
		
		
	}
	public function InscriptionUser($nom,$prenom,$mail,$mot_de_passe,$mot_de_passe_2){
		
		$bdd=$this->getBdd();
		$mail = strtolower($mail); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
		// On hash le mot de passe avec Bcrypt, via un coût de 12
		$cost = ['cost' => 12];
		$mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT, $cost);
											
		//On insère dans la base de données
		$insert = $bdd->prepare('INSERT INTO User(nom,prenom, mail, mot_de_passe) VALUES(?,?,?,?)');
		$insert->execute(array($nom,$prenom,$mail,$mot_de_passe));
		return $insert->rowCount();
		
		
		
	}

	//vérification de l'existence du mail(user)
	public function checkUser($mail){
		$bdd=$this->getBdd();
			
			// On vérifie si l'utilisateur existe
			$check = $bdd->prepare('SELECT nom,prenom, mail, mot_de_passe FROM User WHERE mail = ?');
			$check->execute(array($mail));

			return  $check->rowCount();
	}



	// connexion user 
	public function ConnexionUser($mail)
	{
		// On regarde si l'utilisateur est inscrit dans la table utilisateurs
		$bdd=$this->getBdd();
		$check = $bdd->prepare('SELECT id,nom,prenom, mail,mot_de_passe FROM User WHERE mail = ?');
		$check->execute(array($mail));
		$data = $check->fetch();
		$row = $check->rowCount();
	
		return $data;
		
	}

	
}