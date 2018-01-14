<nav class="mb-1 navbar navbar-expand-lg navbar-dark cyan fixed-top">
    <a class="navbar-brand" href="{{ route('index') }}">VNTransport</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="navbarSupportedContent-4" style="">
        <ul class="navbar-nav ml-auto">
            @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Đăng nhập </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Đăng kí</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4" style="position: absolute;">
                    <a class="dropdown-item waves-effect waves-light" href="{{ route('my_account') }}"> Tài khoản </a>
                    <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Đăng xuất </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>