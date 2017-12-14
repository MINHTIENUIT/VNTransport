<?php 
include 'Connect.php';
$email = 'hoanglong@gmail.com';
$result = mysqli_query($con,"SELECT * FROM businfo WHERE Email='$email'");
$result1 = mysqli_query($con,"SELECT * FROM pricetable WHERE Email='$email'");
$result2 = mysqli_query($con,"SELECT * FROM imagin WHERE ID=1");
$result3 = mysqli_query($con,"SELECT * FROM imagin WHERE Email='$email' AND ID >= 2");
$img = mysqli_fetch_object($result2);

$count = mysqli_query($con,"SELECT COUNT(*) as count FROM imagin;");
$row = mysqli_fetch_object($result);
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
	<!-- DatePicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css"/>	
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/comment.css">
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

</style>
</head>
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
					<li class="nav-item active">
						<a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Tin tức</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Liên hệ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Đăng kí</a>
					</li>

					<li class="nav-item">
						<?php if(isset($_COOKIE['username'])) { ?>
						<a id="logout" class="nav-link" href="#">Đăng Xuất</a>
						<?php }; ?>

						<?php if(!isset($_COOKIE['username'])) { ?>
						<!-- Button to open the modal login form -->
						<a class="nav-link" href="#" onclick="document.getElementById('login').style.display='block'">Đăng nhập</a>						
						
						<!-- The Modal -->
						<div id="login" class="modallogin" style="overflow: hidden;">
							<span onclick="document.getElementById('login').style.display='none'" 
							class="closelogin" title="Close Modal">&times;</span>

							<!-- Modal Content -->
							<div class="col-8" style="margin-right:auto; margin-left:auto;">							
								<form class="modallogin-content animatelogin" method="POST" action="check.php">
									<div class="imgcontainer">
										<img src="img/login.png" alt="Avatar" class="avatar">
									</div>

									<div class="container">
										<div style="margin-bottom: 5px;">
											<label style="margin: 0px;"><b>Username</b></label>
											<input type="text" placeholder="Enter Username" name="user" required>
										</div>
										
										<div>
											<label style="margin: 0px;"><b>Password</b></label>
											<input type="password" placeholder="Enter Password" name="pass" required>
										</div>
										

										<button type="submit">Login</button>
										
									</div>

									<div class="container" style="background-color:#f1f1f1">
										<button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
										<span class="psw">Forgot <a href="#" style="top: 6px;">password?</a></span>
									</div>
								</form>
							</div>							
						</div>
						<?php }; ?>
					</li>
					
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
					<img class="logo col-sm-12" src="<?php echo $row->Logo ?>" style="margin:auto; margin-top: 50px; margin-bottom: 20px;" align="left">
				</div>            

				<div class="row infomation col-sm-8" style="font-size: 150%;">
					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Tên nhà xe:</div>
					
					<div class="col-xs-12 col-sm-12 col-md-9"> <?php echo $row->BusName; ?> </div>
					<hr>	

					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Tên chủ xe:</div>
					<div class="col-xs-12 col-sm-12 col-md-9"><?php echo $row->OwnerName; ?></div>
					<hr>

					<hr>
					<div class="col-xs-12 col-sm-12 col-md-3">Dịch vụ:</div>
					<div class="col-xs-12 col-sm-12 col-md-9"><?php echo $row->Service; ?></div>
					<hr>

					<hr>
					<div class="col-xs-5 col-sm-12 col-md-3">Đánh giá:</div>  
					
					<div class="col-xs-12 col-sm-12 col-md-9">
						
						<?php for ($i=1; $i <= 5; $i++) { ?>

						<?php if ($i <= $row->Rating) { ?>
						<span class="fa fa-star checked"></span>
						<?php } ?>
						<?php if ($i > $row->Rating) { ?>
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
					<?php $dem = mysqli_fetch_object($count); ?>
					<?php while($temp <= $dem->count - 1){ ?>					
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
					
					<?php while($img2 = mysqli_fetch_object($result3)){ ?>
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



		<script src="vendor/transport.js"></script>
		<hr>                  
		<hr>		
		<div class="col-11" style="margin: auto; font-size: 150%;"> <?php echo $row->Info; ?> </div>
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
							<?php while($product = mysqli_fetch_object($result1)){ ?>
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
					<h1><small class="pull-right">45 comments</small> Comments </h1>
				</div> 
				<div class="comments-list">
					<div class="media">
						<p class="pull-right"><small>5 days ago</small></p>
						<a class="media-left" href="#">
							<img src="http://lorempixel.com/40/40/people/1/">
						</a>
						<div class="media-body">

							<h4 class="media-heading user_name">Baltej Singh</h4>
							Wow! this is really great.

							<p><small><a href="">Like</a> - <a href="">Share</a></small></p>
						</div>
					</div>
					<div class="media">
						<p class="pull-right"><small>5 days ago</small></p>
						<a class="media-left" href="#">
							<img src="http://lorempixel.com/40/40/people/2/">
						</a>
						<div class="media-body">

							<h4 class="media-heading user_name">Baltej Singh</h4>
							Wow! this is really great.

							<p><small><a href="">Like</a> - <a href="">Share</a></small></p>
						</div>
					</div>
					<div class="media">
						<p class="pull-right"><small>5 days ago</small></p>
						<a class="media-left" href="#">
							<img src="http://lorempixel.com/40/40/people/3/">
						</a>
						<div class="media-body">

							<h4 class="media-heading user_name">Baltej Singh</h4>
							Wow! this is really great.

							<p><small><a href="">Like</a> - <a href="">Share</a></small></p>
						</div>
					</div>
					<div class="media">
						<p class="pull-right"><small>5 days ago</small></p>
						<a class="media-left" href="#">
							<img src="http://lorempixel.com/40/40/people/4/">
						</a>
						<div class="media-body">

							<h4 class="media-heading user_name">Baltej Singh</h4>
							Wow! this is really great.

							<p><small><a href="">Like</a> - <a href="">Share</a></small></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
					<div class="panel-body">
						<textarea placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
						<form class="form-inline">
							<button class="btn btn-primary pull-right" type="button" style="width: 20%">Share</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Comment Box -->

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

    	<script type="text/javascript" src="js/index.js"></script>
    	<!-- JQuery -->
    	<script type="text/javascript" src="mdb/js/jquery-3.2.1.min.js"></script>
    	<!-- Bootstrap tooltips -->
    	<script type="text/javascript" src="mdb/js/popper.min.js"></script>
    	<!-- Bootstrap core JavaScript -->
    	<script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
    	<!-- MDB core JavaScript -->
    	<script type="text/javascript" src="mdb/js/mdb.min.js"></script>
    	<script type="text/javascript" src="js/pricetable.js"></script>
    	<script type="text/javascript" src="datepicker.js"></script>
    	<!-- Login Form -->
    	<script type="text/javascript" src="js/login.js"></script>
    	<!-- Include DatePicker -->
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    	<script type="text/javascript" src="js/logout.js"></script>
    	<script>
    		$(document).ready(function(){
				var date_input=$('button[name="date"]'); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				date_input.datepicker({
					format: 'dd/mm/yyyy',
					container: container,
					todayHighlight: true,
					autoclose: true,
				})
			})
		</script>

	</body>
	</html>
	?>