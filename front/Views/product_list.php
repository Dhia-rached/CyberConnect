<?php
include "../entities/produits.php";
include "../core/ProduitsC.php" ;
include_once "../config.php" ;

session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{ 
if(isset($_POST['ajouterproduit1']) && (isset ($_POST['q1'])))
{ 
  $q1=$_POST['q1'];
  $id_display=$_GET["ida"];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit_ajout($id_display);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nomproduit"],$info["prix"],$info["qt"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>";
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}


if(isset($_POST['ajouterwishlist2']))
{ 
  $id_display=$_GET["wishlist"];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit_ajout($id_display);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panfnsdfkjsier\")</script>"; 
    }
    
  }
}


?>

?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>shop</title>
    <link rel="icon" href="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="img/logoo.png" height="100" width="300" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                                       
                                    </div>
                                </li>
                                <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        produc
                                    </a>
                                   
                                </li>
                                
                                <li class="nav-item dropdown">
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                       
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-i"> </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <a class="rmLink rmRootLink item" href="cart.php"></a>
</li>
<a href="cart.php">
<span class="rmText"><h5> (<span id="simpleCart_quantity" class="simpleCart_quantity">
                        <?php
                          $produit=new produitC;
                          $count=$produit->countpanier($_SESSION['id']);
                          foreach($count as $row)
                            {
                              echo $row["cnt"];
                            }
                          ?>
                    </span> items)<i class="flaticon-shopping-cart-black-shape"></i></h5></span>
</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
   
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
 <?php

 
    if (isset($_POST['search']))
{
    
    $produit1C=new produitC();
    $listeproduits=$produit1C->affichernomproduit($_POST['search']); 
}
?>
                            <input type="text" class="form-control bg-light border-10+ small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="search">
                            
                            <input type="submit" value="Rechercher">
	
                            </form>
                <div class="col-md-8">
                    <div class="product_list">
                        <?PHP
                    $produit1C=new produitC();
                    $p="creme" ;
                    $listeproduits=$produit1C->recupererproduitc($p);

                    foreach($listeproduits as $row)
                    {
                        
                                    $id=$row['id'];
                $chemin="image/".$id;
                ?>
               
               <div class="product-view" >
                  <div class="close-btn"></div>
                  <div class="product-big-image">
                  <img src="<?PHP echo $row['image'] ?>" width="100"> 
                       
                  </div>
                  <div class="product-big-desc">      
                    <h2><?PHP echo $row['nomproduit']; ?></h2>
                    <h5>Code du produit : <?PHP echo $row['id']; ?></h5>
                    <!--<h5>Description :<?PHP echo $row['description']; ?></h5>-->
                    

        <div class="price">
<h4 class="newprice"><?PHP echo $row['prix']; ?> DT</h4>
        </div>
        <form method="POST" action="?ida=<?PHP echo $row['id']; ?>">
        <h5  style="color:tomato">Quantité :<input placeholder="Qt." required type="number" name="q1" value="1" min="1" max="100"/></h5><br><br>
          <button name="ajouterproduit1"class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>Ajouter au panier</button>
        </form>

            </div>
        </div>        
    
 <?PHP
}
?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    <!-- product list part end-->
    
    <!-- client review part here -->
    <br>    
    <br>  
    <br>  
    <br>  
    <br>  
    <br>  
    <br>  
    <br>  
    <br>  
     <br>  
    
    <div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@Sports.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>
<?php

}

?>