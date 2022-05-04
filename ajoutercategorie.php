<?php
    include_once '../model/categorie.php';
    include_once '../controller/categorieC.php';

    $error = "";

    $categorie = null;

    // create an instance of the controller
    
    if (
        isset($_POST['id_categorie']) &&
        isset($_POST['nomCategorie'])&&
		isset($_POST['nbrEvent']) &&		
        isset($_POST['dscrpt'])
        ){
    if (
            !empty($_POST['id_categorie']) && 
            !empty($_POST['nomCategorie'])&&
			!empty($_POST['nbrEvent']) &&
            !empty($_POST['dscrpt'])
       ){
            $categoriec = new categorieC();
            $categorie = new categorie(
                $_POST['id_categorie'],
                $_POST['nomCategorie'],
				$_POST['nbrEvent'],
                $_POST['dscrpt']
            );
            $categoriec->ajoutercategorie($categorie);
            header('Location:Affichercategorie.php');
        }
        else
            $error = "Missing information";
    }
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="wid_categorieth=device-wid_categorieth, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
        <title>categorie</title>
    </head>
        <body>
            <button><a href="affichercategorie.php">Retour à la liste des categories</a></button>
            <hr>
            
            <div id_categorie="error">
                <?php echo $error; ?>
            </div>
            
            <form action="" method="POST">
                <table border="1" align="center">
                    <tr>
                        <td>
                            <label for="id_categorie">id_categorie:
                            </label>
                        </td>
                        <td><input type="number" name="id_categorie" id_categorie="id_categorie" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nomcategorie">Nom de la catégorie:
                            </label>
                        </td>
                        <td><input type="text" name="nomCategorie" id_categorie="nomcategorie" maxlength="60"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nbrEvent">Nombre de evenement:
                            </label>
                        </td>
                        <td>
                            <input type="number" name="nbrEvent" id_categorie="nbrEvent" maxlength="20" min=0>
                        </td>
                    </tr>                    
                    <tr>   
                        <td>
                            <label for="dscrpt">Description:
                            </label>
                        </td>
                        <td><input type="text" name="dscrpt" id_categorie="dscrpt" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Ajouter">

                        </td>
                        <td>
                            <input type="reset" value="Annuler" >
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
