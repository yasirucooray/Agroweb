<?php

$database="login";

// Gets data from URL parameters.
$id= $_POST['id'];
$name =   $_POST['name'];
$image =  $_POST['image'];
$lat =   $_POST['lt'];
$lng =   $_POST['lg'];
$description =  $_POST['description'];
$type =$_POST['type'];

  

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

// Inserts new row with place data.
$query = sprintf("INSERT INTO marker " .
         " (id, ind_id,name, image, lat, lng, description,type ) " .
         " VALUES (NULL, '%s','%s', '%s', '%s', '%s', '%s', '%s');",
         mysqli_real_escape_string($con, $id),
         mysqli_real_escape_string($con, $name),
         mysqli_real_escape_string($con, $image),
         mysqli_real_escape_string($con, $lat),
         mysqli_real_escape_string($con, $lng),
         mysqli_real_escape_string($con, $description),
         mysqli_real_escape_string($con, $type));

$result = mysqli_query($con, $query);


if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
mysqli_close($con);
header("Location:industry-map.php");
    
?>