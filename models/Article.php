<?php
class Article{
	private $id;
	private $titre;
	private $chapo;
	private $contenu;
	private $auteur;
	private $dateDernierModif;

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



	public function setChapo($chapo)
	{
		if(is_string($chapo))
		{
			$this->chapo=$chapo;
		}
	}
	public function getChapo()
	{
		return $this->chapo;
	}


	public function getContenu()
	{
	    return $this->contenu;
	}
	
	public function setContenu($contenu)
	{
	    $this->contenu = $contenu;
	}



	public function setAuteur($auteur)
	{
		if(is_string($auteur))
		{
			$this->auteur=$auteur;
		}
	}
	public function getAuteur()
	{
		return $this->auteur;
	}




	public function setDateDernierModif($dateDernierModif)
	{
		
			$this->dateDernierModif=$dateDernierModif;
	}
	public function getDateDernierModif()
	{
		return $this->dateDernierModif;
	}
	
}
	
?>