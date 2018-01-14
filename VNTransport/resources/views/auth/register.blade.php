@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container" style="margin-top: 8rem">
    <div class="card" style="width: 28rem; margin: auto;">
        <div class="card-body">

            <!--Header-->
            <div class="form-header default-color">
                <h3>Đăng kí</h3>
            </div>

            <!--Body-->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="md-form {{ $errors->has('name') ? ' has-error' : '' }}">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    <label for="name">Tên</label>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                    <label for="email">Địa chỉ email</label>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="md-form {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" name="password" class="form-control">
                    <label for="password">Mật khẩu</label>
                    
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="md-form">
                    <i class="fa fa-repeat prefix grey-text"></i>
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control">
                    <label for="password-confirm">Nhập lại mật khẩu</label>
                </div>

                <div class="text-center">
                    <button class="btn btn-default waves-effect waves-light" type="submit">Đăng kí</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
