<?php

include_once '../config.php';
	include_once '../model/img.php';
	class imgC {

    

		function afficherimg(){
			$sql="SELECT * FROM img";
			$db = config::getConnexion();
			try{
				$listeimg = $db->query($sql);
				return $listeimg;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }
		
		
		function recupererimg($img){
			$sql="SELECT * from img where img=$img";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$img=$query->fetch();
				return $img;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	


	}

?>