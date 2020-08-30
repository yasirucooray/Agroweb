<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM blog ORDER BY id dESC limit 3");
$result1 = mysqli_query($mysqli, "SELECT * FROM news ORDER BY id dESC limit 1");
$result2 = mysqli_query($mysqli, "SELECT * FROM company_profile ORDER BY id dESC limit 4");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>AgroWeb</title>  
        <link rel="shortcut icon" type="images/png" href="images/local3.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		
		
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="images/new2.png"  width="260" height="100"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="Tea-industry.php">TEA</a>
              	<a class="dropdown-item" href="rubber-industry.php">RUBBER</a>
                <a class="dropdown-item" href="cinnamon-industry.php">CINNOMEN</a>
   			</div>
            </li>
	          <li class="nav-item"><a href="user-map.php" class="nav-link">Map</a></li>
			  <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
			  <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fcilities</a>
              <div class="dropdown-menu" aria-labelledby="dropdown05">
              	<a class="dropdown-item" href="news.php">News</a>
              	<a class="dropdown-item" href="new-techno.php">New Technology</a>
                <a class="dropdown-item" href="solution.php">Solutions</a>
   
              </div>
			  </li>
			  <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
              
			  <li class="nav-item"><a href="user-aboutus.php" class="nav-link">About-Us</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          
            
	        </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Profile </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="profile.php">My account</a>
          <a class="dropdown-item" href="monthly-sells.php">Monthly Selles</a>
          <a class="dropdown-item" href="asign-industry-profile.php">Asign company</a>
          <a class="dropdown-item" href="index1.php">Chat Box</a>
          <a class="dropdown-item" href="index.php?logout='1'">Log out</a>
        </div>
      </li>
    </ul>
  </div>

	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/tea1.jpeg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Tea Plantations</h1>
	              <h2 class="subheading mb-4">All things related to tea plantation &amp; fruits</h2>
	              <p><a href="Tea-industry.php" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/rubber.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">Rubber Plantation</h1>
	              <h2 class="subheading mb-4">All services related to rubber industry</h2>
	              <p><a href="rubber-industry.php" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
		  </div>
		  
		  <div class="slider-item" style="background-image: url(images/cinnamon.jpg);">
			<div class="overlay"></div>
		  <div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

			  <div class="col-sm-12 ftco-animate text-center">
				<h1 class="mb-2">Cinnamon Plantation</h1>
				<h2 class="subheading mb-4">All services related to cinnamon industry</h2>
				<p><a href="cinnamon-industry.php" class="btn btn-primary">View Details</a></p>
			  </div>

			</div>
		  </div>
		</div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class=""><img src="images/tracking.png" width="60" height="70" position="center"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Industry details</h3>
                <span>All details of industrys</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span><img src="images/map.png" width="55" height="65" position="center"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Location</h3>
                <span>All industry locations</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span ><img src="images/conversation.png" width="55" height="60" position="center"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Online Chat</h3>
                <span>Chat with Each User</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span ><img src="images/supermarket.png" width="60" height="60" position="center"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Shop</h3>
                <span>Agriculture products online purchus</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>Fertilizer and equipments</h2>
										<p>	Buy product easily </p>
										<p><a href="shop.php" class="btn btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/eq1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Machines</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/eq2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">spray machines</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/im.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">liquid fertilizer</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/f2.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">fertilizer</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Plantation industry</span>
            <h2 class="mb-4">industry details</h2>
            <p>Rejistered plantation  industry details. signup in this system to get more benifits.</p>
            <p><a href="Tea-industry.php" class="btn btn-primary">View All</a></p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
			<?php

while($res = mysqli_fetch_array($result2)) {  
    

    		echo'	<div class="col-md-6 col-lg-3 ftco-animate">';
    		echo'		<div class="product">';
			$s=$res['image'];
			echo '<img src="images/'.$s.'" class="img-fluid" style="width:405px;height:220px;">'; 
    		echo'				<div class="overlay"></div>';
    		echo'			</a>';
    		echo'			<div class="text py-3 pb-4 px-3 text-center">';
    		echo'				<h3><a href="#">';echo""  .$res['ind_name'].""; echo'</a></h3>';
    		echo'				<p><a href="#">';echo""  .$res['town'].""; echo'</p></h>';
    		echo'			</div>';
    		echo'		</div>';
    			echo'</div>';
}?>
    			</div>
    	</div>
    </section>
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
  			<div class="col-md-12 heading-section text-center ftco-animate">
	 			 <span class="subheading">Plantation industry</span>
				 <h2 class="mb-4">Latest news</h2>
	
 			 </div>
		</div>   		
	</div>
		<div class="col-md-12 d-flex ftco-animate">
        <?php

                    

//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
   
while($res = mysqli_fetch_array($result1)) {  
    
$s=$res['image1'];

    echo' <div class="blog-entry align-self-stretch d-md-flex">';
    echo'   <a href="blog-single.html" class="block-20" style="background-image: url(images/'.$s.');">';
    echo'   </a>';
                      echo' <div class="text d-block pl-md-4">';
                      echo' 	<div class="meta mb-3">';
                      echo'  <h3 class="heading"><a href="#">';echo""  .$res['title'].""; echo'</a></h3>';
                      echo'  <div><a href="#">';echo""  .$res['timestamp'].""; echo'</a></div>';
                      echo' <div><a href="#">';echo""  .$res['poster_name'].""; echo'</a></div>';
                      echo'    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>';
                      echo'  </div>';
                      echo'  <p>';echo"" .substr($res['infor'],0,400).""; echo'</p>';
                      echo'  <p><a href="news.php" class="btn btn-primary py-2 px-3">Read more</a></p>';
                      echo' </div>';
                      echo'   </div>';}
                    ?>
		          </div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Planters blog post</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia Sand Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        	 <div class="col-md-1O"><div class="carousel-testimony owl-carousel">
        <?php

                    

//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
   
while($res = mysqli_fetch_array($result)) {   

$s=$res['image'];
    
     echo'   <div class="testimony-wrap p-4 pb-5">';
     echo'     <div class="user-img mb-5" style="background-image: url(images/'.$s.')">';
     echo'       <span class="quote d-flex align-items-center justify-content-center">';
     echo'         <i class="icon-quote-left"></i>';
     echo'       </span>';
     echo'      </div>';
     echo'     <div class="text text-center">';echo'   <div><a href="#">';echo ""  .$res['timestamp']."";echo'</a></div>';
     echo '<p>'; echo " <t>"   .substr($res['post'],0,100)."</br></p>";
     echo "<t>"  .$res['name']."<br></h3>"; 
     
     echo'  <span class="position"><div><a href="#">';echo "<b>"  .$res['username']."";echo'</b></a></div></span>';
     echo'      </div>';
     echo'    </div>';
    }

        ?></div></div></div>
    
    </section>

    <footer class="ftco-footer ftco-section bg-light">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">AgroWeb</h2>
              <p>provide easy commiunication system with planters and industry. both sector can register in this system</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="www.twitter.com"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="www.facebook.com"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="www.instagram.com"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="index1.php" class="py-2 d-block">Online Chat</a></li>
                <li><a href="Blog.php" class="py-2 d-block">Blog</a></li>
                <li><a href="news.php" class="py-2 d-block">News</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Catagory</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="Tea-industry.php" class="py-2 d-block">Tea Industry</a></li>
	                <li><a href="rubber-industry.php" class="py-2 d-block">Rubber Industry</a></li>
	                <li><a href="cinnamon-industry.php" class="py-2 d-block">Cinnamon Industry</a></li>
	                <li><a href="solution.php" class="py-2 d-block">Help</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">New Technology</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">No 11 Polduwa Road, Battaramulla</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+94 077 924 8860</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">yasiphp@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
         
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>