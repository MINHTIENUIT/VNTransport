<?php

include 'connect.php';

$username = $_POST["user"];
$password = $_POST["pass"];

$resultlogin = mysqli_query($con,"SELECT * FROM login WHERE username='$username' AND password='$password';");


if(mysqli_num_rows($resultlogin) > 0){
  setcookie("username", $username);
  echo "<script>alert('welcom!')</script>";
  echo "<script>window.location='Bus Information.php'</script>";
}
else {
  echo "<script>alert('Wrong username or password')</script>";
  echo "<script>window.location='Bus Information.php'</script>";
}
?>
