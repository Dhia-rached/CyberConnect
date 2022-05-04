<?php
	class Categorie{
		private $id_categorie=null;
		private $nomCategorie=null;
		private $nbrEvent=null;
		private $dscrpt=null;
		//private $password=null;
		function __construct($id_categorie, $nomCategorie, $nbrEvent, $dscrpt){
			$this->id_categorie=$id_categorie;
			$this->nomCategorie=$nomCategorie;
			$this->nbrEvent=$nbrEvent;
			$this->dscrpt=$dscrpt;
		}
		function getid_categorie(){
			return $this->id_categorie;
		}
		function getCateg(){
			return $this->nomCategorie;
		}
		function getNbr(){
			return $this->nbrEvent;
		}
		function getDescpt(){
			return $this->dscrpt;
		}
        function setid_categorie(int $id_categorie){
			$this->id_categorie =$id_categorie; 
        }
		function setCateg(string $nomCategorie){
			$this->nomCategorie=$nomCategorie;
		}
		function setNbrevent(int $nbrEvent){
			$this->nbrEvent=$nbrEvent;
		}
        function setDescpt(string $dscrpt){
			$this->dscrpt =$dscrpt;
        }
		
	}
?>