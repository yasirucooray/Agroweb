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
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $comment = mysqli_real_escape_string($mysqli, $_POST['comment']);
        
    // checking empty fields
    if(empty($name) || empty($comment) || empty($id) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($comment)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
        if(empty($id)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO question_comment(name,q_id,comment) VALUES('$name','$id','$comment')");
        
        header('location: solution.php');
    }
}
?>
</body>
</html>