<?php

use function PHPSTORM_META\map;

class ControllerUser extends ControllerBase {
	



 

	public function Inscrit(){
		$this->userManager = new UserManager();
	
		// Si les variables existent et qu'elles ne sont pas vides
		if(!empty($_POST['nom']) &&!empty($_POST['prenom'])&& !empty($_POST['mail']) && !empty($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe_2'])){
			
			$row=$this->userManager->checkUser($_POST['mail']);
			
			// Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
			if($row == 0)
			{
				// if(strlen($_POST['nom']) <= 100)
				// {
					 // On verifie que la longueur du nom <= 100
						if(strlen($_POST['prenom'])<= 100)
						{	
							if(strlen($_POST['mail']) <= 100)// On verifie que la longueur du mail <= 100
							{
								if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))// Si l'email est de la bonne forme
								{ 
									if($_POST['mot_de_passe'] === $_POST['mot_de_passe_2'])// si les deux mdp saisis sont bon
									{ 
			
			$result= $this->userManager->InscriptionUser($_POST['nom'], $_POST['prenom'],$_POST['mail'], $_POST['mot_de_passe'], $_POST['mot_de_passe_2']);
			if($result==1){
				$user=$this->userManager->checkUser($_POST['mail']);
				$_SESSION['user']=$user;
				$this->redirect('Accueil');
			}
		}else{  $this->AddParam("error","veuillez vérifier  vos mot de passe");}
	}else{ $this->AddParam("error","veuillez saisir un email valide");}
}else{  $this->AddParam("error","Votre adresse_mail dépasse le nombre de caractères autorisés");}
}else{  $this->AddParam("error","votre prénom dépasse le nombre de caractères autorisésr");}
// }else{  $this->AddParam("error","votre nom dépasse le nombre de caractères autorisés");}
}else{ $this->AddParam("error","Adresse mail déjà utilisée par un autre utilisateur");}
$this->view('viewInscription');

	}
	
	}
	public function Inscription(){
		$this->view('viewInscription');
	}



	public function Connect(){
		
		$this->userManager = new UserManager();
		// Si il existe les champs email, password et qu'il sont pas vident
		if(!empty($_POST['mail']) && !empty($_POST['mot_de_passe'])) 
		{
			$row=$this->userManager->ConnexionUser($_POST['mail'], $_POST['mot_de_passe']);
			// Si > à 0 alors l'utilisateur existe
			if($row > 0)
			{
				$user = $this->userManager->ConnexionUser($_POST['mail'], $_POST['mot_de_passe']);
				$this->AddParam('user',$user);
				// Si le mail est bon niveau format
				if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
				{
					// Si le mot de passe est le bon
					if(password_verify($_POST['mot_de_passe'], $user['mot_de_passe']))
					{
						// On créer la session
						$_SESSION['user'] = $user;
						$this->redirect('Accueil');
						
					}else{ $this->AddParam("error","Mot de passe inccorecte");  }
				}
				//  else{ header('Location: index.php?login_err=email'); }
			
			}else{ $this->AddParam("error","L’adresse e-mail que vous avez saisi(e) n’est pas associé(e) à un compte");  } //L’adresse e-mail que vous avez saisi(e) n’est pas associé(e) à un compte
		}else{ $this->AddParam("error","Veuillez remplir tous les champs du formulaire") ; } // si le formulaire est envoyé sans aucune données $this->redirect("Connexion")
		$this->view('viewConnexion');

	}
	
	public function Connexion(){
		
		$this->view('viewConnexion');
	}


	public function Deconnexion(){
		session_destroy();
		$this->redirect("Accueil");
	}
}
    
    