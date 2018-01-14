@extends('layouts.app')
@include('layouts.nav')

@section('content')

<div class="container" style="margin-top: 8rem">

	{{-- Thong tin tai khoan --}}
	<div class="row">
		<div class="col-md-4">
			<div class="card" style="margin: auto;">
				<div class="card-body">

					<!--Header-->
					<div class="form-header default-color">
						<h4>Thông tin tài khoản</h4>
					</div>

					<!--Body-->
					<form>
						{{ csrf_field() }}
						<div class="md-form {{ $errors->has('name') ? ' has-error' : '' }}">
							<i class="fa fa-user prefix grey-text"></i>
							<input type="text" id="name" name="name" class="form-control" value="{{ $user->name or '' }}" disabled required autofocus>
							<label for="name">Tên</label>
						</div>

						<div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
							<i class="fa fa-envelope prefix grey-text"></i>
							<input type="email" id="email" name="email" class="form-control" value="{{ $user->email or '' }}" disabled>
							<label for="email">Địa chỉ email</label>

							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>

						@if (isset($nhaxe))
						<div class="md-form">
							<a href="{{ route('chi_tiet_nha_xe', ['id'=>$nhaxe->id]) }}" class="btn btn-primary">Chi tiết nhà xe</a>
						</div>
						@endif
					</form>

				</div>
			</div>
		</div>
		{{-- End thong tin tai khoan --}}

		{{-- Thong tin nha xe --}}
		<div class="col-md-8">
			<div class="card" style="margin: auto;">
				<div class="card-body">

					<!--Header-->
					<div class="form-header default-color">
						<h4>Thông tin nhà xe</h4>
					</div>

					<!--Body-->
					@if (isset($nhaxe))
					<form action="{{ route('chinh_sua_nha_xe', ['id'=>$nhaxe->id]) }}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-12 col-md-offset-2 row wow fadeInUp">	
							<div class="col-md-6">
								<div class="md-form">
									<input type="text" id="formHangXe" class="form-control" name="HangXe" required="required" value="{{ $nhaxe->ten_nha_xe or ''}}"></input>
									<label for="formHangXe" >Hãng Xe</label>
								</div>
							</div>			
							<div class="col-md-6">
								<div class="md-form">
									<input type="text" id="formChuXe" class="form-control" name="ChuXe" required="required" value="{{ $nhaxe->ten_chu_xe or '' }}"></input>
									<label for="formChuXe" class="">Chủ Xe</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form">
									<input type="text" id="formDiaChi" class="form-control" name="DiaChi" required="required" value="{{ $nhaxe->dia_chi or '' }}"></input>
									<label for="formDiaChi" class="">Địa Chỉ</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="md-form">
									<input type="email" id="formEmail" class="form-control" name="Email" required="required" value="{{ $nhaxe->email or '' }}"></input>
									<label for="formEmail" class="">Email</label>
								</div>
							</div>	

							<div class="col-md-6">
								<div class="md-form">
									<input type="tel" id="formPhone" class="form-control" name="Phone" required="required" value="{{ $nhaxe->dien_thoai or ''}}"></input>
									<label for="formPhone" class="">Điện Thoại</label>
								</div>
							</div>							
							<div class="col-md-6" style="margin-top: 1rem; margin-bottom:1rem">
								<div class="file-field">
									<div class="btn btn-primary btn-sm">
										<span>Chọn file</span>
										<input type="file" name="imgFile" id="imgFile">
									</div>	
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload ảnh của bạn" required="required" value="{{ $nhaxe->link_anh or '' }}">
									</div>

									@if (isset($error))
									<p style="color: red"><b>{{ $error or '' }}</b></p>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<!--Basic textarea-->
								<div class="md-form">
									<textarea type="text" id="formThongTin" class="md-textarea flex-center" name="Info" required="required">{{ $nhaxe->thong_tin or ''}}</textarea>
									<label for="formThongTin">Thông Tin Giới Thiệu</label>
								</div>
							</div>
						</div>		
						<div class="col-md-12 text-center md-form wow fadeInUp">
							<input type="submit" name="submit" action="submit" value="Chỉnh sửa" class="btn btn-blue">
						</div>
					</form>
					
					@else 

					<div class="col-md-12 text-center md-form wow fadeInUp">
						<h4>Không tìm thấy thông tin nhà xe</h4>
					</div>

					<div class="col-md-12 text-center md-form wow fadeInUp">
						<a class="btn btn-blue" type="button" href="{{ url('dang_ki_nha_xe') }}">Thêm thông tin</a>
					</div>
					@endif
					
				</div>
			</div>
		</div>
	</div>
	{{-- End thong tin nha xe --}}

	{{-- Thong tin xe cua nha xe --}}
	<div class="row" style="margin-top: 4rem">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<!--Header-->
					<div class="form-header default-color">
						<h4>Danh sách xe</h4>
					</div>
					<a href="{{ route('dang_ki_xe', ['id'=>$nhaxe->id]) }}" type="button" class="btn btn-primary" style="margin-top: -1rem; margin-bottom: 1rem">Thêm xe</a>
					<!--Body-->
					@if (!isset($listxe))
					<h4>Không có xe</h4>
					@else

					<!--Table-->
					<table class="table">

						<!--Table head-->
						<thead class="default-color lighten-6" style="color: white">
							<tr>
								<th class="text-center"><h5><b>Tuyến đi</b></h5></th>
								<th class="text-center"><h5><b>Dịch vụ</b></h5></th>
								<th class="text-center"><h5><b>Giá</b></h5></th>
								<th class="text-center"><h5><b>Số tuyến đi</b></h5></th>
								<th class="text-center"><h5></h5></th>
								<th class="text-center"><h5></h5></th>
							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>
							@foreach ($listxe as $value)
							<tr>
								<td class="text-center"><h5>{{ $value->noidi_quan_huyen.', '.$value->noidi_tinh_tp.'-'.$value->noiden_quan_huyen.', '.$value->noiden_tinh_tp }}</h5></td>

								<td class="text-center"><h5>{{ $value->dich_vu }}</h5></td>

								<td class="text-center"><h5>{{ $value->gia_ve }} vnđ</h5></td>      

								<td class="text-center"><h5>{{$value->so_tuyen_di}} tuyến/ngày</h5></td>     

								<td class="text-center"><a href="" class="btn btn-primary">Chỉnh sửa</a></td> 

								<td class="text-center"><a href="" class="btn btn-primary">Xóa</a></td>              
							</tr>                    
							@endforeach
						</tbody>
						<!--Table body-->
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
	{{-- End thong tin xe cua nha xe --}}
</div>

@include('layouts.footer')

@endsection 

