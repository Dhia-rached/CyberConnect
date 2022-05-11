<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$listereservations=$reservationC->afficherresid($_GET["idcs"]); 
    
?>
<html>
	<head></head>
	<body>
		<form method="POST" action="listeterrain.php">
		<input type="submit" name="Modifier" value="liste des terrains">
		<input type="hidden" value=<?PHP echo $_GET["idcs"]; ?> name="idcs">	
		</form>
	    <button><a href="listeterrain.php?idcs=<?php echo $_GET["idcs"]?>">Ajouter une reservation</a></button>
		<button><a href="suprimerres.php">suprimer une reservation</a></button>
        
		<center><h1>Votre liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>idclien</th>
				<th>idterrain</th>
				<th>date reservation</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listereservations as $reservation){
			?>
			<tr>
				<td><?php echo $reservation['idc']; ?></td>
				<td><?php echo $reservation['idt']; ?></td>
				<td><?php echo $reservation['dateres']; ?></td>
				
				<td>
					<form method="POST" action="modifierres.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['idc']; ?> name="idc">
					</form>
				</td>
				<td>
					<a href="supprimerres.php?idc=<?php echo $reservation['idc']; ?>&idt=<?php echo $reservation['idt']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
