<?php
	include '../config.php';
	include_once '../Model/reservation.php';
	class reservationC {
		function afficherres(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function afficherresid($idc){
			$sql="SELECT * FROM reservation where idc=:idc";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idc', $idc);
			try{
				$req->execute();
				//$liste = $db->query($sql);
				return $req;//$liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerres($idc,$idt){
			$sql="DELETE FROM reservation WHERE ( idc= :idc AND idt= :idt )";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idt', $idt);
			$req->bindValue(':idc', $idc);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterres($reservation){
			$sql="INSERT INTO reservation (idc, idt, dateres) 
			VALUES (:idc,:idt,:dateres)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idc' => $reservation->getidc(),
					'idt' => $reservation->getidt(),
					'dateres' => $reservation->getdateres()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererres($idc){
			$sql="SELECT * from reservation WHERE idc=$idc  ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function verif($idt, $dateres){   
			$db = config::getConnexion(); 
			$sql="SELECT * FROM reservation where idt=:idt and dateres=:dateres";
			 
			try{
			 $result = $db->prepare($sql);
			 $result->execute([
				 ':dateres'=>$dateres,
				 ':idt'=>$idt
			 ]);
			 $row = $result->rowCount();
			 return $row;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		}
		function verifc($idt){   
			$db = config::getConnexion(); 
			$sql="SELECT * FROM reservation where idt=:idt";
			 
			try{
			 $result = $db->prepare($sql);
			 $result->execute([
				 ':idt'=>$idt
			 ]);
			 $row = $result->rowCount();
			 return $row;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		}
		function modifierres($reservation, $idc, $idt){
			try {
				$sql="UPDATE INTO reservation (idt, dateres) 
			VALUES (:idt, :dateres) WHERE idc= $idc" ;
				$db = config::getConnexion();
				$query = $db->prepare(//$sql);
					" UPDATE reservation set /*idt = :idt,*/ dateres = :dateres  where ( idc = $idc and idt = $idt) ");
				$query->execute([
					//':idt' => $reservation->getidt(),
					':dateres' => $reservation->getdateres(),

					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}	

	}
	function rechercher($idt)
	   {   
		   $db = config::getConnexion(); 
		   $sql="SELECT * FROM reservation where idc=$idt ";
			
		   try{
			$listereservations = $db->query($sql);
			return $listereservations;
		}
		   catch (Exception $e)
		   {
			   die('Erreur:'.$e->getMessage());
		   }
	   }
}
?>