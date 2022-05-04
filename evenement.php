<?php
	class Evenement{
		private $reference=null;
		private $nom=null;
		private $sujet=null;
		private $emplacement=null;
		private $date=null;
		private $prix=null; 
		private $id_categorie=null;
		private $img=null;
		
		function __construct($reference, $nom, $sujet, $emplacement, $date, $prix ,$id_categorie, $img){
			$this->reference=$reference;
			$this->nom=$nom;
			$this->sujet=$sujet;
			$this->emplacement=$emplacement;
			$this->date=$date;
			$this->prix=$prix;
			$this->id_categorie=$id_categorie;
			$this->img=$img;
		}
		function getreference(){
			return $this->reference;
		}
		function getnom(){
			return $this->nom;
		}
		function getsujet(){
			return $this->sujet;
		}
		function getemp(){
			return $this->emplacement;
		}
		function getdate(){
			return $this->date;
		
		}
		function getprix(){
			return $this->prix;
		}
        
		function getcategorie(){
			return $this->id_categorie;
		}
		function getimg(){
			return $this->img;
		}
		
		function setnom(string $nom){
			$this->nom =$nom; 
        }
		function setsujet(string $sujet){
			$this->sujet=$sujet;
		}
		function setemp(string $emplacement){
			$this->emplacement=$emplacement;
		}
		function setdate(string $date){
			$this->date=$date;
		}
		function setprix(int $prix){
			$this->prix = $prix;
		}
	    function setcategorie(int $id_categorie){
			$this->id_categorie = $id_categorie;
		}
		function setimg(string $img){
			$this->img = $img;
		}
		
	}
	
	

?>