<?php
class Session{
 
	public function __construct(){
		$this->Session=$_SESSION;

  }
  public function get($name){
	  if(!empty($this->Session[$name])){
		  return $this->Session[$name];
	  }else{return null;}
  }
  public function set($name,$value){
	$this->Session[$name]=$value;
  }
}
?>