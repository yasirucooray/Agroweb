<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
$databaseHost = 'localhost';
$databaseName = 'login';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if(isset($_POST['submit'])) {   
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $details = mysqli_real_escape_string($mysqli, $_POST['det']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
    
        
    // checking empty fields
    if(empty($fname) || empty($lname) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
        
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO news(poster_name,title,infor,image1) VALUES('$fname','$lname','$details','$image')");
        header('location: latest-news.php');
        
    }
}
?>
</body>
</html>