<?php  
	include 'connect.php';
	$name_bus = $_REQUEST["name_bus"];
	$name_owner = $_REQUEST["name_owner"];
	$email_bus = $_REQUEST["email_bus"];
	$service_bus = $_REQUEST["service_bus"];
	$info_bus = $_REQUEST["info_bus"];
	$result_info = mysqli_query($con,"SELECT * FROM businfo WHERE BusName='$name_bus'");
	$info = mysqli_fetch_object($result_info);
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
			<?php if (mysqli_num_rows($result_info) > 0) { ?>
			<?php echo "Đã tồn tại nhà xe vui lòng nhập lại"; ?>
			<?php } ?>
			<?php if (mysqli_num_rows($result_info) <= 0) { ?>
			<?php mysqli_query($con,"INSERT INTO `businfo`(`Email`, `BusName`, `OwnerName`, `Service`, `Info`) VALUES ('$email_bus','$name_bus','$name_owner','$service_bus','$info_bus')"); ?>
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