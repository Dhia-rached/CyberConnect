<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';
    session_start();
    $error = "";
   
    // create adherent
    $reservation = null;
   // $idcs=htmlspecialchars($_POST['idcs']);
    $idts=htmlspecialchars($_POST['idts']);
    // create an instance of the controller
    $reservationC = new reservationC();
    if (
        isset($_POST["idc"]) &&
		isset($_POST["idt"]) &&		
        isset($_POST["dateres"]) 
    ) {
        if (
            !empty($_POST["idc"]) && 
			!empty($_POST['idt']) &&
            !empty($_POST["dateres"]) 
			
        ) {
            if($reservationC->verif($_POST['idt'],$_POST['dateres'])==0)
            {
            $reservation = new reservation(
                $_POST['idc'],
				$_POST['idt'],
                $_POST['dateres']
            );
            $reservationC->ajouterres($reservation);
            $idcs=$_POST['idc'];
            //exit();
            header('Location:mailer.php?idcs='.$_POST['idc']);
            }
            else{$error = "date deja reservee";}
        }
        else
            $error = "Missing information";
    }
    
    /*$hostname = "localhost";
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

    $query2 = "select id from `terrain`";
    $result2 = mysqli_query($connect,$query2);
    $option2 = "";
    while($row2 = mysqli_fetch_array($result2))
    {
        $option2 = $option2."<option>$row2[0]</option>";
    }*/
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherres.php">Retour à la liste des adherents</a></button>
        
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idc">idc:
                        </label>
                    </td>
                    <td><input type="text" name="idc" id="idc" maxlength="20" value="<?PHP echo $_SESSION['idcs'] ?> " name="idc"></td>
                </tr>
				<tr>
                    <td>
                        <label for="idt">idt:
                        </label>
                    </td>
                    <td><input type="text" name="idt" id="idt" maxlength="20" value="<?PHP echo $idts ?>" name="idt"></td>
                    <!--<td><select name="idt" id="idt"><?php echo $option2;?></select></td>-->
                </tr>
                <tr>
                    <td>
                        <label for="dateres">dateres:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="dateres" id="dateres" format="yyyy-MM-ddThh:mm:ss"  maxlength="20"></td>
                </tr>
                     
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>