<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/first.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/inscription.css">
    <link rel="stylesheet" href="assets/css/scss/style.scss">
    </head>
    <body>
        <div class="animation-container">
            <div class="lightning-container">
              <div class="lightning white"></div>
              <div class="lightning red"></div>
            </div>
            <div class="boom-container">
              <div class="shape circle big white"></div>
              <div class="shape circle white"></div>
              <div class="shape triangle big yellow"></div>
              <div class="shape disc white"></div>
              <div class="shape triangle blue"></div>
            </div>
            <div class="boom-container second">
              <div class="shape circle big white"></div>
              <div class="shape circle white"></div>
              <div class="shape disc white"></div>
              <div class="shape triangle blue"></div>
            </div>
          </div>
        <video id="videoBG" poster="poster.JPG" autoplay muted loop>
            <source src="assets/videos/sport1.mp4" type="video/mp4">
        </video>
 
        <div class="main">  
            	
            <input type="checkbox" id="chk" aria-hidden="true">
    
                <div class="signup">
                    <form>
                        <label for="chk" aria-hidden="true">Sign up</label>
                        <input type="text" name="txt" placeholder="User name" required="">
                        <input type="email" name="email" placeholder="Email" required="">
                        <input type="password" name="pswd" placeholder="Password" required="">
                        <button>Sign up</button>
                    </form>
                </div>
    
                <div class="login">
                    <form  method="post" action="reservation.php">
                        <label for="chk" aria-hidden="true">Login</label>
                        <input type="text" name="idcs" placeholder="Email" required="">
                        <!--<button ><a href="animation_intro.html">Login</a></button>-->
                        <button><input type="submit" name="valider" value="login"></button>
                    </form>
                </div>
        </div>
       
    </body>
</html>