<?php
	//include '../config.php';
	include_once '../Model/Adherent.php';
	class terrainC {
		function afficherterrain(){
			$sql="SELECT * FROM terrain";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerterrain($id){
			$sql="DELETE FROM terrain WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterterrain($terrain){
			$sql="INSERT INTO terrain (id, typee, datee) 
			VALUES (:id,:typee,:datee)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $terrain->getid(),
					'typee' => $terrain->gettype(),
					'datee' => $terrain->getdate(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererterrain($id){
			$sql="SELECT * from terrain where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$terrain=$query->fetch();
				return $terrain;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierterrain($terrain, $id){
			try {
				$sql="UPDATE INTO terrain (typee, datee) 
			VALUES (:typee, :datee) WHERE id= $id" ;
				$db = config::getConnexion();
				$query = $db->prepare(//$sql);
					" UPDATE terrain set typee = :typee, datee = :datee  where id = $id");
				$query->execute([
					':typee' => $terrain->gettype(),
					':datee' => $terrain->getdate(),

					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>