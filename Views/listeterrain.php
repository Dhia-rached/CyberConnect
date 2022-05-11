<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	include '../Controller/AdherentC.php';
    //$idcs=htmlspecialchars($_POST['idcs']);
    $terrainC=new terrainC();
    $listeterrains=$terrainC->afficherterrain(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="listesup.php?idcs=<?php echo $idcs;?>">Vos reservations</a></button>
		<center><h1>Liste des terrains</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>type</th>
				<th>date</th>
				<th>Modifier</th>
				
			</tr>
			<?php
				foreach($listeterrains as $terrain){
			?>
			<tr>
				<td><?php echo $terrain['id']; ?></td>
				<td><?php echo $terrain['typee']; ?></td>
				<td><?php echo $terrain['datee']; ?></td>
				<td>
					<form method="POST" action="ajouterres.php">
						<input type="submit" name="Modifier" value="reserver">
						<!--<input type="hidden" value="<?PHP echo $idcs ?>" name="idcs">-->
                        <input type="hidden" value="<?PHP echo $terrain['id'] ?>" name="idts">
					</form>
				</td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>