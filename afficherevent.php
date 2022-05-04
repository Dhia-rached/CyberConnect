<?php
	include '../controller/evenementC.php';
	$evenementC=new EvenementC();
	$listeevenement=$evenementC->afficherevent(); 
?>
<html>
	<head>
	
	</head>
	<body>
	    <button><a href="ajoutevent.php">Ajouter un evenement</a></button>
		<center><h1>Liste des evenements</h1></center>
		<table border="1" align="center">
			<tr>
				<th>Reference</th>
				<th>Nom du evenement</th>
				<th>sujet</th>
				<th>emplacement</th>
				<th>date</th>
				<th>prix</th>
				<th>id_categorie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeevenement as $evenement){
			?>
			<tr>
				<td><?php echo $evenement['reference']; ?></td>
				<td><?php echo $evenement['nom']; ?></td>
				<td><?php echo $evenement['sujet']; ?></td>
				<td><?php echo $evenement['emplacement']; ?></td>
				<td><?php echo $evenement['date']; ?></td>
				<td><?php echo $evenement['prix']; ?></td>
				<td><?php echo $evenement['id_categorie']; ?></td>

				<td>
					<form method="POST" action="modifevent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value="<?=$evenement['reference']?>" name="reference">
						<!-- <input type="" value="" name="reference"> -->
					</form>
				</td>
				<td>
					<a href="supprimerevent.php? reference=<?php echo $evenement['reference']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>