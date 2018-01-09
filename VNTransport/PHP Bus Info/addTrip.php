<?php  
	include 'connect.php';
	$name_bus = $_REQUEST["name_bus"];
	$name_trip = $_REQUEST["name_trip"];
	$bus_type = $_REQUEST["bus_type"];
	$trip_number = $_REQUEST["trip_number"];
	$money = $_REQUEST["money"];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>VNTransport</title>

	<meta charset="UTF-8">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="mdb/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="mdb/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="mdb/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="table table-hover">
			<?php $result_trip = mysqli_query($con,"SELECT * FROM pricetable WHERE BusName='$name_bus' AND Route = '$name_trip'"); ?>
			<?php if (mysqli_num_rows($result_trip) > 0) { ?>
			<?php echo "Đã tồn tại chuyến đi vui lòng kiểm tra lại"; ?>
			<?php } ?>
			<?php if (mysqli_num_rows($result_trip) <= 0) { ?>
			<?php mysqli_query($con,"INSERT INTO `pricetable`(`BusName`, `Route`, `BusType`, `TripNum`, `Price`) VALUES ('$name_bus','$name_trip','$bus_type','$trip_number','$money')"); ?>
			<?php echo "Nhập thành công"; ?>
			<?php } ?>
		</div>
	</div>
	<script>
		var delayInMilliseconds = 2000; //2 second

		setTimeout(function() {
			//code to be executed after 2 second
  			window.location='BusInformation.php'
		}, delayInMilliseconds);
	</script>
</body>
</html>