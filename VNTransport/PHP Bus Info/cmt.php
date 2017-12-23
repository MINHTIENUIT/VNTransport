<?php

include 'connect.php';
$cmt = $_REQUEST["cmt"];
$user = $_COOKIE['username'];
mysqli_query($con,"INSERT INTO `cmt`(`username`, `content`) VALUES ('$user','$cmt')");
echo "<script>window.location='Bus Information.php'</script>"; 
?>
