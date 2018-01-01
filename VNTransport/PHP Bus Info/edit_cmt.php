<?php 
include 'Connect.php';
$IDcmt = $_REQUEST['IDcmt'];
$edit_cmt_text = $_REQUEST['edit_cmt_text'];
mysqli_query($con,"UPDATE cmt SET `content`='$edit_cmt_text' WHERE ID = $IDcmt");

echo $IDcmt;
echo $edit_cmt_text;
//echo "<script>window.location='BusInformation.php'</script>"; 

?>

