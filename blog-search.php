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
$sesion=$_SESSION['username'];
?>
<?php
include_once("config.php");
if(isset($_GET["search"])){
    $search=$mysqli->escape_string($_GET["search"]);
    
    $results_per_page = 5;
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM blog where name Like '%$search%'");
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
$sql="SELECT * FROM blog where name Like '%$search%'";
    $result = mysqli_query($mysqli, $sql);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <style>
      .notice:first-child{
    margin-top:10px;
    }
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
      .notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
      </style>
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/blog.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
						
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		            
		              <div class="text d-block pl-md-4">
		              	
                    <?php
                    if($number_of_results==0){echo ' <div class="container"> <div class="notice notice-warning">
                      <strong>SORRY</strong> No Resluts  <span class="pull-right text-warning readMore">Read</span>
                        <div class="desc">
                          
                          <p>
                          We couldn’t find any repositories matching <b>';echo $search; echo'</b>
                          </p>        
                      </div>
                  </div></div>';}else{

                    
        echo'<div style="color:Black;">';
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {   
        echo' </div>';
        $s=$res['image'];
        echo '<img src="images/'.$s.'" class="block-20" style="width:350px;height:170px;">';      
          echo '<h4><p><h3 class="heading">';
          echo "Name <t>"  .$res['name']."<br></h3>";  
          echo'<div class="meta mb-3">';
          echo'   <div><a href="#">';echo ""  .$res['timestamp']."";echo'</a></div>';
          echo'    <div><a href="#">';echo "<b>"  .$res['username']."";echo'</b></a></div>';
          echo'   <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>';
          echo '<p>'; echo " <t>"   .substr($res['post'],0,300)."</br></p>";
          echo "<a href=\"blog-single.php?id=$res[id]\">Read more....</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"></a><br>";    echo "</h4></p>";    
        }  
        echo '<br><br></div>';}?>
        
    
		              </div>
		            </div>
		          </div>
						</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
             
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 class="heading">ADD POSTS</h3>
              <ul class="categories">
              <form name="form1" method="post" action="bloginsert.php" class="p-5 bg-light">
              <div class="form-group">
                    
                    <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $sesion;?>">
                  </div>
                  <div class="form-group">
                    <label for="name">Post Title*</label>
                    <input type="text" class="form-control" id="name" name="name" require>
                  </div>
                  <div class="form-group">
                    <label for="message">Post</label>
                    <textarea  id="message" cols="30" name="age" rows="10" class="form-control"require></textarea>
                  </div>

                  <div class="form-group">
                    <label for="website">Image</label>
                    <input type="file" name="image" accept="image/*" require>
                  </div>

                  <div class="form-group">
                 <input type="hidden" name="id" >
                    <input type="submit" name="submit" value="Post Blog Post" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              
              </ul>
            </div>
            <div class="sidebar-box ftco-animate">
               
           <div class="sidebar-box ftco-animate">
            <div class="container">
             <h3 class="heading"> Your blog post </h3>
             <p> You can edit , delete your uploaded blog posts</p> 
             <div class="col-lg-6 mb-5 ftco-animate">
               <a href="user-blog.php" >    <Button class="btn btn-primary py-3 px-4" >Blog Posts</button></a>
									</div>
             </div>
             </div>
          </div>
             </div>
   
            
          </div>

        </div>
        
      </div>
      <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
        <ul><h4>More Posts</h4>
        <?php for ($page=1;$page<=$number_of_pages;$page++) {
        echo'<li class="active">';
          echo '<a class=""  href="blog.php?page=' . $page . '">' . $page . '</a> ';
          echo'</li>&nbsp';
        }
        ?>
        </ul>
        </div>
          </div>
        </div>
    </section> <!-- .section -->

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
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
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
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
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