<?php
require_once('controllers/ControllerBase.php');
class Router
{
	private $ctrl;  //pour determiner quel est le ctrl qu'n veut avoir
	private $view;  //manipuler les vues 

	public function __construct()
	{
		$route=file_get_contents("config/route.json");
		$this->route = json_decode($route);
	}
	public function routeReq() 
	{
		try{
			//cette fnct permettre de charger automatiquement les classes
			spl_autoload_register(function($class){ 
				require_once('models/'.$class .'.php');

			});

			$url='';
			//inclure le controller selon l'action de user
			// if(isset($_GET['url']))
			//Appliquer un filtre sur l'url
				// $url = explode('/',filter_var($_GET['url'],
				// FILTER_SANITIZE_URL));
				$url=$_SERVER['REQUEST_URI'];//recuperer l'url de la page
				
				//filtrer le tableau d'url dans route    comaparer les urls
				$result=array_filter($this->route,function($route) use($url)
				{
					
					return preg_match('#^'."/projet5-blog-php".$route->url."$#",$url);
					
				});
				
				if(isset($result) && count($result) >1 )
				{
					throw new Exception('Page introuvable');
				}
				else{
					$route=array_shift($result);
					$param=$this->getParam($route,$url);
					$controllerClass="Controller".$route->controller;
				//retrouver le chemin de controller volu
				$controllerFile="Controllers/".$controllerClass.".php";

				//verifier si le fichier existe
				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					$this->ctrl = new $controllerClass();
					if($param != false){
						$this->ctrl->{$route->action}(...$param);
					}else{$this->ctrl->{$route->action}();}
					
				}
				else{
					throw new Exception('Page introuvable');
				}

				}
				//tout l'url en miniscule sauf sa 1er lettre en majuscule
				$controller= ucfirst(strtolower($url[0]));
				
			
		}
		//Gestion des erreurs
		catch(Exception $e)
		{
			$MsgError = $e->getMessage();
			require_once('views/viewError.php');
		}

	}

	//Réccupérer les paramétres dans l'URL
	public function getParam($route,$url){
		if(!empty ($route->param)){
			
			if(preg_match("#^"."/projet5-blog-php".$route->url."\/?$#",$url,$ListParam)>0){
				
				$param=[];
				for($i=0;$i<=count($ListParam)-2;$i++){
					$param[]=$ListParam[$i+1];
				}
				return $param;
			}
			
		}
		return false;

	}
}
?>