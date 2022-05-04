<?php
    include '../model/evenement.php';
    include '../controller/evenementC.php';

    $error = "";

    // create adherent
    $evenement = null;

    // create an instance of the controller
    $evenementC = new EvenementC();
    if (
        isset($_POST["reference"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["sujet"]) &&
		isset($_POST["emplacement"]) && 
        isset($_POST["date"])&&
        isset($_POST["prix"]) &&
        isset($_POST["id_categorie"]) 
    ) {
    if (
            !empty($_POST["reference"]) && 
			!empty($_POST["nom"]) &&
            !empty($_POST["sujet"]) && 
			!empty($_POST["emplacement"]) && 
            !empty($_POST["date"]) &&
            !empty($_POST["prix"]) &&
            !empty($_POST["id_categorie"]) 
    ) {
            //$prix = $this->uploadprix();
            $evenement = new Evenement(
                $_POST['reference'],
				$_POST['nom'],
                $_POST['sujet'], 
				$_POST['emplacement'],
                $_POST['date'],
                $_POST['prix'],
                $_POST['id_categorie']
            );
            $evenementC->ajoutevent($evenement);
            header('Location:afficherevent.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css
">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css
">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>evenement</title>
</head>
    <body>
        <button><a href="afficherevent.php">Retour à la liste des evenement</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="reference">Référence:
                        </label>
                    </td>
                    <td><input type="number" name="reference" id="reference" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom de l evenement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom" maxlength="20" ></td>
                </tr>
                <tr>   
                    <td>
                        <label for="sujet">sujet:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" id="sujet" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="emplacement">emplacement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="emplacement" id="emplacement" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="date" id="date">
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label for="prix"> prix: 
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix" min=0>
                    </td>
                </tr>
                
                <tr>
                <tr>
                    <td>
                        <label for="id_categorie">id_categorie:
                        </label>
                    </td>
                    <td><input type="number" name="id_categorie" id="id_categorie" ></td>
                </tr>
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