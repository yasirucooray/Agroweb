
<?php
//including the database connection file
include_once("config.php");
$results_per_page = 6;
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM news ");
$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM news LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($mysqli, $sql);
 // using mysqli_query instead
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
      <a class="navbar-brand" href="index.html"><img src="images/logo1.png"  width="280" height="100"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
	         
	        
			  <li class="nav-item"><a href="gues-blog.php" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="gues-news.php" class="nav-link">News</a></li>
			
			  <li class="nav-item"><a href="main-aboutus.php" class="nav-link">About Us</a></li>
			  <li class="nav-item"><a href="main-contact.php" class="nav-link">Contact</a></li>
	          
            
	        </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Sign Up</a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="login.php">User</a>
          <a class="dropdown-item" href="companylogin.php">Company Or Industry</a>
          <a class="dropdown-item" href="adminlogin.php">Administrator</a>
          
        </div>
      </li>
    </ul>
  </div>

	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/blog.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>News</span></p>
            <h1 class="mb-0 bread">News</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
      <div class="container">
		<div class="row justify-content-center mb-3 pb-3">
  			<div class="col-md-12 heading-section text-center ftco-animate">
	 			 <span class="subheading">Plantation industry</span>
				 <h2 class="mb-4">Latest news</h2>
	
 			 </div>
		</div>   		
	</div>
      
            <?php
        echo'<div style="color:Black;">';echo '<div class="row">';
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {         
      
    	
           
    		echo'<div class="col-md-6 col-lg-4 ftco-animate">';
    			echo'	<div class="product">';
                echo'	<div class="text py-3 pb-4 px-4 text-center">';
                echo'	<h3><a href="#">'; echo '<p><b>'; echo ""   .$res['title']."</b></p>";echo'</a></h3>';
                echo'</div> '; 
          $s=$res['image1'];
          echo '<img src="images/'.$s.'" class="img-fluid" style="width:405px;height:220px;">'; 
    				
    					
          echo '	<div class="overlay"></div>
    					</a>  ';
                    echo'	<div class="text">';
                    echo '<p>'; echo "Written By :- "   .$res['poster_name']."</p>";
                    echo "<p>"  .$res['timestamp']."</p><br>";
                    echo '<p>'; echo " <t>"   .substr($res['infor'],0,160)."</p>";
                    echo "<a href=\"\"onClick=\"return confirm('Sign up to read more details..')\">Read more....</a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"></a><br>";    echo "</h4></p>";    
                    echo'</div> ';    
                    
                    
                echo'</div>';
            echo'</div>';
        
       }  echo'</div>'; 
        echo '</div>';
        ?>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
        <ul><h4>More News</h4>
        <?php for ($page=1;$page<=$number_of_pages;$page++) {
        echo'<li class="active">';
          echo '<a class=""  href="gues-news.php?page=' . $page . '">' . $page . '</a> ';
          echo'</li>&nbsp';
        }
        ?>
        </ul>
        </div>
          </div>
        </div>
    </section>
  
    <footer class="ftco-footer ftco-section">
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
      
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Catagory</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="" class="py-2 d-block">Tea Industry</a></li>
	                <li><a href="" class="py-2 d-block">Rubber Industry</a></li>
	                <li><a href="" class="py-2 d-block">Cinnamon Industry</a></li>
	                <li><a href="" class="py-2 d-block">Help</a></li>
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