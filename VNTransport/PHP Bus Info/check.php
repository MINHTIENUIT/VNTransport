<?php

include 'connect.php';
$username = $_REQUEST["user"];
$password = $_REQUEST["pass"];

$resultlogin = mysqli_query($con,"SELECT * FROM login WHERE username='$username' AND password='$password';");


if(mysqli_num_rows($resultlogin) > 0){
	setcookie("username", $username);
	echo "Welcom!!!!!";
	echo "<script>alert('welcom!')</script>";
	echo "<script>window.location='Bus Information.php'</script>";
}
else {
	echo "Error!!!!!!";
	echo "<script>alert('Wrong Username or Password please try again!')</script>";
	echo "<script>window.location='Bus Information.php'</script>";
}
?>
