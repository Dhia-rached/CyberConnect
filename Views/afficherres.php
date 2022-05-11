<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$listereservations=$reservationC->afficherres(); 
	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "projet";
    $connect = mysqli_connect($hostname,$username,$password ,$databasename);
    $query = "select idc from `client`";
    $result = mysqli_query($connect,$query);
    $option = "";
    while($row1 = mysqli_fetch_array($result))
    {
        $option = $option."<option>$row1[0]</option>";
    }
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterres.php">Ajouter une reservation</a></button>
		<button><a href="listesup.php">suprimer une reservation</a></button>
		
		<form method="post" action="listesup.php">
		<input type="text" name="idcs" id="idcs" maxlength="20">
		<!--<select name="idcs"  ><?php echo $option;?></select>-->
		<input type="submit" name="valider" value="valider">
		<!--<input type="hidden" value=<?PHP echo $reservation['idcs']; ?> name="idcs">-->
		</form>
		<a href="listesup.php?idc=<?php echo $reservation['idcs']; ?> ">Supprimer</a>
		<center><h1>Liste des reservations</h1></center>
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
						<input type="hidden" value=<?PHP echo $reservation['idt']; ?> name="idt">
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
