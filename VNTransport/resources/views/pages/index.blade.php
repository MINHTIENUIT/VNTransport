@extends('layouts.app')

@section('content')

@include('layouts.nav')
<!-- Main container-->
<div class="container">
	@include('layouts.tim_kiem')

	<div class="divider-new pt-5">
		<h2 class="h2-responsive wow fadeIn" data-wow-delay="0.2s">Về chúng tôi</h2>
	</div>

	<!--Section: About-->
	<section id="about" class="text-center wow fadeIn" data-wow-delay="0.2s">

		<p>VNTransport cung cấp cho bạn các thông tin về các chuyến xe nhanh chóng và chính xác nhất.</p>

	</section>
	<!--Section: About-->

	<div class="divider-new">
		<h2 class="h2-responsive wow fadeIn">Các tuyến đường phổ biến</h2>
	</div>

	<!--Section: The popular routes-->
	<ul class="nav nav-tabs nav-justified bd-masthead" style="padding: 8px;">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><h4>Sài Gòn</h4></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><h4>Hà Nội</h4></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#panel3" role="tab"><h4>Đà Nẵng</h4></a>
		</li>
	</ul>

	<!-- Tab panels -->
	<div class="tab-content card wow fadeIn" ata-wow-delay="0.2s">
		<!--Panel 1-->
		<div class="tab-pane fade in show active" id="panel1" role="tabpanel">
			<br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Nơi đến</h4>
						</th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Giá vé</h4>
						</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>1</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Hà Nội</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>900.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>2</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Đà Lạt</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>150.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>

					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>3</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Nha Trang</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>180.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<!--/.Panel 1-->

		<!--Panel 2-->
		<div class="tab-pane fade" id="panel2" role="tabpanel">
			<br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Nơi đến</h4>
						</th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Giá vé</h4>
						</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>1</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Sài Gòn</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>900.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>2</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Sapa</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>260.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>

					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>3</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Lào Cai</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>230.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<!--/.Panel 2-->

		<!--Panel 3-->
		<div class="tab-pane fade" id="panel3" role="tabpanel">
			<br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Nơi đến</h4>
						</th>
						<th style="text-align: center; vertical-align: middle;">
							<h4>Giá vé</h4>
						</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>1</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Thái Bình </h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>360.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>2</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Tân Kỳ</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>250.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>

					<tr>
						<th scope="row" style="text-align: center; vertical-align: middle;">
							<h4>3</h4>
						</th>
						<td style="text-align: center; vertical-align: middle;">
							<h4>Hội An</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<h4>89.000 ₫/vé</h4>
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<button type="button" class="btn btn-dark-green" style="border-radius: 8px;">
								Liên hệ
								<span class="fa fa-car" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<!--/.Panel 3-->
	</div>
	<!--Section: The popular routes-->

	<div class="divider-new pt-5">
		<h2 class="h2-responsive wow fadeIn">Hãng xe nổi tiếng</h2>
	</div>

	<!--Section: Best features-->
	<section id="best-features">

		<div class="row pt-3">

			<!--First columnn-->
			<div class="col-lg-4">
				<!--Card-->
				<div class="card wow fadeIn" data-wow-delay="0.2s">

					<!--Card image-->
					<img class="img-fluid" src="https://static.vexere.com/c/i/771/xe-hoang-long-VeXeRe-6Cyi46S-1000x600.jpg" alt="Card image cap">

					<!--Card content-->
					<div class="card-body">
						<!--Title-->
						<h4 class="card-title">Hoàng Long</h4>
						<!--Text-->
						<p class="card-text">Hãng xe Hoàng Long hay còn gọi là Hoàng Long Asia hoặc Hoàng Long Bus là một trong những thương hiệu xe chất lượng cao hàng đầu Việt Nam...</p>
						<a href="#" class="btn btn-info">Xem thêm</a>
					</div>

				</div>
				<!--/.Card-->
			</div>
			<!--First columnn-->

			<!--Second columnn-->
			<div class="col-lg-4">
				<!--Card-->
				<div class="card wow fadeIn" data-wow-delay="0.4s">

					<!--Card image-->
					<img class="img-fluid" src="https://static.vexere.com/c/i/11071/xe-phuong-trang-VeXeRe-Fl1H06u-1000x600.jpg" alt="Card image cap">

					<!--Card content-->
					<div class="card-body">
						<!--Title-->
						<h4 class="card-title">Phương Trang</h4>
						<!--Text-->
						<p class="card-text">Xe Phương Trang (còn gọi là Futa Phương Trang) đã ghi lại dấu ấn tốt đẹp trong lòng hành khách trong suốt 11 năm hình thành và phát triển...</p>
						<a href="#" class="btn btn-info">Xem thêm</a>
					</div>

				</div>
				<!--/.Card-->

			</div>
			<!--Second columnn-->

			<!--Third columnn-->
			<div class="col-lg-4 mb-4">
				<!--Card-->
				<div class="card wow fadeIn" data-wow-delay="0.6s">

					<!--Card image-->
					<img class="img-fluid" src="https://static.vexere.com/c/i/11072/xe-thanh-buoi-VeXeRe-Ww28JeD-1000x600.jpg">

					<!--Card content-->
					<div class="card-body">
						<!--Title-->
						<h4 class="card-title">Thành Bưởi</h4>
						<!--Text-->
						<p class="card-text">Thành Bưởi với lực lượng lao động khoảng 300 người; số lượng phương tiện vận chuyển khỏang 70 xe Hyundai Aero Space đời mới và sang trọng...</p>
						<a href="#" class="btn btn-info">Xem thêm</a>
					</div>

				</div>
				<!--/.Card-->
			</div>
			<!--Third columnn-->

		</div>

	</section>
	<!--/Section: Best features-->

</div>
<!--/ Main container-->

@include('layouts.footer')

@section('script')
<script type="text/javascript">
	var states = <?php echo json_encode($diaDiem); ?>;

	$('#form-autocomplete1').mdb_autocomplete({
		data: states
	});

	$('#form-autocomplete2').mdb_autocomplete({
		data: states
	});
</script>
@endsection

@endsection 