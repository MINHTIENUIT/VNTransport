@extends('layouts.app')

@section('content')	
@include('layouts.nav')
<div class="container">	
	@include('layouts.tim_kiem')
    <div style="text-align: center; margin-top:2rem; margin-bottom: 2rem">
        <h3>
            @php
                if($noiDen != NULL || $noiDen != NULL){
                    echo $noiDi->quan_huyen."-".$noiDi->tinh_tp." đi ".$noiDen->quan_huyen."-".$noiDen->tinh_tp;
                }            
            @endphp        
        </h3>
    </div>
    @include('layouts.sort_bar')
    @if (count($results) == 0)
    <h2>Tuyến đi không có xe nào</h2>
    @else
    @foreach($results as $result)
    @include('layouts.result',['result' => $result,'req' => $req])
    @endforeach	
    @endif
</div>	
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