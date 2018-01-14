@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('css/chi_tiet_nha_xe.css') }}">

@endsection

@section('content')

@include('layouts.nav')

<main>
    @if (isset($id))
    {{$id}}   
    @else
    {{-- <h1>Khong co id</h1> --}}
    @endif
    <!--Main layout-->
    <div class="container">
        @include('layouts.tim_kiem')

        <div class="divider-new pt-5">
            <h2 class="h2-responsive wow fadeIn" data-wow-delay="0.2s">Thông tin nhà xe</h2>
        </div>
        <!--First row-->
        <div class="row wow fadeIn" data-wow-delay="0.2s">
            <div class="col-lg-7">
                <!--Featured image -->
                <div class="view overlay hm-white-light z-depth-1-half">
                    <img src="{{ url($nha_xe->link_anh) }}" class="img-fluid " alt="">
                    <div class="mask">
                    </div>
                </div>
                <br>
            </div>

            <!--Main information-->
            <div class="col-lg-5">
                <h2 class="h2-responsive font-bold">
                    @php
                    echo $nha_xe->ten_nha_xe;
                    @endphp
                </h2>
                <hr>

                <p style = "text-indent: 30px;" align = "justify">
                    @php
                    echo $nha_xe->thong_tin;
                    @endphp                    
                </p>

                <p>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <strong> Điện thoại:</strong>
                    @php
                    echo $nha_xe->dien_thoai;
                    @endphp
                    
                </p>

                <p>
                    <i class="fa fa-map-marker"></i> 
                    <strong> Trụ sở: </strong> 
                    @php
                    echo $nha_xe->dia_chi;
                    @endphp                    
                </p>
            </div>

        </div>

        <div class="divider-new pt-5">
            <h2 class="h2-responsive wow fadeIn" data-wow-delay="0.2s">Thông tin xe</h2>
        </div>
        
        <div class="d-flex justify-content-center row">
            <div id="table col-md-6" class="table-editable">
                @if (count($list_xe) == 0)
                <h3>Không có xe</h3>
                @else
                <table class="table table-bordered table-responsive table-striped text-center">
                    <tr>
                        <th class="text-center">Tuyến đi</th>
                        <th class="text-center">Dịch vụ</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số tuyến</th>
                    </tr>
                    @foreach ($list_xe as $key => $value)
                    <tr>
                        <td class="pt-3-half" contenteditable="false">
                            @php
                            echo  $value->noidi." - ".$value->noiden;
                            @endphp

                        </td>
                        <td class="pt-3-half" contenteditable="false">
                            @php
                            echo  $value->dich_vu;
                            @endphp                                
                        </td>
                        <td class="pt-3-half" contenteditable="false">
                            @php
                            echo  $value->gia_ve;
                            @endphp
                        </td>
                        <td class="pt-3-half" contenteditable="false">
                            @php
                            echo  $value->so_tuyen_di;
                            @endphp
                        </td>                       
                    </tr>                    
                    @endforeach  
                </table>
                @endif

                @if (!Auth::guest() && Auth::user()->id == $nha_xe->user_id)
                <div style=" text-align: center;">
                    <button type="button" class="btn btn-blue" onclick="location.href='{{route('dang_ki_xe',['id' => Auth::user()->id])}}'" action="submit">Thêm Xe</button>
                </div>
                @endif                
            </div>

            <div class="col-md-6">
                @if (Auth::guest()) 
                <div class="form-group basic-textarea rounded-corners shadow-textarea">
                    <form action="" method="">
                        <label for="exampleFormControlTextarea"><h3><b>Các bình luận</b></h3></label>
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea" rows="3" placeholder="Nhập bình luận của bạn ở đây..."></textarea>
                        <button type="button" disabled="true" class="btn btn-blue" action="submit">Đăng nhập để bình luận</button>
                    </form>
                </div>
                @else
                <div class="form-group basic-textarea rounded-corners shadow-textarea">
                    <form action="{{route('binh_luan',['id' => $nha_xe->id, 'user_id' => Auth::user()->id])}}" method="get">
                        <label for="exampleFormControlTextarea"><h3><b>Các bình luận</b></h3></label>
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea" rows="3" placeholder="Nhập bình luận của bạn ở đây..." name="noi_dung"></textarea>
                        <input type="submit" name="submit" value="Bình luận" class="btn btn-blue">
                    </form>
                </div>
                @endif

                
                @foreach($list_comment as $key => $value)
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 font-bold blue-text">
                            @php
                            echo $value->name
                            @endphp
                            </h5>
                            <p>
                            @php                            
                            $date = date_create($value->gio);
                            echo date_format($date, 'Y-m-d H:i:s');
                            @endphp
                        </p>
                        <p>
                           @php
                           echo $value->noi_dung; 
                           @endphp
                       </p>                            
                   </div>
               </div>    
               <hr>
               @endforeach             
           </div>
       </div>
       <!-- Editable table -->
   </div>
   <!--/.Main layout-->

</main>

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