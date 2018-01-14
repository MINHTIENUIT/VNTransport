<div id="sort_bar" style="background-color: #828078;">
	<!--Col 1 -->
	<div class = "row list vertical-center default-color" style="padding: 5px; color: white">
		<div class="col-md-2" style="text-align: center;">
			<h4><strong>Nhà Xe</strong></h4>
		</div>
		<div class="col-md-2" style="text-align: center;">
			<span>
				<h4><strong>Số tuyến</strong></h4>				
			</span>			
		</div>
		<div class="col-md-4" style="text-align: center;">
			<h4><strong>Dịch Vụ</strong></h4>
		</div>
		<div class="col-md-2" style="text-align: center;">
			<h4><strong>Giá Vé</strong></h4>
		</div>
		<div class="col-md-2" style="text-align: center;">
			<h4><strong>Liên Hệ</strong></h4>
		</div>		
	</div>
</div>

@section('script')
<script type="text/javascript">
	function getBrowserSize(){
		var w, h;

		if(typeof window.innerWidth != 'undefined')
		{
          w = window.innerWidth; //other browsers
          h = window.innerHeight;
      } 
      else if(typeof document.documentElement != 'undefined' && typeof  document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0) 
      {
          w =  document.documentElement.clientWidth; //IE
          h = document.documentElement.clientHeight;
      }
      else{
          w = document.body.clientWidth; //IE
          h = document.body.clientHeight;
      }
      return {'width':w, 'height': h};
  }  ;

  window.onresize = function(event) {
  	if(parseInt(getBrowserSize().width) < 800){
  		document.getElementById("sort_bar").style.display = "none";
  	} else{
  		document.getElementById("sort_bar").style.display = "block";
  	}
  };
</script>
@endsection