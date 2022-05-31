<?php
class Post{
 
	public function __construct(){
		$this->Post=$_POST;

  }
  public function get($name){
	  if(!empty($this->Post[$name])){
		  return $this->Post[$name];
	  }else{return null;}
  }
}
?>