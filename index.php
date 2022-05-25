<?php
//Lancer le router
require_once('Controllers/Router.php');
   //utiliser dum au lieu de var_dump
function dump($data){
	echo'<pre>';
	var_dump($data);
	echo'</pre>';	
}
session_start();
$router = new Router();
$router->routeReq();
?>