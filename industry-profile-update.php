<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: companylogin.php');
  }
  if (isset($_GET['logoutnew'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: companylogin.php");
  }
?>
<?php
$sesion=$_SESSION['name'];
?>
   <?php
$sesion12=$_SESSION['id'];
?>
			  <?php
 include_once("config.php");
 //selecting data associated with this particular id
 $result1 = mysqli_query($mysqli, "SELECT * FROM company_profile WHERE ind_name='$sesion'");
  
 while($res = mysqli_fetch_array($result1))
 {
     $name = $res['ind_name'];
     $type = $res['address'];
     $price = $res['telll'];
     $pri = $res['price_rate'];
     $pro = $res['quality'];
     $tell = $res['post_code'];
     $adress = $res['town'];
     $qun =$res['email'];
   
 }?>
 <?php

$sesion3=$_SESSION['type'];
?>
<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $pro = $_POST['quality'];
    $type = $_POST['product_type'];
    $price = $_POST['price'];
    $tell = $_POST['tell'];
    $adress = $_POST['adress'];
    $qun =$_POST['quantity'];
    $pri =$_POST['pri'];

    
    // checking empty fields
    if(empty($tell) || empty($qun)) {            
        if(empty($tell)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($qun)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
               
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE company_profile SET address='$adress',price_rate='$pri',post_code='$tell',telll='$price',town='$type',email='$qun'WHERE ind_name='$sesion'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: industry-profile-update.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>

		<style type="text/css">			
			body.ftco-section1{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

		</style>
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
			  <li class="nav-item"><a href="industry-about-us.php" class="nav-link">About_Us</a></li>
			  <li class="nav-item"><a href="industry-contact.php" class="nav-link">Contat</a></li>
	          
            
	        </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
           
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?php echo $sesion;?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="industry-profile.php">My account</a>
          <a class="dropdown-item" href="view-message.php">Messages</a>
          <a class="dropdown-item" href="industry.php?logout='1'">Log out</a>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">industry</a></span> <span>Details</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div><br><br>
    <section class="ftco-section "  style="background-image: url('images/profileadd.jpg'); background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; ">
    	<div class="container">
    		<div class="row">
    
    
<div class="col-lg-4 mb-8 ftco-animate">
   
    
    		</div>';
    	<div class="col-lg-12 product-details pl-md-2 ftco-animate">
              


 <div class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Update product</h4>
          <p class="card-category">You Can update your products details</p>
        </div>
        <div class="card-body">
          <form action="industry-profile-update.php" method="post">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating"> Company  Name</label>
                  <input type="text" name="product_name" Readonly class="form-control" value="<?php echo $name;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Town</label>
                  <input type="text" name="product_type" class="form-control"value="<?php echo $adress;?>">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Address</label>
                  <input type="text" name="adress" class="form-control"value="<?php echo $type;?>"> </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Price Rate</label>
                  <input type="text" name="pri" class="form-control"value="<?php echo $pri;?>"> </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating"> Postal Code</label>
                  <input type="text" name="tell" class="form-control"value="<?php echo $tell;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input type="text" name="quantity" class="form-control"value="<?php echo $qun;?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating"> Tell No</label>
                  <input type="text" name="price" class="form-control"value="<?php echo $price;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating"> Product Quality</label>
                  <input type="text" name="pro" class="form-control"value="<?php echo $pro;?>">
                </div>
              </div>
            </div>
           
            
                  
                
            <br><br>
            <input type="hidden" name="id">
            <input type="submit" name="update" class=" btn btn-primary py-3 px-4" value="Update">
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
</div>
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