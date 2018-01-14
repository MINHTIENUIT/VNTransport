@extends('layouts.app')
@include('layouts.nav')

@section('content')

<div class="container">
	<div class="view flex-center container-fluid">
		<div class="row" style="padding-top: 50px;">
			<!-- Form đăng kí thông tin hãng xe -->			
			<div class="col-md-12" style="text-align: center;">
				<h1 class="h1-responsive wow fadeInUp title">Thông Tin Xe</h1>
			</div>
			<form action="{{ route('update_xe',['id' => $xe->id]) }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-md-12 col-md-offset-2 row wow fadeInUp">	
					<div class="col-md-6">
						<div class="md-form">
							<input type="number" id="formHangXe" class="form-control" name="so_tuyen_di" required="required" value="{{ $xe->so_tuyen_di or ''}}"></input>
							<label for="formHangXe" >Số tuyến đi trong ngày</label>
						</div>
					</div>			
					<div class="col-md-6">
						<div class="md-form">
							<input type="number" id="formChuXe" class="form-control" name="gia" required="required" value="{{$xe->gia_ve or '' }}"></input>
							<label for="formChuXe" class="">Giá</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="md-form">							
							<input type="text" id="formDiaChi" class="form-control" name="noi_di" required="required" value="{{ $xe->noidi_quan_huyen.'-'.$xe->noidi_tinh_tp}}" placeholder="VD: Thủ Đức-TP Hồ Chí Minh"></input>
							<label for="formDiaChi" class="">Nơi đi</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="md-form">
							<input type="text" id="formEmail" class="form-control" name="noi_den" required="required" value="{{ ($xe->noiden_quan_huyen.'-'.$xe->noiden_tinh_tp)}}" placeholder="VD: Phù Cát-Bình Định"></input>
							<label for="formEmail" class="">Nơi đến</label>
						</div>
					</div>	

					<div class="col-md-12">
						<div class="md-form">
							<input type="tel" id="formPhone" class="form-control" name="dich_vu" required="required" value="{{ $xe->dich_vu or ''}}"></input>
							<label for="formPhone" class="">Dịch vụ</label>
						</div>
					</div>
				</div>		
				<div class="col-md-12 text-center md-form wow fadeInUp">
					<input type="submit" name="submit" action="submit" value="Thêm xe" class="btn btn-blue">
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')

@endsection 