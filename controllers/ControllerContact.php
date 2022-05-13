<?php 
class ControllerContact extends ControllerBase {
	
private $articleManager;
private $view;



public function Envoyer(){
	$this->contactManager = new ContactManager();
	$contactes=$this->contactManager->Envoyer($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['message']);
	$this->AddParam('contactes',$contactes);
	// require_once("views/viewContact.php");
	$this->view('viewContact');
} 
}
