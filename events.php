<?php
	    include '../controller/categorieC.php';
        include '../controller/evenementC.php';
	$evenementC=new EvenementC();
	$listeevenement=$evenementC->afficherevent(); 

	$categoriec=new categorieC();
	$listecategorie=$categoriec->affichercategorie(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Events Template, Created by Imran Hossain from https://imransdesign.com/">
    <meta property="og:url"           content="http://localhost/projet_web/view/events.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
	<!-- title -->
	<title>Events</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
    












<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="index.html">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Static Home</a></li>
                                    <li><a href="index_2.html">Slider Home</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 page</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="Events.html">Events</a></li>
                                </ul>
                            </li>
                            <li><a href="news.html">News</a>
                                <ul class="sub-menu">
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="single-news.html">Single News</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="Events.html">Events</a>
                                <ul class="sub-menu">
                                    <li><a href="Events.html">Events</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="Eventsping-cart" href="cart.html"><i class="fas fa-Eventsping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                    
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-play-circle"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                  
                    <audio controls autoplay >
  <source src="song.ogg" type="audio/ogg">
  <source src="song.mp3" type="audio/mpeg">

</audio>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search arewa -->


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Enjoy</p>
                    <h1>Events</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->






<?php
/*récuperation de l'url courante*/
$urltosocial = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

function reseauSociaux($url=null){


$twitter="
iVBORw0KGgoAAAANSUhEUgAAAD0AAAAXCAYAAAC4VUe5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdp
bj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6
eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEz
NDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJo
dHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlw
dGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEu
MC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVz
b3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1N
Ok9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2NDJGMzhCRTIzMjA2ODExQUQyNkQxRjlGQjI3
MUJFMCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowOEY4NDIwQkNDQ0ExMURGOTQ4QUM3MUMz
QkEwMjkyRSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowOEY4NDIwQUNDQ0ExMURGOTQ4QUM3
MUMzQkEwMjkyRSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IE1hY2ludG9z
aCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkQyNDRBQTYy
MjUyMDY4MTFBRDI2RDFGOUZCMjcxQkUwIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjY0MkYz
OEJFMjMyMDY4MTFBRDI2RDFGOUZCMjcxQkUwIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpS
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
YII=
";




/*encodeur images*/
/*http://www.motobit.com/util/base64-decoder-encoder.asp */


$output=null;

/*passons aux exemples*/

/******************************************************************************/


/*
Ajouter le bouton Twitter compteur
*/
$output.='<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="InfoWebMaster">Tweet</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';


/******************************************************************************/


return $output;

}
?>
 
 <?php echo reseauSociaux($urltosocial);?>










<html>
<head>
<title>Your Website Title</title>
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
</head>
<body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button" 
data-href="https://www.facebook.com/events/506274977948725" 
data-layout="button_count">
</div>

</body>
</html>







<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    
                <ul>
               
                    <li class="active" data-filter="*">All</li>
                    <?php
				foreach($listecategorie as $catal){
			?>
           
			<tr>
           
                       
                        <li  data-filter= <?php echo $catal['id_categorie']; ?>  >  <td><?php echo $catal['id_categorie']; ?></li>
                        
                        	
			</tr>
           
			<?php
				}
			?>
                    </ul>
                </div>
            </div>
        </div>






        <div class="row product-lists">
            <?php
				foreach($listeevenement as $evenement){
			?>
           
           
<div class="col-lg-4 col-md-6 text-center 5">
                <div class="single-product-item">
                    <div class="product-image">
                    <tr>
                    <td>
                    
                        <a href="single-product.php"><?php $img=$evenement['img'];
                        echo "<img src='$img'>"; ?>
                        <style> img{width:190px;height:190px;}</style></a>
                </td>
                        </tr>
                    </div>
                    <h3><td><?php echo $evenement['nom']; ?></td></h3>
                    <p class="product-price"><span>prix</span> <td><?php echo $evenement['prix']; ?> DT</td></p>
                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v13.0&appId=832550507084769&autoLogAppEvents=1" nonce="nXmc2b69"></script>

<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" data-size="large" data-share="false"></div>                 
               
 </div>
            </div>
            <?php
				}
			?>

        
			

			
			
				
			
			
			
	














            
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->

<!-- footer -->

    <link rel="stylesheet" href="./style.css" />
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
  
  

  <body>
    <div class="wrapper">
      <div class="contact">
        <h4>Nous contacter</h4>
        <div class="contact-items">
          <div class="contact-item">
            <a href="tel:26758795">
              <ion-icon name="call"></ion-icon>
              26758795
            </a>
          </div>
          <div class="contact-item">
            <a href="mailto:webphp344@gmail.com">
              <ion-icon name="mail"></ion-icon>
              webphp344@gmail.com
            </a>
          </div>
          <div class="contact-item">
            <a href="https://www.facebook.com/events/506274977948725">
              <ion-icon name="globe"></ion-icon>
              sport.com
            </a>
          </div>
        </div>
      </div>
      <div id="map"></div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
    <script src="./app.js"></script>
  </body>


<!-- end footer -->



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



<div id="google_translate_element"></div> 
      
    <script type="text/javascript"> 
    function googleTranslateElementInit() { 
      new google.translate.TranslateElement({pageLanguage: 'en'},
 'google_translate_element'); 
    } 
    </script> 
      
    <script type="text/javascript"
 src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementIni
t"></script> 

</body>
</html>
