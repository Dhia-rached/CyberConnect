<?php
	require_once '../controller/categorieC.php';
	$categoriec=new categorieC();
	$listecategorie=$categoriec->affichercategorie(); 
?>


<html>
	<head>

	</head>
	<body>
	    <button><a href="ajoutercategorie.php">Ajouter une catégorie</a></button>
		<center><h1>Liste des catégories</h1></center>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		<table border="1" align="center" id="myTable">
			<tr>
				<th>id_categorie</th>
				<th>Nom catégorie</th>
				<th>Nombre de evenement</th>
				<th>Description </th>
                <th>modifier </th>
                <th>supprimer </th>
			</tr>
			<?php
				foreach($listecategorie as $catal){
			?>
			<tr>
				<td><?php echo $catal['id_categorie']; ?></td>
				<td><?php echo $catal['nomCategorie']; ?></td>
				<td><?php echo $catal['nbrEvent']; ?></td>
				<td><?php echo $catal['dscrpt']; ?></td>
				<td>
					<form method="POST" action="modifercategorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value="<?=$categorie['id_categorie']?>" name="id_categorie">
						<!-- <input type="" value="" name="reference"> -->
					</form>
				</td>
				<td>
					<a href="supprimercategorie.php? id_categorie=<?php echo $categorie['id_categorie']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>








	
</html>