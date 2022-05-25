<?php
class ControllerBase
{

	private $params;

	public function __construct()
	{
		$this->params = [];
		$this->config = json_decode(file_get_contents("config/config.json"));
		$this->params["baseurl"] = $this->config->baseurl;
		
	}
	public function redirect($url)
	{
		header('location: ' . $this->config->baseurl . $url);
	}
	//ajouter un param dans la vue
	public function AddParam($name, $value)
	{
		$this->params[$name] = $value;
	}

	//Afficher la vue dans layout
	public function view($view)
	{
		ob_start();
		extract($this->params, EXTR_REFS);
		include_once('views/' . $view . '.php');
		$content = ob_get_contents();
		ob_end_clean();

		include_once('views/layout.php');
	}
}
