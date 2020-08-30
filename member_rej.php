<html>
<head>
    <title>Agro web</title>
</head>

<body>
<?php

$errors = array(); 

//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {   
    $cname = mysqli_real_escape_string($mysqli, $_POST['cname']);

    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $iname = mysqli_real_escape_string($mysqli, $_POST['iname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  
      
        $result1 = mysqli_query($mysqli, "SELECT * FROM membership WHERE member_name='$cname' LIMIT 1" );
        $user = mysqli_fetch_assoc($result1);
         if ($user) { // if user exists
          if ($user['member_name'] === $cname) {
            array_push($errors, "Username already exists");
            echo"<script>alert('Your Allreaady Assign In A Company');
            window.location.href='membership.php';</script>";
          }
      
        
        }
        if (count($errors) == 0) {
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO membership(user_id,member_name,email,industry_name,confirmation) VALUES('$address','$cname','$email','$iname','Pending')");
    
        header('location: membership.php');}
       
    }

?>

</body>
</html>