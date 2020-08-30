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
$sesion=$_SESSION['name'];
?>
<?php
$sesion1=$_SESSION['id'];
?>
<?php
include_once("config.php");
 
//getting id from url

 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM company_profile WHERE ind_name='{$_SESSION['name']}'");
if ($result) { // if user exists
  if ($result->num_rows==0) {
    array_push($errors, "Username already exists");
    echo"<script>alert('Please complete you profile details!!');
    window.location.href='industry.php';</script>";
  }
 }
while($res = mysqli_fetch_array($result))
{
    $name = $res['ind_name'];
    $age = $res['product_type'];
    $dis= $res['discription'];
    $email= $res['email'];
    $address= $res['address'];
    $tell= $res['telll'];
    $pri= $res['price_rate'];
    $con= $res['quality'];
    $pos= $res['post_code'];
    $to= $res['town'];
    $s=$res['image'];
  
}
?>
<?php

$sesion3=$_SESSION['type'];
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
    <link rel="stylesheet" href="styless1.css">
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

<div class="container emp-profile">
            <form method="post"><form id="2" action="profile.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">  
                      <?php  
                        echo '<img src="images/'.$s.'" class="img-fluid" >'; ?>
                          
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                                
                            </div>
                            <div></div>
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $name;?>
                                    </h5>
                                    <h6>
                                    <?php echo $age;?> Industry
                                    </h6>
                                   
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Collection Points</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                       
                      <br>
                        
                        <button class="profile-edit-btn" name ="update">Update Profile Image </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Website Activities</p>
                            <a href="index.php">Home page</a><br/>
                            <a href="blog.php">Blog </a><br/>
                            <a href="">News</a>
                            <p>Options</p>
                            <a href="">Online Chat</a><br/>
                            <a href="shop.php">Shop</a><br/>
                            <a href="">Map</a><br/>
                            <a href="">Q&A</a><br/>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                            <div class="col-md-6">
                                                <label>User Nmae</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Postal Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $address;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $tell;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Postal Code</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pos;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Town</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $to;?></p>
                                            </div>
                                        </div>
                            </div><div class="tab-pane fade" id="dis" role="tabpanel" aria-labelledby="dis-tab">
                            
                             </div></form>  </form>
                            <!-- update profile-->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form  method="post" action="collection_points.php" class="p-5 bg-light" id="1">
                            <div class="form-group">
                    
                            <input type="hidden" class="form-control" id="username" name="id" value="<?php echo $sesion1;?>">
                            <input type="hidden" class="form-control" id="username" name="user" value="<?php echo $sesion;?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Town</label>
                            <input type="text" class="form-control" id="name" value="" name="name" require>
                            </div>
                            <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" id="name" value="" name="address" require>
                            </div>

                            <div class="form-group">
                            <label for="name">Phone No</label>
                            <input type="text" class="form-control" id="name" value="" name="tell" require>
                            </div>
                            <div class="form-group">
                            <label for="name">Open Houres</label>
                            <input type="text" class="form-control" id="name" value="" name="open" require>
                            </div>

                            <div class="form-group">
                            <input type="submit" name="submit1" value="Add Collection Points" class="btn py-2 px-2 btn-primary">
                            </div>

                            </form>
                            </div>
                            <!-- end of update -->
                            

                        </div>
                    </div>
                </div>
            </div>
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