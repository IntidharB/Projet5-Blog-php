<?php
class Commentaire{
	private $id;
	private $id_user;
	private $id_article;
	private $titre;
	private $contenu;
	private $dateDernierModif;
	private $valider;
	private $user_name;

	public function __construct(array $data)
	{	
		$this->hydrate($data);
		
	}

	//hydratation
	 public function hydrate ( array $data)
	{
		foreach($data as $key => $value){
			$method ='set'.ucfirst($key);
			if(method_exists($this,$method))
			{
				$this->$method($value);
			}
		}
	}


	//SETTERS ET GETTERS

	//Enregistrer l'id
	public function setId($id)
	{
		$id = (int) $id;
		if($id > 0)
		{
			$this->id =$id;
		}
	}

	//Retourner l'id
	public function getId()
	{
		return $this->id;
	}



	public function setId_user($id_user)
	{
		if(is_string($id_user))
		{
			$this->id_user=$id_user;
		}
	}
	public function getId_user()
	{
		return $this->id_user;
	}




	public function setId_article($id_article)
	{
		if(is_string($id_article))
		{
			$this->id_article=$id_article;
		}
	}
	public function getId_article()
	{
		return $this->id_article;
	}





	public function setTitre($titre)
	{
		if(is_string($titre))
		{
			$this->titre=$titre;
		}
	}
	public function getTitre()
	{
		return $this->titre;
	}



	

	public function getContenu()
	{
	    return $this->contenu;
	}
	
	public function setContenu($contenu)
	{
	    $this->contenu = $contenu;
	}



	



	public function setDateDernierModif($dateDernierModif)
	{
		
			$this->dateDernierModif=$dateDernierModif;
	}
	public function getDateDernierModif()
	{
		return $this->dateDernierModif;
	}


	public function setValider($valider)
	{
		if(is_string($valider))
		{
			$this->valider=$valider;
		}
	}
	public function getValider()
	{
		return $this->valider;
	}



	public function setUser_name($user_name)
	{
		if(is_string($user_name))
		{
			$this->user_name=$user_name;
		}
	}
	public function getUser_name()
	{
		return $this->user_name;
	}

	
}
	
?>