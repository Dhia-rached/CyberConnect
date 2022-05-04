<?php
	include_once '../config.php';
	include_once '../model/evenement.php';
	class EvenementC {

		function triPrix()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM tab_evenement ORDER BY prix ASC";
			
			try{
				$listeevenement = $db->query($sql);
				return $listeevenement;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		
	
		 function triPrixDesc()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM tab_evenement ORDER BY prix DESC";
			try{
				$listeevenement = $db->query($sql);
				return $listeevenement;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		function triProduit()
		{
			
			$db = config::getConnexion(); 
			$sql = "SELECT * FROM tab_evenement ORDER BY id_categorie";
			 
			try{
			 $listeevenement = $db->query($sql);
			 return $listeevenement;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		
		}



		function afficherevent(){
			$sql="SELECT * FROM tab_evenement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerevent($reference){
			$sql="DELETE FROM tab_evenement WHERE reference=:reference";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':reference', $reference,PDO::PARAM_STR);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function ajoutevent($event)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO tab_evenement (reference,nom , sujet, emplacement , date ,prix ,id_categorie,img)
					 VALUES (:reference, :nom ,:sujet, :emplacement , :date ,:prix ,:id_categorie, :img )
					');
					//INSERT
					$query->bindValue('reference', $event->getreference());
					$query->bindValue('nom' , $event->getnom());
					$query->bindValue('sujet' , $event->getsujet());
					$query->bindValue('emplacement' ,$event->getemp());
					$query->bindValue('date' ,$event->getdate());
					$query->bindValue('prix' ,$event->getprix());
					$query->bindValue('id_categorie' ,$event->getcategorie());
					$query->bindValue('img' ,$event->getimg());
					
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function recupererevent($reference){
			$sql="SELECT * from tab_evenement WHERE reference=$reference";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$event=$query->fetch();
				return $event;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifevent($eventc,$reference)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					' UPDATE tab_evenement SET
						nom= :nom, 
						sujet= :sujet, 
						emplacement= :emplacement, 
						date= :date,
						prix= :prix,
						id_categorie= :id_categorie,
						img= :img
						WHERE reference=:reference'
				);
					//INSERT
					$query->execute([
						'nom' => $eventc->getnom(),
						'sujet' => $eventc->getsujet(),
						'emplacement' => $eventc->getemp(),
						'date' => $eventc->getdate(),
						'prix'=> $eventc->getprix(),
						'id_categorie'=> $eventc->getcategorie(),
						'img'=> $eventc->getimg(),
						'reference' => $reference
					]);
					echo $query->rowCount() . " records UPDATED successfully <br>";
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
	}
?>