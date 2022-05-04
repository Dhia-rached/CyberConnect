<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "cyber");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM categorie";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>id_categorie</th>  
                         <th>nomCategorie</th>  
                         <th>nbrEventy</th>  
       <th>dscrpt</th>
      
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id_categorie"].'</td>  
                         <td>'.$row["nomCategorie"].'</td>  
                         <td>'.$row["nbrEvent"].'</td>  
       <td>'.$row["dscrpt"].'</td>  
      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
