<?php  
	include 'connect.php';
	$Bus_Name_Edit = $_COOKIE["search"];
	$name_bus = $_REQUEST["name_bus"];
	$name_owner = $_REQUEST["name_owner"];
	$email_bus = $_REQUEST["email_bus"];
	$service_bus = $_REQUEST["service_bus"];
	$info_bus = $_REQUEST["info_bus"];
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
			<?php mysqli_query($con,"UPDATE `businfo` SET `Email`='$email_bus',`BusName`='$name_bus',`OwnerName`='$name_owner',`Service`='$service_bus',`Info`='$info_bus' WHERE BusName = '$Bus_Name_Edit'"); ?>
			<tr>
			<span>Cập nhật thành công.</span>
			</tr>
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