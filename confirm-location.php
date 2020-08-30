<?php


$confirmed="";
$important="";
$lt="";
$lg="";

$database="login";
// Gets data from URL parameters.
if(isset($_POST['submited']))
{

$confirmed = $_POST['confirme'];
$important = $_POST['important'];
$lt = $_POST['lt'];
$lg = $_POST['lg'];
}

// Opens a connection to a MySQL server.

$con=mysqli_connect("localhost","root","","login");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"login");

// ...some PHP code for database "test"...



$query=  "update marker set location_status = '$confirmed',important='$important' WHERE lat = '$lt' AND lng ='$lg' ";
$result = mysqli_query($con,$query);
    echo "Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
mysqli_close($con);
header("Location:maps.php");
?>