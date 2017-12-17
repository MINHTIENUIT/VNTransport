<!DOCTYPE html>
<html lang="en">

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
	<link href="css/style.css" rel="stylesheet">

	<!-- Template styles -->
	<style rel="stylesheet">
	/* TEMPLATE STYLES */
	
	html,
	body,
	.view {		
		height: 100%;
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
<?php
	include('data_access_helper.php');
	require 'HangXe.php';

	$db = new DataAccessHelper;
	$db->connect(); 
	$HX = new HangXe;
	
	if (!$GLOBALS['conn']->set_charset("utf8")) {
		exit();
	}

	$HX->HangXe = $_POST["HangXe"];	
	$HX->Email = $_POST["Email"];
	$HX->ChuXe = $_POST["ChuXe"];
	$HX->Phone = $_POST["Phone"];
	$HX->Image = $_POST["Photo"];
	$HX->DiaChi = $_POST["DiaChi"];
	$HX->Info = $_POST["Info"];

	$insertQuery = "INSERT INTO nhaxe(EMAIL,NHAXE,CHUXE,DIENTHOAI,LINK_IMAGE,THONGTIN,DIACHI)
					 VALUES(\"$HX->Email\",\"$HX->HangXe\",\"$HX->ChuXe\",\"$HX->Phone\",\"$HX->Image\",
					\"$HX->Info\",\"$HX->DiaChi\")";
	$db->executeNonQuery($insertQuery);
?>
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
			<div class="row flex-center" style="padding-top: 100px; min-height: 678px;">
				<!-- Form đăng kí thông tin hãng xe -->			
				<div class="col-md-12 text-center">
					<h1 class="h1-responsive wow fadeInUp title">Thông Tin Xe Khách</h1>
				</div>
				<div class="col-md-12 text-center">
					<h2 class="h1-responsive wow fadeInUp title">
						<?php  						
						echo $HX->HangXe;						
						?>						
					</h2>
				</div>

				<div class="col-md-12 row container-fluid text-center wow fadeInUp">
					<form action="DoneRegister.php" method="POST" class="col-md-12 row text-center">
						<div class="col-12 row">						
							<?php 
								class Tinh{
									public $ID;
									public $Name;
								}				
								//$ArrayTinh = new ArrayObject(new Tinh);
								$ArrayTinh = array();

								$sql = "SELECT * FROM diadiem where 1";
								$Tinh = $db->executeQuery($sql);	
								$count = 0;								
								if (mysqli_num_rows($Tinh) > 0){
									while ($row = mysqli_fetch_assoc($Tinh)) {	
										$Temp = new Tinh;									
										$Temp->ID = $row["ID"];
										$Temp->Name = $row["TINH"];
										$ArrayTinh[] = $Temp;										
									}
								}

								session_start();
								$SoXe = $_POST["SoXe"];
								$_SESSION['hangxe'] = $HX->HangXe;
								$_SESSION['value'] = $SoXe;
								for ($i = 0; $i < $SoXe ; $i++){
									echo BienSo($i);
									echo NoiDi($i,$ArrayTinh);
									echo NoiDen($i,$ArrayTinh);
									echo GioDi($i);
									echo GiaVe($i);
									echo GhiChu($i);
								}
								$db->close();
							?>
						</div>
						<div class="col-md-12 text-center md-form">
							<input type="submit" name="submit" value="Đăng Ký" class="btn btn-elegant">
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>	

	<!--Footer-->
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
	<?php 

	function BienSo($ID){
		$BienSo = "	<div class=\"col-md-2\">
		<div class=\"md-form\">
		<input type=\"text\" id=\"form1\" class=\"form-control\" name=\"BienSo"."$ID\">
		<label for=\"form1\" class=\"\">Biển Số</label>
		</div>
		</div>";
		return $BienSo;
	}

	function NoiDi($ID, $array){
			/* change character set to utf8 */		

		$NoiDi = "<div class=\"col-md-2\">
						<div>
						<label for=\"form1\" class=\"\">Nơi Đi</label>
						</div>
						<div class=\"dropdown\">
						<select class=\"dropdown-select\" name=\"NoiDi"."$ID\">";
						foreach ($array as $item) {
							$NoiDi=$NoiDi."<Option value=\"".$item->ID."\">".$item->Name."</Option>";
						}
		$NoiDi = $NoiDi."</select></div>
			</div>";
		return $NoiDi;
	}

	function NoiDen($ID, $array){
			/* change character set to utf8 */		

		$NoiDen = "<div class=\"col-md-2 container-fluid\">
						<div>
						<label for=\"form1\" class=\"\">Nơi Đến</label>
						</div>
						<div class=\"dropdown\">
						<select class=\"dropdown-select\" name=\"NoiDen"."$ID\">";
						foreach ($array as $item) {
							$NoiDen=$NoiDen."<Option value=\"".$item->ID."\">".$item->Name."</Option>";
						}
		$NoiDen = $NoiDen."</select></div></div>";
		return $NoiDen;
	}


	function GioDi($ID){
		$GioDi = "<div class=\"col-md-2\">
		<div class=\"md-form\">
		<input type=\"time\" id=\"form1\" class=\"form-control\" name=\"ThoiGian"."$ID\">
		</div>
		</div>";
		return $GioDi;
	}

	function GiaVe($ID){
		$GiaVe = "<div class=\"col-md-2\">
		<div class=\"md-form\">
		<input type=\"text\" id=\"form1\" class=\"form-control\" name=\"GiaVe"."$ID\">
		<label for=\"form1\" class=\"\">Gia Vé</label>
		</div>
		</div>";
		return $GiaVe;
	}

	function GhiChu($ID){
		$GhiChu = "<div class=\"col-md-2\">
		<div class=\"md-form\">
		<input type=\"text\" id=\"form1\" class=\"form-control\" name=\"GhiChu"."$ID\">
		<label for=\"form1\" class=\"\">Ghi Chú</label>
		</div>
		</div>";
		return $GhiChu;
	}	
	?>

</body>

</html>