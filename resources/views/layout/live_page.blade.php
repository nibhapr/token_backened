<!DOCTYPE html>
<html class="loading" data-textdirection="{{\App::currentLocale() == 'sa' ? 'rtl' : 'ltr'}}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @if(Route::current()->getName() == 'issue_token')
  <title>Kiosk</title>
  @elseif(Route::current()->getName() == 'display')
  <title>Display</title>
  @else
  <title>Digiimpact</title>
  @endif
  <link rel="apple-touch-icon" href="{{asset('app-assets/images/icon/favicon.ico')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/icon/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
   @if(\App::currentLocale() == 'sa')
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/style-rtl.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/vertical-dark-menu-template/materialize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/vertical-dark-menu-template/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/loader/main.css')}}">
  @else
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-dark-menu-template/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/loader/main.css')}}">
  @endif
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/loader/normalize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  @yield('css')
 
</head>
<body id="page-layout-body" class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns ">

@yield('content')
@yield('b-js')
<script src="{{asset('app-assets/js/loader/modernizr-2.6.2.min.js')}}"></script>
  <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>
  <script src="{{asset('app-assets/js/plugins.js')}}"></script>
  <script src="{{asset('app-assets/js/voice.js')}}"></script>
  <script src="{{asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

</body>


</html>    