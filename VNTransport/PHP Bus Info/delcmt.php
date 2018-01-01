<?php 
include 'Connect.php';
$delcmt = $_REQUEST['del'];
mysqli_query($con,"DELETE FROM cmt WHERE ID='$delcmt'");
echo $delcmt;
//echo "<script>window.location='BusInformation.php'</script>"; 
?>