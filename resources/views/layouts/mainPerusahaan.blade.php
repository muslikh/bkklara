<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Kesiswaan') }}</title>
	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	

	<!-- <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"> -->
</head>
<body data-background-color="dark">
<div class="wrapper">

@include('layouts.header')
@include('layouts.sidebarPerusahaan')
@include('sweetalert::alert')
        <!-- Main content -->

		<div class="main-panel" >
			<div class="content" >
				<div class="page-inner">
					<div class="page-category">
                    

				        @yield('content')
					
						
                    </div>
				</div>
			</div>
		</div>
        <!-- end content -->



</div>
        <!-- end content -->

		@extends('layouts.footer')
    <!-- Scripts -->
    

    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/core/popper.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    	<!-- jQuery UI -->
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
	<!-- Datatables -->
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	<!-- <script src="{{ asset('js/app.js') }}"></script> -->
	<!-- <script src="{{ asset('assets/js/demo.js') }}"></script> -->

</script>
</body>
</html>
