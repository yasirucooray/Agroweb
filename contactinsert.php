<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {   
    $toemail="rashmikacooray166@gmail.com";
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $mzg = mysqli_real_escape_string($mysqli, $_POST['mazg']);
    $sub = mysqli_real_escape_string($mysqli, $_POST['sub']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        
    // checking empty fields
    if(empty($name) || empty($mzg) ) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($mzg)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
     
        
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO concat(name,email,subject,message) VALUES('$name','$email','$sub','$mzg')");
        
      
        $message =
        "
        From: $name
       

        $sub. 

        Dear Sir/Madam,

        $mzg
       
       
        
        ";
        
        mail($email,"Agro web",$message,"From: yasiphpweb@gmail.com");
          
               header('location: contact.php');
    }
}
?>
</body>
</html>