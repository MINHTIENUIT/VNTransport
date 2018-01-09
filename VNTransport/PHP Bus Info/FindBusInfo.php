<?php  
include 'connect.php';
$name = $_REQUEST["BusName"];

$result_bus_name = mysqli_query($con,"SELECT * FROM `businfo` WHERE BusName = '$name';");
$bus_name = mysqli_fetch_object($result_bus_name);

if (mysqli_num_rows($result_bus_name) <= 0) {
	echo "Không có nhà xe";
}else{
	setcookie('search',$name);
	$string = "BusName: " . $bus_name->BusName . "OwnerName: " . $bus_name->OwnerName . "Email: " . $bus_name->Email . "Service: " . $bus_name->Service . "Info: " . $bus_name->Info;
	echo $string;
}

?>