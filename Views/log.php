<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	session_start();
	$idcs=htmlspecialchars($_POST['idcs']);
	$_SESSION["idcs"] = $idcs;
	if(!empty($_SESSION["idcs"])){
		header("location:listeterrain.php");
	}
?>

<html>
    <head></head>
    <body>
    <form method="POST" action=" ">
		<input type="text" name="idcs" id="idcs" maxlength="20">
		<!--<select name="idcs"  ><?php echo $option;?></select>-->
		<input type="submit" name="valider" value="valider">
		<!--<input type="hidden" value=<?PHP echo $reservation['idcs']; ?> name="idcs">-->
		</form>
    </body>
</html>