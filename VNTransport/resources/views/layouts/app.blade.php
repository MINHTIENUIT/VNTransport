<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'VNTransport') }}</title>

   <!-- Font Awesome -->
   <link rel="stylesheet"  type="text/css" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
   <!-- Material Design Bootstrap -->
   <link rel="stylesheet" type="text/css" href="{{asset('css/mdb.min.css')}}">
   <!-- Custom styles -->
   <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  
    @yield('css')
</head>
<body>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <!-- Animations init-->

    @yield('script')
</body>
</html>
