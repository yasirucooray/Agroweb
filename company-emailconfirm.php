<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<?php

$db = mysqli_connect('localhost', 'root', '', 'login');

$username = $_GET['username'];
$code = $_GET['code'];
$user_check_query = "SELECT * FROM `companyuser` WHERE `name`='$username'";
$result = mysqli_query($db, $user_check_query);

while($row = mysqli_fetch_assoc($result))
{
	$db_code = $row['confirmcode'];
}
if($code == $db_code)
{
    	mysqli_query($db,"UPDATE `companyuser` SET `confirm`='1' ");
	mysqli_query($db,"UPDATE `companyuser` SET `confirmcode`='0'");
	
	echo "Thank You. Your email has been confimed and you may now login";
}
else
{
	echo "Username and code dont match";	
}

?>
</body>
</html>