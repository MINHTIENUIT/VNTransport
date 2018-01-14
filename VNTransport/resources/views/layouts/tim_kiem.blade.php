<div class="card" style="margin-top: 8rem">
	<div class="card-body">

		<!--Header-->
		<div class="form-header default-color h4-responsive wow fadeIn" data-wow-delay="0.2s">
			<h4> Bạn muốn đi đến đâu?</h4>
		</div>

		<div class="wow fadeIn flex-row" data-wow-delay="0.4s">
			<form action="{{ route('ket_qua_tim_kiem') }}" method="post">
				<div class="row container-fluid">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="md-form col-md-5 col-sm-12">
						<input type="search" id="form-autocomplete1" class="form-control mdb-autocomplete" name="txtNoiDi">
						<button class="mdb-autocomplete-clear">
							<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
								<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
								<path d="M0 0h24v24H0z" fill="none" />
							</svg>
						</button>
						<label for="form-autocomplete" class="active">Nơi đi</label>
					</div>
					<div class="md-form col-md-5 col-sm-12">
						<input type="search" id="form-autocomplete2" class="form-control mdb-autocomplete" name="txtNoiDen">
						<button class="mdb-autocomplete-clear">
							<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
								<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
								<path d="M0 0h24v24H0z" fill="none" />
							</svg>
						</button>
						<label for="form-autocomplete" class="active">Nơi đến</label>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="md-form">
							<button class="btn btn-lg btn-dark-green">Tìm vé</button>
						</div>
					</div>
				</div>       
			</div>                     
		</form>
	</div>
</div>