<div class="">
	<!--Col 1 -->
	<div class="row list vertical-center" style="padding: 5px; ">
		<div class="col-md-2" style="text-align: center;">
			<h4>
				@php
				echo $result->ten_nha_xe;
				@endphp				
			</h4>
		</div>
		<div class="col-md-2" style="text-align: center;">
			<span>
				<h4>
					<strong>
						@php
						echo $result->so_tuyen_di;
						@endphp					
					</strong>
				</h4>				
			</span>			
		</div>
		<div class="col-md-4" style="text-align: center;">
			<span>
				@php
				echo $result->dich_vu;
				@endphp				
				
			</span>

		</div>
		<div class="col-md-2" style="text-align: center;">
			<span>
				<h4>
					@php
					echo $result->gia."VNĐ";
					@endphp					
					
				</h4>				
			</span>
		</div>
		<div class="col-md-2" style="text-align: center;">
			<button type="button" class="btn btn-primary" onclick="location.href='{{route('chi_tiet_nha_xe',['id' => $result->id])}}'" >
				@php
				echo $result->dien_thoai;
				@endphp				
			</button>
		</div>
	</div>
</div>
<hr>