<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {   
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $tital = mysqli_real_escape_string($mysqli, $_POST['tital']);
    $about = mysqli_real_escape_string($mysqli, $_POST['about']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
        
    // checking empty fields
    if(empty($name) || empty($tital) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($tital)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
        
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO news(poster_name,title,infor,image1) VALUES('$name','$tital','$about','$image')");
        
        header('location: news-industry.php');
    }
}
?>
</body>
</html>