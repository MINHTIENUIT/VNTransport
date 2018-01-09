<?php  
include 'connect.php';
$name = $_REQUEST["BusName"];
$trip = $_REQUEST["Trip"];
$result_bus_name = mysqli_query($con,"SELECT * FROM `pricetable` WHERE BusName = '$name' AND Route = '$trip';");
$bus_name = mysqli_fetch_object($result_bus_name);

if (mysqli_num_rows($result_bus_name) <= 0) {
  echo "Không Tìm được chuyến đi vui lòng kiểm tra lại";
}else{
  mysqli_query($con,"DELETE FROM `pricetable` WHERE BusName = '$name' AND Route = '$trip'")
  echo "Xóa thành công";
}

?>