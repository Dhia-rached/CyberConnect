<?php
include "../entities/produits.php";
include "../core/ProduitsC.php" ;

include_once "../core/commandeC.php";

session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
  $produit=new produitC;
  $count=$produit->countpanier($_SESSION['id'])

?> 

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link rel="icon" href="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- icon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
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
                        <a class="site-logo" href="index.php"> <img src="img/logoo.png" height="100" width="300" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

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
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>cart list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            
            <tbody>
                    <?php
                    $c=intval($row["cnt"]);
                    if($c==0)
                     {
                ?>
                
                <?php
                  }
                                    if($c!=0)
                                             {
                                    $produit=new produitC();
                                                        $p="cuisine" ;

                                    $listeproduits=$produit->afficherproduits();
                                    
                                    foreach($listeproduits as $row){
                                    $id=$row['id'];
                $chemin="image/".$id;
                ?>
             <div class="cart-header">
                
                <form method="POST" action="supprimerproduit.php">
                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
                    

                    <button class="close1" name="supprimer" style="color:rgb(255, 133, 71)"></button>
                </form>
                 <div class="cart-sec simpleCart_shelfItem">
                 <div class="product-big-image">
                  <img src="<?PHP echo $row['image'] ?>" width="100"> 
                       
                  </div>
                       <div class="cart-item-info">
                        <ul class="qty">
                            <li><p><b>Quantité : </b>
                            <?PHP echo $row['quantite']; 

                            ?></p></li>
                            <li>
                                                             <form method="POST" action="modifierproduit.php">
                                <div class="flex-w bo5 of-hidden w-size17">

                                    <input class="size8 m-text18 t-center num-product" type="number" name="quantite" value="<?PHP echo $row['quantite']; ?>">
                                     <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                </div>
                                <button name="Modifier" class="bg8 t-center eff2"  style="color:rgb(255, 133, 71)">modifier</button><br>
                                 </form>
                            </li>
                        </ul>

                             
                       </div>
                       <div class="clearfix"></div>

                  </div>
             </div>
             <?PHP
                }}?>
                  </div>
                </td>
              </tr>
          
              
            </tbody>
          </table>
          <a class="continue" style="background:rgb(255, 133, 71);
  padding:10px 60px;
  
  font-size:1em;
  color:#fff;
  text-decoration:none;
  display: block;
   font-weight: 600;  
   text-align: center;
   margin-bottom:2em;" href="checkout_final.php">Checkout</a>
            
            
           
            
        
      </div>
  </section>
  <!--================End Cart Area =================-->
    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner section_bg">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                <a href="index.html"><img src="img/logoo.png" height="100" width="300" alt="#"></a>
                            </div>
                            <div class="footer_menu_item">
                                <a href="index.html">Home</a>
                                <a href="about.html">About</a>
                                <a href="product_list.html">Products</a>
                                <a href="#">Pages</a>
                                <a href="blog.html">Blog</a>
                                <a href="contact.html">Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                            <div class="copyright_link">
                                <a href="#">Turms & Conditions</a>
                                <a href="#">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
<?php 
}
?>