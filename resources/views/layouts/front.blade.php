<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />
					<!-- CSRF Token -->
					<meta name="csrf-token" content="{{ csrf_token() }}">
						<title>{{ config('app.name', 'Aplikasi Kesiswaan') }}</title>
						<!-- Fonts and icons -->

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('frontpage/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontpage/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontpage/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ asset('frontpage/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('frontpage/css/styles.css') }}" rel="stylesheet">
	
							
</head>	
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

	@include('layouts.menufront')	

	@yield('content')


    <!--  Lightboxes 1 -->
    <!--  alumni  -->
	<div id="alumni" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-lightbox-1.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Selamat Datang Alumni !!</h3>
                    <hr>
                    <h5>Yukk Daftarkan Dirimu Di Form Bawah Ini | 
                        <a class="btn-solid-reg" href="{{ url('login') }}">
                           <span class="item-text">Sudah Punya Akun</span>
                       </a></h5>
                       {{-- <a class="btn-solid-reg popup-with-move-anim" href="/login">
                          <span class="item-text">Sudah Punya Akun</span>
                      </a></h5> --}}
                    <form method="post">
                        <label >Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                        <!-- <label >Tempat Lahir :</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                        <label >Tanggal Lahir :</label>
                        <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control"> -->
                        <label >No Hp. :</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required>
                        <label >Alamat :</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                        <!-- <label >Jenis Kelamin :</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"> -->
                        <!-- <label >Tahun Lulus :</label>
                        <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control"> -->
                        <!-- <label >Tinggi Badan :</label>
                        <input type="text" name="tinggi" id="tinggi" class="form-control">
                        <label >Berat Badan :</label>
                        <input type="text" name="berat" id="berat" class="form-control"> -->
                        <label >Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <label >Username :</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label >Password :</label>
                        <input type="password" name="password" id="password" class="form-control" required>

                        <input type="submit" value="Daftar" class="btn-solid-reg ">
                        <a class="btn-outline-reg mfp-close as-button" href="#">Batal</a>
                    </form>
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 12-->

    <!--  Lightboxes 2-->
    <!--  perusahaan  -->
	<div id="perusahaan" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox-1.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Lengkapi datamu,dapatkan fitur lengkap dari kami</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>The emailing module basically will speed up your email marketing operations while offering more subscriber control.</p>
                    <p>Do you need to build lists for your email campaigns? It just got easier with Evolo.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->


    <!--  Lightboxes 3-->
    <!--  perusahaan  -->
	<div id="punyaakun" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-lightbox-2.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Sudah Punya Akun ??</h3>
                    <hr>
                    <p>
                        Jika Sudah Memiliki Akun Silahkan Download Aplikasi Versi Android Kami Di Bawah Ini
                        Kemudian Login Dan Lengkapi Data Diri Kamu Ya....
                    </p>
                    <a class="btn-solid-reg " href="#">Download</a>
                     <a class="btn-outline-reg mfp-close as-button" href="#">Batal</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 3 -->
    <!-- end of details lightboxes -->

                
	
@include('layouts.frontfooter')	

<script>
    var showPopup2 = false;
$('#alumni').on('hidden.bs.modal', function () {
    if (showPopup2) {
        $('#perusahaan').modal('show');
        showPopup2 = false;
    }
});

$("#perusahaan").click(function() {
    $('#alumni').modal('hide');
    showPopup2 = true;
});
</script>
    <!-- Scripts -->
    <script src="{{ asset('frontpage/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('frontpage/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ asset('frontpage/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('frontpage/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('frontpage/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('frontpage/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('frontpage/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ asset('frontpage/js/scripts.js') }}"></script> <!-- Custom scripts -->
																		
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
</script>
																	</body>
																</html>
