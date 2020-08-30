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
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
        
    // checking empty fields
    if(empty($name) || empty($age) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
        
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO blog(name,username,post,image) VALUES('$name','$username','$age','$image')");
        
        header('location: blog.php');
    }
}
?>
</body>
</html>