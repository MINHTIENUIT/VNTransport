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

	<!-- Template styles -->
	<style rel="stylesheet">
	/* TEMPLATE STYLES */
	
	html,
	body,
	.view {		
		height: 25%;
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
<?php 
	include 'data_access_helper.php';
	class RESULT{
		var $HX;
		var $Gio;
		var $Gia;		
		var $DV;
		var $NoiDi;
		var $NoiDen;
	}
	$NoiDi = "";
	$NoiDen = "";
	
	if (isset($_POST["NoiDi"])){
		$NoiDi = $_POST["NoiDi"];
	}

	if (isset($_POST["NoiDen"])){
		$NoiDen = $_POST["NoiDen"];
	}

	$dp = new DataAccessHelper;
	$dp->connect();
	if (!$GLOBALS['conn']->set_charset("utf8")) {
		exit();
	}	
	
	$sql = "SELECT * FROM xe WHERE TUYENDI = (SELECT ID FROM tuyendi WHERE DI = (SELECT id FROM diadiem WHERE TINH LIKE \"%$NoiDi%\") AND DEN = (SELECT ID FROM diadiem WHERE TINH LIKE \"%$NoiDen%\"))";
	$return = $dp->executeQuery($sql);
	$RESULT = array();
	if (mysqli_num_rows($return) > 0){
		while ($row = mysqli_fetch_assoc($return)){
			$Result = new RESULT;
			$Result->Gio = $row["GIODI"];
			$Result->DV = $row["DICHVU"];
			$Result->Gia = $row["GIA"];
			$temp = $row["NHAXE"];
			$sql = "SELECT NHAXE FROM nhaxe WHERE ID = $temp";
			$return = $dp->executeQuery($sql);
			if (mysqli_num_rows($return)){
				while ($row = mysqli_fetch_assoc($return)) {
				    $Result->HX = $row["NHAXE"];
				}
			}
			$RESULT[] = $Result;
		}
	}
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
	<!-- Navigation Bar End -->
	<div class="">
		<div class="view flex-center container-fluid">
			<div class="row" style="padding-top: 100px;">
				<ul>
					<li>
						<div class="wow fadeIn" data-wow-delay="0.4s">
							<form action="result.php" method="POST">
								<div class="row container-fluid">
									<div class="col-md-3">
										<div class="md-form">
											<input type="text" id="form1" class="form-control validate" name="NoiDi">
											<label for="form1">Nơi đi</label>
										</div>
									</div>
									<div class="col-md-3">
										<div class="md-form">
											<input type="text" id="form2" class="form-control validate" name="NoiDen">
											<label for="form2">Nơi đến</label>
										</div>
									</div>
									<div class="col-md-3">
										<div class="md-form">
											<input type="text" id="form3" class="form-control validate" name="NgayDi">
											<label for="form3">Ngày đi</label>
										</div>
									</div>
									<div class="col-md-3">
										<div class="md-form">
											<button class="btn btn-lg btn-dark-green">Tìm vé</button>
										</div>
									</div>
								</div>                            
							</form>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!--Bar short-->
	<div class="container-fluid" style="background-color: #5D747F; margin-top: 16px; margin-bottom: 16px;">		
		<div class="row text-center">
			<div class="row col-md-6" style="padding-top: 10px;">
				<div class="col-md-5 col-sm-12">
					<span>
						<h5><b><?php echo $NoiDi;  ?></b></h5>
					</span>				
				</div>
				<div class="col-md-2">
					<i class="fa fa-exchange fa-2x"></i>
				</div>
				<div class="col-md-5">
					<span>
						<h5><b><?php echo $NoiDen;  ?></b></h5>	
					</span>				
				</div>
			</div>

			<div class="row col-md-6 col-sm-12">
				<div class="col-md-4 col-sm-4" style="padding: 8px;">
					Giờ đi:
					<select>
						<option>Tăng dần</option>
						<option>Giảm dần</option>
					</select>					
				</div>		
				<div class="col-md-4 col-sm-4" style="padding: 8px;">
					Giá vé:
					<select>
						<option>Tăng dần</option>
						<option>Giảm dần</option>
					</select>
				</div>	
				<div class="col-md-4 col-sm-4" style="padding: 8px;">
					Đánh giá:
					<select>
						<option>Tăng dần</option>
						<option>Giảm dần</option>
					</select>
				</div>	
			</div>					
		</div>	
	</div>


	<!-- List Result -->
	<div class="container">
		<!--Col 1 -->
		<div class="row list div-center" style="padding: 5px;">
			<div class="col-md-2 div-center" style="text-align: center;">
				<h4><?php echo $RESULT[0]->HX; ?></h4>
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>
					<h4><strong><?php echo $RESULT[0]->Gio;  ?></strong></h4>
					<p><?php echo $NoiDi; ?></p>
				</span>			
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>				
					<?php echo $RESULT[0]->DV;  ?>	
				</span>

			</div>
			<div class="col-md-2" style="text-align: center;">
				<div>
					<p><strong>Đánh Giá</strong></p>
				</div>
				<div>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
			</div>
			<div class="col-md-2" style="text-align: center;">
				<span>
					<h4><?php echo $RESULT[0]->Gia; ?></h4>
					VNĐ
				</span>
			</div>
			<div class="col-md-2 div-center">
				<button type="button" class="btn btn-primary">Liên Hệ</button>
			</div>
		</div>
		<!-- Col 2-->
		<div class="row list div-center" style="padding: 5px;"\>
			<div class="col-md-2 div-center" style="text-align: center;">
				<h4>Phương Trang</h4>
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>
					<h4><strong>14h30</strong></h4>
					<p>Hà Nội</p>
				</span>			
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>				
					<p>Giường nằm 45 chỗ</p>
					<p>Wifi-free</p>	
				</span>

			</div>
			<div class="col-md-2" style="text-align: center;">
				<div>
					<p><strong>Đánh Giá</strong></p>
				</div>
				<div>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
			</div>
			<div class="col-md-2" style="text-align: center;">
				<span>
					<h4>825000</h4>
					VNĐ
				</span>
			</div>
			<div class="col-md-2 div-center">
				<button type="button" class="btn btn-primary">Liên Hệ</button>
			</div>
		</div>
		<!-- Col 3-->
		<div class="row list div-center" style="padding: 5px;">
			<div class="col-md-2 div-center" style="text-align: center;">
				<h4>Hoàng Long</h4>
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>
					<h4><strong>13h30</strong></h4>
					<p>Hà Nội</p>
				</span>			
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>				
					<p>Giường nằm 45 chỗ</p>
					<p>Wifi-free</p>	
				</span>

			</div>
			<div class="col-md-2" style="text-align: center;">
				<div>
					<p><strong>Đánh Giá</strong></p>
				</div>
				<div>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
				</div>
			</div>
			<div class="col-md-2" style="text-align: center;">
				<span>
					<h4>835000</h4>
					VNĐ
				</span>
			</div>
			<div class="col-md-2 div-center">
				<button type="button" class="btn btn-primary">Liên Hệ</button>
			</div>
		</div>
		<!-- Col 4-->
		<div class="row list div-center" style="padding: 5px;">
			<div class="col-md-2 div-center" style="text-align: center;">
				<h4>Sao Việt</h4>
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>
					<h4><strong>15h30</strong></h4>
					<p>Hà Nội</p>
				</span>			
			</div>
			<div class="col-md-2 div-center" style="text-align: center;">
				<span>				
					<p>Giường nằm 45 chỗ</p>
					<p>Wifi-free</p>	
				</span>

			</div>
			<div class="col-md-2" style="text-align: center;">
				<div>
					<p><strong>Đánh Giá</strong></p>
				</div>
				<div>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
			</div>
			<div class="col-md-2" style="text-align: center;">
				<span>
					<h4>855000</h4>
					VNĐ
				</span>
			</div>
			<div class="col-md-2 div-center">
				<button type="button" class="btn btn-primary">Liên Hệ</button>
			</div>
		</div>
	</div>

	<!-- Thông tin tuyến đường-->
	<div class="container" style="margin-top: 10px; padding: 5px;">
		<div class="col-md-12" style="text-align: center; margin-bottom: 10px;">
			<h4>Thông tin tuyến đi Hà Nội - Hồ Chí Minh</h4>
		</div>
		<div class="row col-md-12">
			<div class="col-md-6" style="text-align: center;">
				<table style="width: 100%">
					<tr>
						<th>
							<h5><strong>Thông tin tuyến đi</strong></h5>
						</th>
					</tr>
					<tr>
						<td style="float:  left;">
							<span>Chiều dài tuyến đường:</span>						
						</td>
						<td style="float:  right;">
							<span><strong>1552 km</strong></span>
						</td>
					</tr>
					<tr>
						<td style="float:  left;">
							<span>Thời gian di chuyển:</span>						
						</td>
						<td style="float:  right;">
							<span><strong>36 giờ</strong></span>
						</td>
					</tr>
					<tr>
						<td style="float:  left;">
							<span>Số lượng chuyến xe:</span>						
						</td>
						<td style="float:  right;">
							<span><strong>28 chuyến</strong></span>
						</td>						
					</tr>
					<tr>
						<td style="float:  left;">
							<span>Số lượng nhà xe:</span>						
						</td>
						<td style="float:  right;">
							<span><strong>17 nhà xe</strong></span>
						</td>						
					</tr>
				</table>
			</div>

			<div class="col-md-6" style="text-align: center;">
				<div style="padding-bottom: 5px;">
					<h5><strong>Các hãng xe có cùng tuyến đi</strong></h5>				
				</div>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active row">							
							<img style="width:523px; ;height:185px;" class="d-block img-fluid" src="img/hoanglong1.jpg" alt="First slide">							
							<div id="carousel-line" class="col-md-12">
								<a id="unline_a" href=""><p><strong>Hoàng Long</strong></p></a>							
							</div>
						</div>
						<div class="carousel-item row">
							<img style="width:523px;height:185px;" class="d-block img-fluid" src="img/mailinh.jpg" alt="Second slide">
							<div id="carousel-line" class="col-md-12">
								<a id="unline_a" href=""><p><strong>Mai Linh</strong></p></a>	
							</div>
						</div>
						<div class="carousel-item row">
							<img style="width:523px;height:185px;" class="d-block img-fluid" src="img/phuongtrang.jpg" alt="Third slide">
							<div id="carousel-line" class="col-md-12">
								<a id="unline_a" href=""><p><strong>Phương trang</strong></p></a>	
							</div>
						</div>						
						<div class="carousel-item row">
							<img style="width:523px;height:185px;" class="d-block img-fluid" src="img/phuonghoang.jpg" alt="Third slide">
							<div id="carousel-line" class="col-md-12">
								<a id="unline_a" href=""><p><strong>Phượng Hoàng</strong></p></a>	
							</div>
						</div>					
					</div>
					<!-- Control-->
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
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

</body>

</html>