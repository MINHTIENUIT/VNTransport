<?php

include 'connect.php';
$cmt = $_REQUEST["cmt"];
$user = $_COOKIE['username'];
if($cmt != null)
{
	mysqli_query($con,"INSERT INTO `cmt`(`username`, `content`) VALUES ('$user','$cmt')");
	echo "<script>window.location='BusInformation.php'</script>"; 
}
else
{	
	echo "<script>window.location='BusInformation.php'</script>"; 
}

?>
