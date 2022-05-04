<?php
	include '../controler/produitC.php';
	$produitC=new produitC();
	$produitC->supprimer_produit($_GET["code"]);
	header('Location:afficher_produit.php');
?>