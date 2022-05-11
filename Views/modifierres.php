<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create adherent
    $reservation = null;

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
            $reservation = new reservation(
                $_POST['idc'],
				$_POST['idt'],
                $_POST['dateres']
            );
            $reservationC->modifierres($reservation, $_POST["idc"], $_POST["idt"]);
            header('Location:listesup.php?idcs='.$_POST["idc"]);
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <!--<button><a href="listeterrain.php?idcs=<?php echo $_POST["idc"]?>">Retour à la liste des adherents</a></button>-->
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idc'])){
				$reservation = $reservationC->recupererres($_POST['idc']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idc">idc:
                        </label>
                    </td>
                    <td><input type="text" name="idc" id="idc" value="<?php echo $reservation['idc']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="idt">idt:
                        </label>
                    </td>
                    <td><input type="idt" name="idt" id="idt" value="<?php echo $reservation['idt']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateres">dateres:
                        </label>
                    </td>
                    <td><input type="datetime-local" name="dateres" id="dateres" format="yyyy-MM-ddThh:mm" value="<?php echo $reservation['dateres']; ?>"></td>
                </tr>
                              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
            </form>
		<?php
		}
		?>
    </body>
</html>