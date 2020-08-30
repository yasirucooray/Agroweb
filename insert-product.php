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
    $sid = mysqli_real_escape_string($mysqli, $_POST['sid']);
    $ptype = mysqli_real_escape_string($mysqli, $_POST['ptype']);
    $pname = mysqli_real_escape_string($mysqli, $_POST['pname']);
    $dis = mysqli_real_escape_string($mysqli, $_POST['dis']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $quantity= mysqli_real_escape_string($mysqli, $_POST['quantity']);
    $tell = mysqli_real_escape_string($mysqli, $_POST['tell']);
    $deli = mysqli_real_escape_string($mysqli, $_POST['deli']);
    $war = mysqli_real_escape_string($mysqli, $_POST['war']);
    $dis = mysqli_real_escape_string($mysqli, $_POST['dis']);
    
        
    // checking empty fields
    if(empty($cname) || empty($ptype) || empty($pname)|| empty($dis) || empty($address) || empty($image) || empty($price) || empty($quantity) || empty($tell)  ) {
                
        if(empty($cname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ptype)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }
        if(empty($pname)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }
        if(empty($dis)) {
            echo "<font color='red'>saller field is empty.</font><br/>";
        }

        if(empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }

        if(empty($image)) {
            echo "<font color='red'>Quntity field is empty.</font><br/>";
        }

        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }

        if(empty($quantity)) {
            echo "<font color='red'>city field is empty.</font><br/>";
        }

        if(empty($tell)) {
            echo "<font color='red'>postal code field is empty.</font><br/>";
        }

        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysqli_query($mysqli, "INSERT INTO shop(seller_id,product_type,product_name,quantity,discription,price,image,seller_name,adress,tell,warranty_period,diliverry,discount) VALUES('$sid','$ptype','$pname','$quantity','$dis','$price','$image','$cname','$address','$tell','$war','$deli','$dis')");
        
             
        header('location: add-product.php');
    }
}
?>
</body>
</html>