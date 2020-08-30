<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: companylogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: companylogin.php");
  }
?>
<?php

$sesion3=$_SESSION['type'];
?>
<?php
$sesion=$_SESSION['name'];
?>
<?php include('member_rej.php') ?>
<?php
//including the database connection file
include_once("config.php");

// determine the sql LIMIT starting number for the results on the displaying page

$sql="SELECT * FROM user JOIN membership ON user.user_id = membership.user_id WHERE status=1 AND industry_name='{$_SESSION['name']}'";
$result = mysqli_query($mysqli, $sql);


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
      <a class="navbar-brand" href="index.html"><img src="images/new2.png"  width="280" height="100"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="industry.php" class="nav-link">Home</a></li>
	          
	          <li class="nav-item"><a href="news-industry.php" class="nav-link">News</a></li>
            <?php 
        if($sesion3 !== "Shop") { 
          echo'<li class="nav-item dropdown">';
          echo'<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Members</a>';
          echo' <div class="dropdown-menu" aria-labelledby="dropdown05">';
          echo' 	<a class="dropdown-item" href="membership-approve.php">Request</a>';
          echo' 	<a class="dropdown-item" href="join-members.php">Customers</a>';
                
   
          echo'</div>';
          echo' </li>';
      }?>
        <?php 
        if($sesion3 == "Shop") { 
        echo'<li class="nav-item dropdown">';
			  echo'<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>';
        echo'     <div class="dropdown-menu" aria-labelledby="dropdown05">';
        echo'      	<a class="dropdown-item" href="add-product.php">Shop</a>';
        echo'      	<a class="dropdown-item" href="user-product.php">User Added Product</a>';
        echo'      	<a class="dropdown-item" href="user-sell-product.php">Selles Products</a>';      
   
        echo'    </div>
        </li>';
        }?>
        <li class="nav-item"><a href="industry-map.php" class="nav-link">Map</a></li>  
			  <li class="nav-item"><a href="contact.html" class="nav-link">About_Us</a></li>
			  <li class="nav-item"><a href="contact.html" class="nav-link">Contat</a></li>
	          
            
	        </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
           
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?php echo $sesion;?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="industry-profile.php">My account</a>
          
          <a class="dropdown-item" href="industry.php?logout='1'">Log out</a>
        </div>
      </li>
    </ul>
     <ul class="navbar-nav ml-auto ">
      <li class="nav-item">
        <a class="nav-item" href="#">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" height="40">
        </a>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">industry</a></span> <span>Details</span></p>
            <h1 class="mb-0 bread">Company Members</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Product List</th>
						        <th>Member Name</th>
						        <th>Email</th>
                    <th>Address</th>
                    <th>Tell no</th>        
                    <th>type</th>            <
                    <th>Details</th>
                    <th>Remove</th>
						      </tr>
						    </thead>
						  <tbody>
 <?php
echo'<div style="color:Black;">';
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
while($res = mysqli_fetch_array($result)) { 
    echo '<tr class="text-center">';
    $s=$res['image'];
    echo '    <td class="image-prod"><img src="images/'.$s.'" class="block-20" style="width:150px;height:100px;"></td>';				        
    echo '     <td class="product-name">';
    echo '      	<h3>'; echo ""  .$res['member_name']."<br></h3>"; echo '</h3>';
    echo ' </td>';
    echo '<td class="price">'; echo ""  .$res['email']."<br></h3>"; echo ' </td>';
    echo '<td class="price">'; echo ""  .$res['address']."<br></h3>"; echo ' </td>';
    echo '<td class="price">'; echo ""  .$res['tell']."<br></h3>"; echo ' </td>';
    echo '<td class="price">'; echo ""  .$res['type']."<br></h3>"; echo ' </td>';					        
    echo '  <td class="total">'; echo "<a href=\"industry-profile-view.php?id=$res[member_id]\">View More detalis</a><br>";    echo "</h4></p>"; 
    echo '  <td class="total">'; echo "<a href=\"reject-member.php?id=$res[member_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Remove membership</a>
    </div><br>";    echo "</h4></p>"; 
    echo ' </tr>'; }
?>
            </tbody>
						  </table>
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