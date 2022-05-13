<?php
//ce fichier contient les différentes métodes communes aux autres classes
abstract class Model{
	protected static $_bdd;

	// Instancie la connexion a la bdd 
	private static  function setBdd()
	{
		self::$_bdd = new PDO('mysql:host=localhost; dbname=projet5-blog; charset=utf8','root','root');

		//gerer les erreurs avec les contantes de PDO
		self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	//Recuperer la connexion a  la bdd
	protected function getBdd()
	{
		if (self::$_bdd == null)
		self::setBdd();
		return self::$_bdd;
	}
	//Recuperer tt les données d'une table 
	protected function getAll($table,$obj)
	{	
		$this->getBdd();
		$var=[];
		$req= self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
		$req->execute();

		while ($data =$req->fetch(PDO::FETCH_ASSOC))
		{
			$var[]= new $obj($data);
		}
		return $var;
		$req->closeCursor();
	}
}
?>