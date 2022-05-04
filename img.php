<?php
	class img{
	
		private $img=null;
		
		function __construct($img,$nom){
	
			$this->img=$img;
			$this->nom=$nom;
		}
		
		function getimg(){
			return $this->img;
		}
		function getnom(){
			return $this->nom;
		}
		
		
		
	}
	
	

?>