<?php 
include 'Connect.php';

$BusName = 'hoang long';
$result_info = mysqli_query($con,"SELECT * FROM businfo WHERE BusName='$BusName'");
$result_price = mysqli_query($con,"SELECT * FROM pricetable WHERE BusName='$BusName'");
$result_carousel_start = mysqli_query($con,"SELECT * FROM imagin WHERE ID=1");
$result_carousel = mysqli_query($con,"SELECT * FROM imagin WHERE BusName='$BusName' AND ID >= 2");
$result_cmt = mysqli_query($con,"SELECT * FROM cmt ORDER BY ID ASC");

$img = mysqli_fetch_object($result_carousel_start);

$count_carousel = mysqli_query($con,"SELECT COUNT(*) as count_carousel FROM imagin;");
$count_cmt = mysqli_query($con,"SELECT COUNT(*) as count_cmt FROM cmt;");
$info = mysqli_fetch_object($result_info);
$temp = 1;
$test;
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
	<link rel="stylesheet" type="text/css" href="css/ratingstat.css">
	<link rel="stylesheet" type="text/css" href="css/businfo.css">

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/comment.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/dropdown.css">
	<link rel="stylesheet" type="text/css" href="css/edit_cmt.css">
	<style type="text/css">

	.navbar.navbar-light .breadcrumb .nav-item.active>.nav-link, .navbar.navbar-light .navbar-nav .nav-item.active>.nav-link {
		background-color: rgba(0,0,0,0);
		font-weight: bold;
	}
	.bd-masthead {
		padding: 8rem 4rem 4rem 4rem;
		text-align: center;
		background-image: -webkit-linear-gradient(135deg,#00567F,#26637F,#00ADFF);
		background-image: -o-linear-gradient(135deg,#00567F,#26637F,#00ADFF);
		background-image: linear-gradient(135deg,#00567F,#26637F,#00ADFF);
	}

	.div-center{
		display:flex;
		justify-content:center;
		align-items:center;
	}

	.div-right{
		display:flex;
		justify-content:
		flex-end;
		align-items:center;
	}

	.bd-footer a {
		font-weight: 500;
		color: white;
	}
	.bd-footer{
		bottom:0;
		width:100%;
		height:auto;   /* Height of the footer */
		background-color: #26637F;
		height: 50px;
		left: 0px;
		right: 0px;
		margin-bottom: 0px;
	}

	.text-muted {
		color: white!important;
	}

	body{
		min-width: 400px;
	}

	.border {
		border-color: #fff;
		border-radius: 8px;
		border-style: solid;
		padding: 8px;
	}

	.dropitem:hover{
		background-color: #a89c9c;
	}

	li:hover{
		background-color: #a89c9c;
	}

</style>
</head>

<body>

	<!-- Navigation Bar -->
	<header>

		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white scrolling-navbar">
			<a class="navbar-brand" href="#"><strong>VNTransport</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">

					<a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>

					<a class="nav-link" href="#">Tin tức</a>					

					<a class="nav-link" href="#">Liên hệ</a>

					<div class="dropdown">	
						<?php if(!isset($_COOKIE['username'])) { ?>				
						<a class="nav-link" style="width:auto;" data-toggle="dropdown">Hàng Khách</a>
						<?php } ?>
						<?php if(isset($_COOKIE['username'])) { ?>				
						<a class="nav-link" style="width:90px; height: 25px;" data-toggle="dropdown"><?php echo $_COOKIE['username']; ?></a>
						<?php } ?>
						<ul class="dropdown-menu">
							<li>
								<!-- Button to open the modal -->
								<a class="dropitem" onclick="document.getElementById('signup').style.display='block'" style="width:auto;">Đăng kí</a>	
							</li>
							<li>
								<!-- Button to open the modal -->
								<?php if(isset($_COOKIE['username'])) { ?>
								<a id="logout" class="dropitem" href="#">Đăng Xuất</a>
								<?php }; ?>

								<?php if(!isset($_COOKIE['username'])) { ?>
								<!-- Button to open the modal login form -->
								<a class="dropitem" href="#" onclick="document.getElementById('login').style.display='block'">Đăng nhập</a>
								<?php }; ?>
							</li>
						</ul>
					</div>

					<!-- The Modal (contains the Sign Up form) -->
					<div id="signup" class="modalsignup" style="overflow: hidden;">
						<div class="col-8" style="margin-right:auto; margin-left:auto;">	
							<div class="modalsignup-content animatelogin">
								<div class="container">
									<div class="imgcontainer">
										<img src="img/login.png" alt="Avatar" class="avatar">
									</div>
									<label><b>Email</b></label>
									<input type="text" placeholder="Enter Email" name="email" required>

									<label><b>UserName</b></label>
									<input id="testuser" type="text" placeholder="Enter UserName" name="test" required">

									<p style="color: red; padding-left: 20px;"><span id="txtHint"></span></p>  

									<label><b>Password</b></label>
									<input id="testpass" type="password" placeholder="Enter Password" name="psw" required>

									<label><b>Repeat Password</b></label>
									<input type="password" placeholder="Repeat Password" name="psw-repeat" required>

									<div class="clearfix">
										<button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
										<button class="signupbtn" onclick="showHint(document.getElementById('testuser').value,document.getElementById('testpass').value)">Sign Up</button>
									</div>										
								</div>
							</div>
						</div>
					</div>

					<!-- The Modal -->
					<div id="login" class="modallogin" style="overflow: hidden;">
						<!-- Modal Content -->
						<div class="col-8" style="margin-right:auto; margin-left:auto;">							
							<form class="modallogin-content animatelogin" action="check.php" method="POST">
								<div class="imgcontainer">
									<img src="img/login.png" alt="Avatar" class="avatar">
								</div>

								<div class="container">
									<div style="margin-bottom: 5px;">
										<label style="margin: 0px;"><b>Username</b></label>
										<input id="username" type="text" placeholder="Enter Username" name="user" required>
									</div>

									<div>
										<label style="margin: 0px;"><b>Password</b></label>
										<input id="password" type="password" placeholder="Enter Password" name="pass" required>
									</div>
									<h1 id="erro"></h1>

									<button id="submit" type="submit" onclick="showHint(username.value,password.value)" >Login</button>					
								</div>
								<div class="container clearfix" style="background-color:#f1f1f1">
									<button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
									<span class="psw">Forgot <a href="#" style="top: 6px;">password?</a></span>
								</div>
							</form>
						</div>							
					</div>


				</ul>
			</div>
		</nav>

	</header>
	<!-- Navigation Bar End -->
	<!--Section: About-->

	<div class="divider-new">
		<h2 class="h2-responsive wow fadeIn">Các tuyến đường phổ biến</h2>
	</div>
	<div class="container">
		<!--Section: The popular routes-->
		<ul class="nav nav-tabs nav-justified bd-masthead" style="padding: 8px;">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><h4>Thêm nhà xe</h4></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><h4>Sửa nhà xe</h4></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#panel3" role="tab"><h4>Thêm thông tin chuyến đi</h4></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#panel4" role="tab"><h4>Comment</h4></a>
			</li>
		</ul>

		<!-- Tab panels -->
		<div class="tab-content card wow fadeIn" ata-wow-delay="0.2s">
			<!--Panel 1-->
			<div class="tab-pane fade in show active" id="panel1" role="tabpanel" align="middle;">
				<br>
				<table class="table table-hover">
					<tbody>
						<form method="POST" action="">
							<tr>
								<span>Hãng xe: </span>
								<input id="name_hx" type="text" name="name_hx" placeholder="Nhập tên hãng xe" required/>
							</tr>
							<tr>
								<span>Chủ Xe: </span>
								<input id="name_cx" type="text" name="name_cx" placeholder="Nhập tên chủ xe" required />
							</tr>
							<tr>
								<span>Email: </span>
								<input id="email_hx" type="email" name="email" placeholder="Email hãng xe" required />
							</tr>
							<tr>
								<span>Điện Thoại: </span>
								<input id="phone_hx" type="tel" name="phone" placeholder="Điện Thoại" required />
							</tr>
							<tr>
								<span>Giới Thiệu :</span>
								<textarea id="info_hx" name="message" placeholder="Thông tin nhà xe" required></textarea>
							</tr>
							<tr>
								<div class="div-center">
								<input type="submit" class="button" value="Đăng kí" />
							</tr>	
							</form>
						</tbody>
					</table>
				</div>
				<!--/.Panel 1-->

				<!--Panel 2-->
				<div class="tab-pane fade" id="panel2" role="tabpanel">
					<br>
					<table class="table table-hover">
						<tbody>
							<form method="POST" action="">
								<input type="search" id="mySearch" placeholder="Nhập tên hãng xe">
								<button onclick="myFunction()">Try it</button>
							</form>
							<?php  ?>
							<form>
								<tr>
								<span>Hãng xe: </span>
								<input id="name_hx" type="text" name="name_hx" placeholder="Nhập tên hãng xe" required/>
							</tr>
							<tr>
								<span>Chủ Xe: </span>
								<input id="name_cx" type="text" name="name_cx" placeholder="Nhập tên chủ xe" required />
							</tr>
							<tr>
								<span>Email: </span>
								<input id="email_hx" type="email" name="email" placeholder="Email hãng xe" required />
							</tr>
							<tr>
								<span>Điện Thoại: </span>
								<input id="phone_hx" type="tel" name="phone" placeholder="Điện Thoại" required />
							</tr>
							<tr>
								<span>Giới Thiệu :</span>
								<textarea id="info_hx" name="message" placeholder="Thông tin nhà xe" required></textarea>
							</tr>
							</form>
						</tbody>
					</table>

				</div>
				<!--/.Panel 2-->

				<!--Panel 3-->
				<div class="tab-pane fade" id="panel3" role="tabpanel">
					<br>
					<table class="table table-hover">
						<tbody>	
						</tbody>
					</table>
				</div>
				<!--/.Panel 3-->

				<!--Panel 4-->
				<div class="tab-pane fade" id="panel4" role="tabpanel">
					<br>
					<table class="table table-hover">
						<tbody>	
						</tbody>
					</table>
				</div>
				<!--/.Panel 4-->
			</div>
		</div>

		<!--Footer-->
		<footer class="container-fluid">
			<div class="row" style="background-color: #26637f; color: white; margin-top: 50px;">
				<div class="col-md-12 div-center" style="font-weight: bold;">
					<span style="padding: 5px;">Bùi Hữu Phước</span>
					<span style="padding: 5px;">Văn Minh Tiến</span>
					<span style="padding: 5px;">Huỳnh Hữu Lợi</span>
				</div>
				<div class="col-md-12 div-center" style="padding: 5px;">
					© 2017 Copyright: &nbsp;<a style="color: white;" href="http://www.uit.edu.vn"> uit.edu.vn </a>
				</div>
			</div>
		</footer>
		<!--Copyright-->
		<!--/.Footer-->

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

	<!-- JQuery -->
	<script type="text/javascript" src="mdb/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="mdb/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="js/pricetable.js"></script>
	
	<!-- Login Form -->
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/logout.js"></script>
	<script type="text/javascript" src="js/signup.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/test.js"></script>

</body>
</html>
