<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    
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
        $result = mysqli_query($mysqli, "UPDATE blog SET name='$name',post='$age'' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: edit.php");
    }
}
?>

<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    
</body>
</html>