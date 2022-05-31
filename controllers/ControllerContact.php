<?php
class ControllerContact extends ControllerBase
{

	// private $articleManager;
	// private $view;
 


	public function Envoyer()
	{
		$this->contactManager = new ContactManager();
		if ($this->Post->get('nom')!=null && $this->Post->get('prenom')!=null && $this->Post->get('mail')!=null && $this->Post->get('message')!=null) {

			$contactes = $this->contactManager->Envoyer($this->Post->get('nom'), $this->Post->get('prenom'),$this->Post->get('mail'),$this->Post->get('message'));
			$this->AddParam('contactes', $contactes);
			// require_once("views/viewContact.php");
			$this->view('viewContact');
		}
	}
}
