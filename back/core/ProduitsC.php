<?PHP
class ProduitC{

	function getproduits($keywords){
		$sql="SELECT * FROM produits WHERE CONCAT(`id`,`nomproduit`, `description`, `prix`,`qt`,`image`,`categorie`,`idcat`) LIKE '%".$keywords."%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

	
    function triec(){ 
		$sql="SELECT * from produits order by categorie asc ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	} 
	function trieprix(){
		$sql="SELECT * from produits order by prix asc ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	} 
	 function trieid(){
		$sql="SELECT * from produits order by id asc ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	} 
	
function getproduit($id){
		$sql="SELECT * from produits where id=$id";
		$db = config::getConnexion();
		try{
		$compte=$db->query($sql);
		return $compte;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierProduit($Produits,$idn){
		$sql="UPDATE Produits SET id=:idn, nomproduit=:nomproduit,description=:description,prix=:prix,qt=:qt,categorie=:categorie,image=:image ,idcat:=idcat WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idn=$Produits->getid();
		
        $nomproduit=$Produits->getnomproduit();
        $description=$Produits->getdescription();
        $prix=$Produits->getprix();
		$qt=$Produits->getqt();
		$image=$Produits->getimage();
		$idcat=$Produits->getidcat();
		$categorie=$Produits->getcategorie();
		$datas = array(':idn'=>$idn, ':id'=>$id,':nomproduit'=>$nomproduit,':description'=>$description,':prix'=>$prix,':qt'=>$qt,':categorie'=>$categorie,':image'=>$image,':idcat'=>$idcat);
		$req->bindValue(':idn',$idn);
		$req->bindValue(':id',$id);
		
		$req->bindValue(':nomproduit',$nomproduit);
		$req->bindValue(':description',$description);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':qt',$qt);
		$req->bindValue(':categorie',$categorie);
		

		$req->bindValue(':image',$image);
		$req->bindValue(':idcat',$idcat);

		
           return $req;
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
		
	}
function afficherProduit ($Produits){
		echo "id: ".$Produits->getid()."<br>";
			
		echo "nomproduit: ".$Produits->getnomproduit()."<br>";
		echo "Description: ".$Produits->getdescription()."<br>";
		echo "Prix: ".$Produits->getprix()."<br>";
		echo "nb heures: ".$Produits->getprix()."<br>";
		echo "categorie: ".$Produits->getcategorie()."<br>";
		echo "image: ".$Produits->getimage()."<br>";
		echo "idcat: ".$Produits->getidcat()."<br>";
	

	}
	
	function ajouterProduit($Produits){
		$sql="insert into produits (id,idcat,nomproduit,description,prix,qt,categorie,image) values (:id,:idcat, :nomproduit,:description,:prix,:qt,:categorie,:image)";
		echo"test";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$Produits->getid();
       
        $nomproduits=$Produits->getnomproduit();
        $description=$Produits->getdescription();
        $nb=$Produits->getprix();
		$qt=$Produits->getqt();
		$categorie=$Produits->getcategorie();
		$image=$Produits->getimage();
		$idcat=$Produits->getidcat();

	
		$req->bindValue(':id',$id);
		$req->bindValue(':idcat',$idcat);
		$req->bindValue(':nomproduit',$nomproduit);
		$req->bindValue(':description',$description);
		$req->bindValue(':prix',$nb);
		$req->bindValue(':qt',$qt);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':image',$image);
	
		
  
	
	


            $req->execute();
	
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function afficherProduits(){
		//$sql="SElECT * From Produit e inner join formationphp.Produit a on e.id= a.id";
		$sql="SElECT * From Produits";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	function afficherProduitsC(){
		//$sql="SElECT * From Produit e inner join formationphp.Produit a on e.id= a.id";
		$sql="SElECT * From produits where categorie='Cuisine'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	



	function afficherProduits1(){
		//$sql="SElECT * From Produit e inner join formationphp.Produit a on e.id= a.id";
		$sql="SElECT * From Produits where nomproduit='1'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
function deleteEvenement($id){
		$sql="DELETE FROM produits where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           return 1 ;        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	

	
	function recupererProduit($id){
		$sql="SELECT * from produits where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeProduits($tarif){
		$sql="SELECT * from Produits where qtoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	
}






























//////aicha ////////////////
function ajouteraupanier($produits,$idClient)
	{
		$sql="insert into panier (id,idClient,prix,quantite,nom) values (:id,:idClient,:prix,:quantite,:nom)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produits->get_id();
        $prix=$produits->get_prix();
        $quantite=$produits->get_quantite();
        $nom=$produits->get_nom();

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Le produit est déja dans votre panier.\")</script>"; 
        }

	}

function recupererproduitc($prod)
	{
   		$sql="SELECT * from produits where categorie='$prod'";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererproduit()
	{
   		$sql="SELECT * from produits ";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
   
   
   function recupererproduit_ajout($id)
	{
   		$sql="SELECT * from produits where id=$id";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererpanier($idClient)
	{
   		$sql="SELECT * from panier where idClient=$idClient";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererwishlist()
	{
		$sql="SELECT * from wishlist";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererproduitwishlist($id)
	{
		$sql="SELECT * from wishlist where id=$id";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function somme()
	{
		$db=config::getConnexion();
		$q=$db->prepare("select quantite from panier");
		$q->execute();
		return $q;
	}

	function afficherproduit ($produits)
	{
		echo "id : ".$produits->get_id()."<br>";
		echo "Nom : ".$produits->get_nom()."<br>";
		echo "Prix : ".$produits->get_prix()."<br>";
		echo "Quantite : ".$produits->get_quantite()."<br>";
		echo "Catégorie : ".$produits->get_categorie()."<br>";
	}

	function afficherproduits()
	{
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerproduit($id,$idClient)
	{
		include "../config.php" ;
		$sql="DELETE FROM panier where id= :id AND idClient= :idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierquantite($id,$quantite,$idClient)
	{
		
		$sql="UPDATE panier SET quantite=:quantite where id=:id AND idClient= :idClient";
		$db = config::getConnexion();
        
        try
        {
        	$req=$db->prepare($sql);
        	$req->bindValue(':id',$id);
        	$req->bindValue(':quantite',$quantite);
        	$req->bindValue(':idClient',$idClient);
        	$s=$req->execute();

        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}


	function verifierexitenceprod($idClient,$id)
	{
		$sql="select count(*) as cnt from panier where idClient=:idClient and id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
	function verifierexitenceprod1($idClient,$id)
	{
		$sql="select count(*) as cnt from wishlist where idClient=:idClient and id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}


	function countpanier($idClient)
	{
		$sql="select count(*) as cnt from panier where idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}


	function ajouterwishlist($produits,$idClient)
	{
		$sql="insert into wishlist (id,idClient,nom,prix,quantite) values (:id,:idClient,:nom,:prix,:quantite)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produits->get_id();
        $nom=$produits->get_nom();
        $prix=$produits->get_prix();
        $quantite=$produits->get_quantite();
        

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':nom',$nom);
		
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Le produit est déja dans votre favorit.\")</script>"; 
        }

	}

	function afficherwishlist()
	{
		$sql="SElECT * From wishlist";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerwishlist($id,$idClient)
	{
		$sql="DELETE FROM wishlist where id= :id and idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function ajoutercontenupanier($produits,$idCommande,$idClient)
	{
		$sql="insert into lignecommande (idCommande,id,idClient,prix,quantite,nom) values (:idCommande,:id,:idClient,:prix,:quantite,:nom)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produits->get_id();
        $prix=$produits->get_prix();
        $quantite=$produits->get_quantite();
        $nom=$produits->get_nom();

        $req=$db->prepare($sql);
     
     	$req->bindValue(':idCommande',$idCommande);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Error\")</script>"; 
        }

	}
	function modifierquantiteaprescommande($id,$quantite)
	{
		$sql="UPDATE produits SET quantite=quantite-:quantite where id=:id";
		$db = config::getConnexion();
        
        try
        {
        	$req=$db->prepare($sql);
        	$req->bindValue(':id',$id);
        	$req->bindValue(':quantite',$quantite);
        	$s=$req->execute();

        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}
	function destroycart($idClient)
	{
		$sql="DELETE FROM panier where idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


?>