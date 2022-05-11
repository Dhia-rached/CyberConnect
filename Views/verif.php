<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "projet";
$connect = mysqli_connect($hostname,$username,$password ,$databasename);
$query = "SELECT * FROM `reservation` WHERE `idt` = 17 AND `dateres` = '2022-05-03 00:00:00'";
$result = mysqli_query($connect,$query);
$num= mysqli_num_rows($result);
if($num>0)
{echo $num;}

/*function verif($idt,$dateres){
			
    $db = config::getConnexion();
    $sql="SELECT * from reservation WHERE ( idt = $idt and dateres = $dateres ) " ;
    $result = $db->query($sql);
    //$result->execute();
    $row=$result->fetchColumn();
        
        
        return $row;
    
    
    
}*/

/*$db = config::getConnexion(); 
			$sql="SELECT * FROM reservation where idt=$idt and dateres=$dateres";
			 
			try{
			 $result = $db->prepare($sql);
			 $result->execute();
			 $row = $result->rowCount();
			 return $row;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}*/