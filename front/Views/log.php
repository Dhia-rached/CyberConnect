<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	
?>

<html>
    <head></head>
    <body>
    <form method="post" action="listeterrain.php">
		<input type="text" name="idcs" id="idcs" maxlength="20">
		<!--<select name="idcs"  ><?php echo $option;?></select>-->
		<input type="submit" name="valider" value="valider">
		<!--<input type="hidden" value=<?PHP echo $reservation['idcs']; ?> name="idcs">-->
		</form>
    </body>
</html>