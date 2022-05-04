<?php
	include '../controler/categorieC.php';
	$categorieC=new categorieC();
	$categorieC->supprimer_categorie($_GET["id"]);
	header('Location:afficher_categorie.php');
?>