<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$reservationC->supprimerres($_GET["idc"],$_GET["idt"]);
	header('Location:listesup.php?idcs='.$_GET["idc"]);
?>