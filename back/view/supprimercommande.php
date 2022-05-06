<?PHP
include "../Core/produitC.php";
include "../Core/commandeC.php";
include "../Entities/commande.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
$commandeC=new commandeC();
if (isset($_POST["idCommande"]))
{
	$commande=$commandeC->recuperercommande($_POST["idCommande"]);
	$info=$commande->fetch();
	$commande=new commande($info["idCommande"],$info["dateCommande"],$info["montantCommande"],$info["etatCommande"],$info["lieuLivraison"],$info["prixLivraison"],$info["idClient"]);


	$annuler="Annulée";
	$commande->set_etatCommande($annuler);
	$dateactuelle = date("Y-m-d");
	$commande->set_dateCommande($dateactuelle);

	$commandeC->ajouterhistorique($commande);
	$commandeC->supprimercommande($_POST["idCommande"]);
	$commandeC->supprimercontenucommande($_POST["idCommande"]);
	header('Location: Gcommande.php');
}
/**if ($annuler="Annulée")
{

include "../Nexmo/src/NexmoMessage.php" ;


	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	//$nexmo_sms = new NexmoMessage('71d873cc','oumaymahawkacbon');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	//$info = $nexmo_sms->sendText( '21650805930', 'G-store', 'Votre commande a été Annulée ' ); /*

	// Step 3: Display an overview of the message
	

	// Done!  
}
//}

?>