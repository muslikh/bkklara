<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
  
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
	
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


	<!-- <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"> -->
</head>
<body data-background-color="dark">
<div class="wrapper">

	<div class="main-header">

		@guest
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark3">
				
				<a href="#" class="logo">
					<img src="{{ asset('assets/img/sister.png') }}" alt="navbar brand" class="navbar-brand">
				</a>
			</div>
			<!-- End Logo Header -->
		@else
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark3">
				
				<a href="#" class="logo">
					<img src="{{ asset('assets/img/sister.png') }}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
		@endguest
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark3">

				<div class="container-fluid">
                
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						@guest
                            <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Hizrian</h4>
												<p class="text-muted">hello</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div> <!-- Authentication Links -->
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									</li>
								</div>
							</ul>
						</li>
                        @endguest
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
        </div>
        
		@guest

		@else
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2  bg-dark3">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Kepo
									<span class="user-level">Administrator</span>
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="home">
								<i class="fas fa-home"></i>
								<span>Beranda</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<!-- <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li> -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#master">
								<i class="fas fa-layer-group"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="master">
								<ul class="nav nav-collapse">
									<li class="active"> 
										<a class="klik-menu" id="datakelas">
											<span class="sub-item">Data Kelas</span>
										</a>
									</li>
									<li>
										<a class="klik-menu" id="datajurusan">
											<span class="sub-item">Data Jurusan</span>
										</a>
									</li>
									<li>
										<a class="klik-menu" id="mapel">
											<span class="sub-item">Data Mata Pelajaran</span>
										</a>
									</li>
									<li>
										<a class="klik-menu" id="jadwal">
											<span class="sub-item">Data Jadwal Pelajaran</span>
										</a>
									</li>
									<li>
										<a class="klik-menu" id="jadwalUjian" >
											<span class="sub-item">Data Jadwal Ujian</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#ppdb">
								<i class="fas fa-layer-group"></i>
								<p>Data PPDB</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="ppdb">
								<ul class="nav nav-collapse">
									<li>
										<a href="datappdb">
											<span class="sub-item">Data Siswa Baru</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Data Belum Daftar Ulang</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Data Tidak Diterima</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#siswa">
								<i class="fas fa-layer-group"></i>
								<p>Data Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="siswa">
								<ul class="nav nav-collapse">
									<li>
										<a href="datasiswa">
											<span class="sub-item">Data Siswa Aktif</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Data Mutasi Siswa</span>
										</a>
									</li>
									<li>
										<a href="kode_kelas=X_AK">
											<span class="sub-item">Data Kehadiran Siswa</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Data Alumni</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#guru">
								<i class="fas fa-layer-group"></i>
								<p>Data Guru </p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="guru">
								<ul class="nav nav-collapse">
									<li>
										<a href="#">
											<span class="sub-item">Data Guru </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">RPP Guru</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Rekap Kehadiran Guru</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="pengumuman" >
								<i class="fas fa-layer-group"></i>
								<p>Data Pengumuman </p>
							</ahref=>
						</li>	
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		@endguest
        <!-- Main content -->

		<div class="main-panel" >
			<div class="content" >
				<div class="page-inner">
					@guest
					
					@else
						<div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ul class="breadcrumbs">
								<li class="nav-home">
									<a href="#">
										<i class="flaticon-home"></i>
									</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li class="nav-item">
									<a href="#">Pages</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li class="nav-item">
									<a href="#">Starter Page</a>
								</li>
							</ul>
						</div>
					@endguest
					<div class="page-category">
                    

				        @yield('content')
					
						
                    </div>
				</div>
			</div>
			
			@guest
					<div class="copyright ml-auto">
						Copyright &copy 2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="###">Me</a>
					</div>
			@else
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
						</ul>
					</nav>

					<div class="copyright ml-auto">
					Copyright &copy 2020 Sistem Terpadu, made with <i class="fa fa-heart heart text-danger"></i> by <a href="###">Me</a>
					</div>
				</div>
			</footer>
			@endguest
		</div>
        <!-- end content -->


    </div>
    <!-- Scripts -->
    

    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
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
	<!-- <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script> -->
	
	<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('.klik-menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "datakelas"){
				$('.badan').load('datakelas');						
			}else if(menu == "mapel"){
				$('.badan').load('mapel');						
			}else if(menu == "home"){
				$('.badan').load('home');						
			}
		});
 
 
		// halaman yang di load default pertama kali
		// $('.badan').load('home');						
 
	}); -->
<!-- </script> -->

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
				
<script>
    $(document).ready(function(){
  $('.your-class').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
	//  rtl: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });
});
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
</script>

</body>
</html>
