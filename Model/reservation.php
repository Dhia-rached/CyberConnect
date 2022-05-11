<?php
	class reservation{
		private $idc=null;
		private $idt=null;
		private $dateres=null;
		
		function __construct($idc, $idt, $dateres){
			$this->idc=$idc;
			$this->idt=$idt;
			$this->dateres=$dateres;
			
		}
		function getidc(){
			return $this->idc;
		}
		function getidt(){
			return $this->idt;
		}
		function getdateres(){
			return $this->dateres;
		}
		
		function setidc(string $idc){
			$this->idc=$idc;
		}
		function setidt(string $idt){
			$this->idt=$idt;
		}
		function setdateres(string $dateres){
			$this->dateres=$dateres;
		}
		
		
	}


?>