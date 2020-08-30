<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit1'])) {   
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $user = mysqli_real_escape_string($mysqli, $_POST['user']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $tell = mysqli_real_escape_string($mysqli, $_POST['tell']);
    $open = mysqli_real_escape_string($mysqli, $_POST['open']);
        
    // checking empty fields
    if(empty($name) || empty($address) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($address)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
         
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO collection_points(ind_id,company_name,town,address,tell,time) VALUES('$id','$user','$name','$address','$tell','$open')");
        
        header('location: industry-profile.php');
    }
}
?>
</body>
</html>