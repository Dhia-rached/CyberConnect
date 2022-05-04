<?php

include_once '../config.php';
	include_once '../Model/categorie.php';
    class categorieC{
function afficher_categorie()
{$sql="SELECT * FROM categorie_prod";
    $db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		
        function supprimer_categorie($id){
			$sql="DELETE FROM categorie_prod WHERE id=:id";
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


        function ajouter_categorie($categorie)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO categorie_prod (id,nom )
					 VALUES (:id, :nom  )
					');
					//INSERT
					$query->bindValue('id', $categorie->getid());
					$query->bindValue('nom' , $categorie->getnom());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}


        function ajouterequip($equipementmed)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO equipementmed (ref,nom , dsc, quantite , prix ,img, id_catalogue )
					 VALUES (:ref, :nom ,:dsc, :quantite , :prix ,:img,:id_catalogue )
					');
					//INSERT
					$query->bindValue('ref', $equipementmed->getRef());
					$query->bindValue('nom' , $equipementmed->getNom());
					$query->bindValue('dsc' , $equipementmed->getDesc());
					$query->bindValue('quantite' ,$equipementmed->getQt());
					$query->bindValue('prix' ,$equipementmed->getPrix());
					$query->bindValue('img' ,$equipementmed->getImage());
					$query->bindValue('id_catalogue' ,$equipementmed->getCateg());
					//$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
//fin afficher

    }//fin class
    ?>
    