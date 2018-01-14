@extends('layouts.app')
@include('layouts.nav')

@section('content')

<div class="container">
	<div class="view flex-center container-fluid">
		<div class="row" style="padding-top: 100px; min-height: 678px;">
			<!-- Form đăng kí thông tin hãng xe -->			
			<div class="col-md-12" style="text-align: center;">
				<h1 class="h1-responsive wow fadeInUp title">Thông Tin Nhà Xe</h1>
			</div>
			<form action="{{ route('insert_nha_xe') }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-md-12 col-md-offset-2 row wow fadeInUp">	
					<div class="col-md-4">
						<div class="md-form">
							<input type="text" id="formHangXe" class="form-control" name="HangXe" required="required" value="{{ $HangXe or ''}}"></input>
							<label for="formHangXe" >Hãng Xe</label>
						</div>
					</div>			
					<div class="col-md-4">
						<div class="md-form">
							<input type="text" id="formChuXe" class="form-control" name="ChuXe" required="required" value="{{ $ChuXe or '' }}"></input>
							<label for="formChuXe" class="">Chủ Xe</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="md-form">
							<input type="text" id="formDiaChi" class="form-control" name="DiaChi" required="required" value="{{ $DiaChi or '' }}"></input>
							<label for="formDiaChi" class="">Địa Chỉ</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="md-form">
							<input type="email" id="formEmail" class="form-control" name="Email" required="required" value="{{ $Email or '' }}"></input>
							<label for="formEmail" class="">Email</label>
						</div>
					</div>	

					<div class="col-md-4">
						<div class="md-form">
							<input type="tel" id="formPhone" class="form-control" name="Phone" required="required" value="{{ $Phone or ''}}"></input>
							<label for="formPhone" class="">Điện Thoại</label>
						</div>
					</div>							
					<div class="col-md-4" style="margin-top: 1rem">
						<div class="file-field">
							<div class="btn btn-primary btn-sm">
								<span>Chọn file</span>
								<input type="file" name="imgFile" id="imgFile">
							</div>	
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload ảnh của bạn" required="required">
							</div>

							@if (isset($error))
							<p style="color: red"><b>{{$error or ''}}</b></p>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<!--Basic textarea-->
						<div class="md-form">
							<textarea type="text" id="formThongTin" class="md-textarea flex-center" name="Info" required="required">{{ $Info or ''}}</textarea>
							<label for="formThongTin">Thông Tin Giới Thiệu</label>
						</div>
					</div>
				</div>		
				<div class="col-md-12 text-center md-form wow fadeInUp">
					<input type="submit" name="submit" action="submit" value="Đăng Ký" class="btn btn-blue">
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')

@endsection 

