<?php  
include('data_access_helper.php');
class Xe{
	var $BienSo;
	var $NhaXe;
	var $TuyenDi;
	var $Gia;
	var $DV;
	var $GioDi;
}

class TuyenDi{
	var $ID;
	var $NoiDi;
	var $NoiDen;
}

$db = new DataAccessHelper;
$db->connect();

if (!$GLOBALS['conn']->set_charset("utf8")) {
	exit();
}

session_start();
$SoXe = $_SESSION['value'];
$HangXe = $_SESSION['hangxe'];
$resultNX = $db->executeQuery("SELECT ID FROM nhaxe where NHAXE='$HangXe'");
$temp = mysqli_num_rows($resultNX);
$row= mysqli_fetch_assoc($resultNX);
$HangXe = $row["ID"];
for ($i = 0; $i < $SoXe; $i++){
	$TuyenDi = new TuyenDi;

	$Xe = new Xe;
	$Xe->BienSo = $_POST["BienSo".$i];
	$Xe->NhaXe = $HangXe;
	$Xe->Gia = $_POST["GiaVe".$i];
	$Xe->DV = $_POST["GhiChu".$i];
	$Xe->GioDi = $_POST["ThoiGian".$i];

	$TuyenDi->NoiDi = $_POST["NoiDi".$i];
	$TuyenDi->NoiDen = $_POST["NoiDen".$i];

	$sqlTD = "SELECT ID FROM TuyenDi Where DI='$TuyenDi->NoiDi' and DEN='$TuyenDi->NoiDen'";
	$result = $db->executeQuery($sqlTD);
	if (mysqli_num_rows($result) == 0){
		$insertTD = "INSERT INTO TuyenDi(DI,DEN) values(\"$TuyenDi->NoiDi\",\"$TuyenDi->NoiDen\")";
		$db->executeNonQuery($insertTD);
		$result = $db->executeQuery($sqlTD);
	}

	$Xe->TuyenDi = mysqli_fetch_assoc($result)["ID"];
	$insertXe = "INSERT INTO Xe(BienSo,NHAXE,TUYENDI,GIA,DICHVU,GIODI) VALUES(\"$Xe->BienSo\",\"$Xe->NhaXe\",\"$Xe->TuyenDi\",\"$Xe->Gia\",\"$Xe->DV\",\"$Xe->GioDi\")";		
	$db->executeNonQuery($insertXe);
}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>VNTransport</title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">

	<!-- Template styles -->
	<style rel="stylesheet">
	/* TEMPLATE STYLES */
	
	html,
	body,
	.view {		
		height: 105%;
	}
	/* Navigation*/
	
	.navbar {
		background-color: transparent;
	}
	
	.scrolling-navbar {
		-webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
		-moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
		transition: background .5s ease-in-out, padding .5s ease-in-out;
	}
	
	.top-nav-collapse {
		background-color: #26637F;
	}
	
	footer.page-footer {
		background-color: #26637F;
		margin-top: -1px;
	}
	
	@media only screen and (max-width: 768px) {
		.navbar {
			background-color: #26637F;
		}
	}
	.navbar .btn-group .dropdown-menu a:hover {
		color: #000 !important;
	}
	.navbar .btn-group .dropdown-menu a:active {
		color: #fff !important;
	}
	/*Call to action*/
	
	.flex-center {
		color: #fff;
	}
	
	.view {
		background: url("img/travel_tourism_hd1.gif")no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}

	.md-form label {
		color: #f8f9fa;
	}

	.form-control {
		color: #f8f9fa;
	}

	.form-control:focus {
		color: #f8f9fa;
	}

	.hm-black-strong .full-bg-img{
		background-color: rgba(19,16,16,0.7);
	}

	.color-black {
		color: black;
	}

	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 0; 
	}

</style>

</head>

<body>	
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
		<div class="container">
			<a class="navbar-brand" href="#">VNTransport</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Tin tức</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Liên hệ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Đăng nhập</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Đăng kí</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="">
		<div class="view flex-center container-fluid">
			<div class="row" style="padding-top: 100px; min-height: 678px;">
				<!-- Form đăng kí thông tin hãng xe -->			
				<div class="col-md-12" style="text-align: center;">
					<h1 class="h1-responsive wow fadeInUp title">Đã Đăng Kí Thành Công</h1>
				</div>
			</div>
		</div>
	</div>	
	
	<footer class="page-footer center-on-small-only mt-4">
		<!--Copyright-->
		<div class="footer-copyright">
			<div class="container-fluid">
				© 2017 Copyright: <a href="#"> UIT.edu.vn </a>

			</div>
		</div>
		<!--/.Copyright-->

	</footer>
	<!--/.Footer-->


	<!-- SCRIPTS -->

	<!-- JQuery -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap dropdown -->
	<script type="text/javascript" src="js/popper.min.js"></script>

	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/mdb.min.js"></script>

	<!-- Animations init-->
	<script>
		new WOW().init();
	</script>
	<!-- insert info register -->

</body>

</html>