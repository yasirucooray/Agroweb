<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {   
    $cname = mysqli_real_escape_string($mysqli, $_POST['cname']);
    $ptype = mysqli_real_escape_string($mysqli, $_POST['ptype']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $dis = mysqli_real_escape_string($mysqli, $_POST['dis']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $qulity = mysqli_real_escape_string($mysqli, $_POST['qulity']);
    $city= mysqli_real_escape_string($mysqli, $_POST['city']);
    $pcode = mysqli_real_escape_string($mysqli, $_POST['pcode']);
    $tell = mysqli_real_escape_string($mysqli, $_POST['tell']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        
    // checking empty fields
    if(empty($cname) || empty($ptype) || empty($address)|| empty($dis) || empty($image) || empty($qulity) || empty($price) || empty($city) || empty($pcode) || empty($tell) || empty($email) ) {
                
        if(empty($cname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ptype)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }
        if(empty($dis)) {
            echo "<font color='red'>saller field is empty.</font><br/>";
        }

        if(empty($image)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }

        if(empty($qulity)) {
            echo "<font color='red'>Quntity field is empty.</font><br/>";
        }

        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }

        if(empty($city)) {
            echo "<font color='red'>city field is empty.</font><br/>";
        }

        if(empty($pcode)) {
            echo "<font color='red'>postal code field is empty.</font><br/>";
        }

        if(empty($tell)) {
            echo "<font color='red'>tell nofield is empty.</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>email field is empty.</font><br/>";
        }


        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO company_profile(ind_name,product_type,address,discription,image,price_rate,quality,town,post_code,email,telll) VALUES('$cname','$ptype','$address','$dis','$image','$price','$qulity','$city','$pcode','$email','$tell')");
    
        header('location: industry.php');
       
    }
}
?>
</body>
</html>