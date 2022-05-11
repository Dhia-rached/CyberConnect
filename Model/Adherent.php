<?php
	class terrain{
		private $id=null;
		private $typee=null;
		private $datee=null;

		function __construct($id, $typee, $datee){
			$this->id=$id;
			$this->typee=$typee;
			$this->datee=$datee;
			
		}
		function getid(){
			return $this->id;
		}
		function gettype(){
			return $this->typee;
		}
		function getdate(){
			return $this->datee;
		}
		
		function setid(string $id){
			$this->id=$id;
		}
		function settype(string $typee){
			$this->typee=$typee;
		}
		function setdate(string $datee){
			$this->datee=$datee;
		}
		
		
	}


?>