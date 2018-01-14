@extends('layouts.app')
@include('layouts.nav')

@section('content')
<div class="container" style="margin-top: 8rem">
    <div class="card" style="width: 28rem; margin: auto;">
        <div class="card-body">

            <!--Header-->
            <div class="form-header default-color">
                <h3><i class="fa fa-lock"></i> Đăng nhập</h3>
            </div>
            
            <!--Body-->
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="defaultForm-email">Email</label>
                </div>

                <div class="md-form {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" class="form-control" name="password">
                    <label for="defaultForm-pass">Mật khẩu</label>
                </div>

                <div class="md-form">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="text-center" style="margin-top: 1rem">
                    <button class="btn btn-default waves-effect waves-light">Đăng nhập</button>
                </div>
                
                <!--Footer-->
                <div class="modal-footer" style="margin-top: 1rem">
                    <div class="options">
                        <a href=""{{ route('password.request') }}">Quên mật khẩu?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
