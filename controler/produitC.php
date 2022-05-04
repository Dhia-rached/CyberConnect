<?php

	include '../config.php';
	include_once '../Model/produit.php';
	class produitC{
		function afficher_produit(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				$liste->execute();
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function rechercheproduit($nom){
			$sql="SELECT * from produit where nom='$nom'";
			$db = config::getConnexion();
			try{
				$query=$db->query($sql);

				
				return $query;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function rechercheid($id){
			$sql="SELECT * from produit where id='$id'";
			$db = config::getConnexion();
			try{
				$query=$db->query($sql);

				
				return $query;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function supprimer_produit($code){
			$sql="DELETE FROM produit WHERE code=:code";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code', $code);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
        function ajouter_produit($produit)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO produit(code,nom,prix,qualite,stock,img,id)
					 VALUES (:code, :nom ,:prix, :qualite , :stock ,:img,:id )
					');
					//INSERT
					$query->bindValue('code', $produit->getcode());
					$query->bindValue('nom' , $produit->getnom());
					$query->bindValue('prix' , $produit->getprix());
					$query->bindValue('qualite' ,$produit->getqualite());
					$query->bindValue('stock' ,$produit->getstock());
					$query->bindValue('img' ,$produit->getimage());
					$query->bindValue('id' ,$produit->getid());
					//$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		
		function recuperer_produit($code){
			$sql="SELECT * from produit where code=$code";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifier_produit($produit, $code){
			$db = config::getConnexion();
			try {
				
				$query = $db->prepare(
					'UPDATE produit SET  
						nom= :nom, 
						prix= prix, 
					qualite= :qualite, 
						stock= :stock,
						img=:img,
						id=:id,
					WHERE code= :code'
				);
				$query->execute([
					'nom' => $produit->getnom(),
					'prix' => $produit->getprix(),
					'qualite' => $produit->getqualite(),
					'stock' => $produit->getstock(),
					'img'=>$produit->getimg(),
					'id'=>$produit->getid(),
					'code' => $code
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function triPrix()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM produit ORDER BY prix ASC";
			
			try{
				$listeProduits = $db->query($sql);
				return $listeProduits;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		function triPrixDesc()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM produit ORDER BY prix DESC";
			try{
				$listeProduits = $db->query($sql);
				return $listeProduits;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		
		function triProduit()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM produit ORDER BY stock ASC";
			try{
				$listeProduits = $db->query($sql);
				return $listeProduits;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		function rechercherproduit($nom)
		{   
			$db = config::getConnexion(); 
			$sql="SELECT * FROM produit where nom LIKE '$nom%' ";
			 
			try{
			 $listeProduits = $db->query($sql);
			 return $listeProduits;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		}
	}
?>