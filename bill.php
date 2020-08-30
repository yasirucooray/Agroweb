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
// including the database connection file
include_once("config.php");
include_once 'config2.php'; 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
 
    // checking empty fields
    if(empty($name) || empty($age) ) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
               
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE shop SET name='$name',post='$age' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: shop.php");
    }
}
?>

<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['lt'];
    $age=$_POST['lg'];
    
    // checking empty fields
    if(empty($name) || empty($age)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
               
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE biling SET lat='$name',lng='$age' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: shop.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
    #map {
        height: 100%;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/order.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
<?php
$sesion=$_SESSION['username'];
?>
 
   
		  <?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM shop WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
	$id=$res['id'];
    $name = $res['product_type'];
    $type = $res['product_name'];
    $price = $res['price'];
    $dis = $res['discription'];
    $seller = $res['seller_name'];
    $tell = $res['tell'];
    $adress = $res['adress'];
	$id = $res['id'];
	$disc=$res['discount'];
  $dilivery=$res['diliverry'];
  $avalability=$res['quantity'];
	$newprice = $price-$disc+$dilivery;
}
?>
<?php 
$result5 = mysqli_query($mysqli, "SELECT * FROM user WHERE username='{$_SESSION['username'] }'");
 
while($res1 = mysqli_fetch_array($result5))
{
  $mail= $res1['email'];
}
?>
	<section class="ftco-section contact-section bg-light">
   <div class="container">
   <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            
		  <div id="map" class="bg-white"></div>
		
				   <div id="for" style="display: none">
						  <form id="form" method="POST" action="bill.php?">
				   
						 <table>
						 <tr><td>id<br><input type="text" name="id" id="l" value="<?php echo $id;?>">
									<tr><td>lat:<br><input type="text" name="lt" id="lt"></tr></td><tr><td>lng:<br><input type="text" name="lg" id="lg"></td></tr>
									<tr><td><button name="update" onclick="myFunction()">Get Location and save</button></td></tr>
									
						 </table>
				   </form>
				   </div> 
				   <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 15
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your Location');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
				   
				   
				   
				   
				   <script>
				   function myFunction() {
					 var latlng = marker.getPosition();
					 document.getElementById("lt").value = latlng.lat();
					 document.getElementById("lg").value = latlng.lng();
				   
				   }
				   </script>
				   
				   <script async defer
					   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBASl0AXJrqLuHm_negrmEYrBnGntLhIoM&callback=initMap">
					   </script><!-- END -->
          
          </div>

          <div class="col-md-6 d-flex">
			             
          <?php 
if(isset($_POST['cal2'])){
    $a=mysqli_real_escape_string($mysqli, $_POST['qunty1']);
    $b=mysqli_real_escape_string($mysqli, $_POST['price']);
    $c=$a*$b;
    if($avalability<=$a){
      
   echo"<script>alert('Sory.! Your selected quantity not available right now. Please check the avalability.');
   window.location.href='product-single.php?id=$id';</script>";
    }
}?>
            
						<form action="shopinsert.php" method="post" >
							<h3 class="mb-4 billing-heading">Billing Details</h3>
							<input type="hidden" class="form-control" color="black" placeholder="" name="id" value="<?php echo $id;?>" readonly>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
                        <label for="firstname">Firt Name</label>
                        
	                  <input type="text" class="form-control" color="black" placeholder="" name="fname" value="<?php echo $sesion;?>" readonly>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder="" name="lname" required >
	                </div>
                </div>
				<div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress"> Product Name</label>
	                  <input type="text" class="form-control" name="proname"   value="<?php echo $name;?>" readonly required>
	                </div>
		            </div>
                <div class="w-100"></div>
				<div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Product Type</label>
	                  <input type="text" class="form-control" name="pname"  value="<?php echo $type;?>" readonlyrequired>
                    </div>
                    </div>
                    <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Date</label>
	                  <input type="date" style="color:black;"class="form-control" name="date">
	                </div>
		            </div>
                    <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Seller Name</label>
	                  <input type="text" class="form-control" placeholder="" name="seller"required  value="<?php echo $seller;?>" readonly>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress"> Address</label>
	                  <input type="text" class="form-control" name="address" placeholder="Address of the customer" required>
	                </div>
		            </div>
                    <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Quntitty</label>
	                  <input type="text" class="form-control" name="qunty" value="<?php echo $a;?>"required readonly>
                    </div>
                    </div>
                    <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Product Price[Per : 1]</label>
	                  <input type="text" style="color:black;"class="form-control" name="price"  placeholder=""required value="<?php echo $c;?>"  readonly>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control"name="city" required placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control"name="pcode"  placeholder=""required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" name="tell"required placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" name="email" value="<?php echo $mail;?>" readonly required placeholder="">
	                </div>
				</div>
				<div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	
	                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?> "readonly>
	                </div>
		            </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
                          <div class="col-lg-6 mb-5 ftco-animate">
                    <input type="submit"  class="btn btn-primary py-3 px-4" name="submit"  value="Place an order">
									
									</div></div>
                </div>
	            </div>
	          </form><!-- END -->
			 

          </div>
        </div>
      </div>
    </section><!-- .section -->

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
  
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>