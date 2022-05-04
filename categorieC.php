<?php
	include '../config.php';
	include_once '../model/categorie.php';
	class categorieC {

     


		function triPrix()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM categorie ORDER BY nbrEvent ASC";
			
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
			$sql = "SELECT * FROM categorie ORDER BY nbrEvent DESC";
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
			$sql = "SELECT * FROM categorie ORDER BY id_categorie";
			 
			try{
			 $listeevenement = $db->query($sql);
			 return $listeevenement;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		
		}





		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$listecategorie = $db->query($sql);
				return $listecategorie;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimercategorie($id_categorie){
			$sql="DELETE FROM categorie WHERE id_categorie=:id_categorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_categorie', $id_categorie,PDO::PARAM_STR);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (id_categorie,nomCategorie, nbrEvent, dscrpt) 
			VALUES (:id_categorie, :nomCategorie, :nbrEvent, :dscrpt)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_categorie' => $categorie->getid_categorie(),
					'nomCategorie' => $categorie->getCateg(),
					'nbrEvent' => $categorie->getNbr(),
					'dscrpt' => $categorie->getDescpt()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		function recuperercategorie($id_categorie){
			$sql="SELECT * from categorie where id_categorie=$id_categorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categoriec, $id_categorie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						nomCategorie= :nomCategorie,
						nbrEvent= :nbrEvent,
						dscrpt= :dscrpt
					WHERE id_categorie= :id_categorie'
				);
				$query->execute([
					'nomCategorie' => $categoriec->getCateg(),
					'nbrEvent' => $categoriec->getNbr(),
					'dscrpt' => $categoriec->getDescpt(),
					'id_categorie' => $id_categorie
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


	}
?>