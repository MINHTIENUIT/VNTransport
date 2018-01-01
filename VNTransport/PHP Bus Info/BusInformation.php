<?php 
include 'Connect.php';
$email = 'hoanglong@gmail.com';
$result_info = mysqli_query($con,"SELECT * FROM businfo WHERE Email='$email'");
$result_price = mysqli_query($con,"SELECT * FROM pricetable WHERE Email='$email'");
$result_carousel_start = mysqli_query($con,"SELECT * FROM imagin WHERE ID=1");
$result_carousel = mysqli_query($con,"SELECT * FROM imagin WHERE Email='$email' AND ID >= 2");
$result_cmt = mysqli_query($con,"SELECT * FROM cmt ORDER BY ID ASC");

$img = mysqli_fetch_object($result_carousel_start);

$count_carousel = mysqli_query($con,"SELECT COUNT(*) as count_carousel FROM imagin;");
$count_cmt = mysqli_query($con,"SELECT COUNT(*) as count_cmt FROM cmt;");
$info = mysqli_fetch_object($result_info);
$temp = 1;

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
						<a class="nav-link" style="width:auto;" data-toggle="dropdown">Khánh hàng</a>
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
							<form class="modalsignup-content animatelogin">
								<div class="container">
									<div class="imgcontainer">
										<img src="img/login.png" alt="Avatar" class="avatar">
									</div>
									<label><b>Email</b></label>
									<input type="text" placeholder="Enter Email" name="email" required>

									<label><b>Password</b></label>
									<input type="password" placeholder="Enter Password" name="psw" required>

									<label><b>Repeat Password</b></label>
									<input type="password" placeholder="Repeat Password" name="psw-repeat" required>

									<div class="clearfix">
										<button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
										<button type="submit" class="signupbtn">Sign Up</button>
									</div>										
								</div>
							</form>
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


	<!-- Page Content -->
	<main class="bd-masthead" style="background-image: none; padding-bottom: 0px;">
		<div class="span3">
			<div class="well">

				<div class="col-12">
					<h2 class="text-info" align="middle">Thông tin xe khách</h2>
				</div>          

				<div class="col-sm-4">
					<img class="logo col-sm-12" src="<?php echo $info->Logo ?>" style="margin:auto; margin-top: 50px; margin-bottom: 20px;" align="left">
				</div>            

				<div class="row infomation col-sm-8" style="font-size: 150%;">
					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Tên nhà xe:</div>

					<div class="col-xs-12 col-sm-12 col-md-9"> <?php echo $info->BusName; ?> </div>
					<hr>	

					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Tên chủ xe:</div>
					<div class="col-xs-12 col-sm-12 col-md-9"><?php echo $info->OwnerName; ?></div>
					<hr>

					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Dịch vụ:</div>
					<div class="col-xs-12 col-sm-12 col-md-9"><?php echo $info->Service; ?></div>
					<hr>

					<hr>
					<div class="col-xs-5 col-sm-12 col-md-3">Đánh giá:</div>  

					<div class="col-xs-12 col-sm-12 col-md-9">

						<?php for ($i=1; $i <= 5; $i++) { ?>

						<?php if ($i <= $info->Rating) { ?>
						<span class="fa fa-star checked"></span>
						<?php } ?>
						<?php if ($i > $info->Rating) { ?>
						<span class="fa fa-star"></span>
						<?php } ?>
						<?php } ?>				

					</div>        
				</div>               

			</div> 
			<hr>
		</main>
		<!--Carousel Wrapper-->
		<div class="container" style="left:150px; right:150px;">
			<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" >
				<!--Indicators-->
				<ol class="carousel-indicators">					
					<li data-target="#carousel-example-1z" data-slide-to="1" class="active"></li>
					<?php $dem = mysqli_fetch_object($count_carousel); ?>
					<?php while($temp <= $dem->count_carousel - 1){ ?>					
					<li data-target="#carousel-example-1z" data-slide-to="<?php echo $temp ?>"></li>
					<?php $temp++ ?>
					<?php } ?>
				</ol>
				<!--/.Indicators-->
				<!--Slides-->
				<div class="carousel-inner" role="listbox">

					<div class="carousel-item active">						
						<img class="d-block w-100" style="width:700px;height:500px;" src="<?php echo $img->Url; ?>">
					</div>

					<?php while($img2 = mysqli_fetch_object($result_carousel)){ ?>
					<!--First slide-->					
					<div class="carousel-item ">						
						<img class="d-block w-100" style="width:700px;height:500px;" src="<?php echo $img2->Url; ?>">
					</div>
					<!--/First slide-->
					<?php } ?>
				</div>
				<!--/.Slides-->
				<!--Controls-->
				<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<!--/.Controls-->
			</div>
		</div>		
		<!--/.Carousel Wrapper-->
		<hr>                  
		<hr>		
		<div class="col-11" style="margin: auto; font-size: 150%;"> <?php echo $info->Info; ?> </div>
		<hr>              
		<div class="container">
			<div class="row">      
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Bảng Giá</h3>
							<div class="pull-right">
								<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
									<i class="glyphicon glyphicon-filter"></i>
								</span>
							</div>
						</div>
					<!--<div class="panel-body">
						<input type="text" class="form-control" id="task-table-filter" data-action="filter" data-filters="#task-table" placeholder="Lọc kết quả" />
					</div>-->
					<table class="table table-hover" id="task-table">

						<thead>
							<tr>
								<th>STT</th>
								<th>Tuyến Đường</th>
								<th>Loại xe</th>
								<th>Số chuyến</th>
								<th>Giá vé</th>									
							</tr>
						</thead>
						<?php while($product = mysqli_fetch_object($result_price)){ ?>
						<tbody>
							
							<tr>
								<td><?php echo $product->ID; ?></td>
								<td><?php echo $product->Route; ?></td>
								<td><?php echo $product->BusType; ?></td>
								<td><?php echo $product->TripNum; ?> chuyến/ngày</td>
								<td><?php echo $product->Price; ?>đ</td>
								<td>			
									<button type="button" class="btn btn-dark-green waves-effect waves-light" style="border-radius: 8px;" id="date" name="date">
										Chọn ngày
									</button>			
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>


<!-- Comment Box -->
<div class="container">
	<div class="row">
		<div class="col-10">

			<div class="page-header">
				<?php $dem2 = mysqli_fetch_object($count_cmt);?>
				<h1><small class="pull-right"><?php echo $dem2->count_cmt ?> comments</small> Comments </h1>
			</div> 
			
			<div class="comments-list">
				<?php while($cmt = mysqli_fetch_object($result_cmt)){ ?>
				<form class="media" method="POST" action="delcmt.php">
					<img class="media-left" src="img/login.png">
					<div class="media-body" style="padding: 20px;">
						<?php if($cmt->username === $_COOKIE['username']) { ?>
						<div class="dropdown">
							<a class="pull-right" data-toggle="dropdown">...</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropitem" onclick="document.getElementById('edit_cmt').style.display='block'" style="width:auto;">Chỉnh Sửa</a>
								</li>
								<li>									
									<a class="dropitem" href='delcmt.php?del=<?php echo $cmt->ID; ?>' style="width:auto;">Delete</a>	
								</li>
							</ul>								
						</div>
						<?php } ?>
						<h1 class="media-heading user_name"><?php echo $cmt->username; ?></h1>
						<?php echo $cmt->content; ?>
						<?php echo $cmt->ID; ?>
					</div>
				</form>
				<!-- The Modal (contains the Edit comment form) -->
				<div id="edit_cmt" class="modals_edit_cmt" style="overflow: hidden;">
					<div class="col-md-8" style="margin-right:auto; margin-left:auto; margin-top: 200px;">	
						<form class="modals_edit_cmt-content animate_edit_cmt" method="POST" action="edit_cmt.php?IDcmt=<?php echo $cmt->ID; ?>">
							<div class="container">
								<textarea placeholder="<?php echo $cmt->ID ?>" class="pb-cmnt-textarea" name="edit_cmt_text"></textarea>
								<?php if(!isset($_COOKIE['username'])) { ?>
								<button class="btn btn-primary pull-right" type="button" style="width: 40%" onclick="document.getElementById('login').style.display='block'">Vui lòng đăng nhập để bình luận</button>
								<?php }; ?>
								<?php if(isset($_COOKIE['username'])) { ?>					
								<button type="submit" class="btn btn-primary pull-right" style="width: 50%">Bình Luận</button>
								<?php } ?>
								<button type="button" onclick="document.getElementById('edit_cmt').style.display='none'" class="cancelbtn">Cancel</button>		
							</div>
						</form>
					</div>
				</div>
				<?php } ?>
			</div>

		</div>
	</div>
	<!-- Comment Box -->

<div class="col-md-12 col-md-offset-3">
	<div class="panel panel-info">
		<div class="panel-body">
			<form class="form-inline" method="POST" action="cmt.php">
				<textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="cmt"></textarea>
				<?php if(!isset($_COOKIE['username'])) { ?>
				<button class="btn btn-primary pull-right" type="button" style="width: 40%" onclick="document.getElementById('login').style.display='block'">Vui lòng đăng nhập để bình luận</button>
				<?php }; ?>
				<?php if(isset($_COOKIE['username'])) { ?>									
				<button class="btn btn-primary pull-right" type="submit" style="width: 40%">Bình Luận</button>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>	

	<!--Footer-->
	<footer class="container-fluid">
		<div class="row" style="background-color: #26637f; color: white;">
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
	

</body>
</html>
?>