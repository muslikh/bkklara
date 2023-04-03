@extends('layouts.front')

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
				<div	div class="row">
                    <div class="col-lg-6">
                        <div class="text-container"> 

                            <h1><span class="turquoise">BURSA KERJA KHUSUS</span> ONLINE</h1>
							<p class="p-large">Bursa Kerja Khusus SMK N 1 PRIGEN</p>
							Temukan Karirmu, Gemilang Masa Depanmu
							<p>
								<b> </b> pengguna aktif, 
								<b> </b> lowongan, dan 
								<b> </b> partner perusahaan 
								</p>
                            <a class="btn-solid-lg page-scroll" href="#tentang">Bursa Kerja Khusus Itu Apa ??</a>
                            <a class="btn-solid-lg page-scroll" href="{{ URL::route('lowongan') }}">Cari Lowongan ??</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{ asset('frontpage/images/header-teamwork.svg')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

@section('content')

    <!-- tentang -->
    <div id="tentang" class="cards-1">
            <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Bursa Kerja Khusus Itu Apa ?? </h2>
                        <p>Bursa Kerja Khusus (BKK) adalah 
                            sebuah lembaga yang dibentuk di SMK NEGERI 1 PRIGEN, 
                            sebagai unit pelaksana yang memberikan pelayanan 
                            dan informasi lowongan kerja, pelaksana pemasaran, penyaluran 
                            dan penempatan tenaga kerja, merupakan mitra Dinas Tenaga Kerja dan Transmigrasi.
                        </p>
                        <a class="btn-solid-reg page-scroll" href="#services">Layanan Kami</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-1-office-worker.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->
    </div>         

    <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>YANG BISA KAMU LAKUKAN DI BKK ONLINE</h2>
                    <p class="p-heading p-large">Berbagai fitur kami kembangkan untuk kemudahan anak bangsa dalam mengembangkan dan menemukan karir mereka</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{asset('frontpage/images/services-icon-1.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">LAMARAN ONLINE</h4>
                            <p>Cari lowongan sesuai dengan minat dan keahlianmu, dan daftar lowongan hanya dengan sekali klik.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{asset('frontpage/images/services-icon-2.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">BUAT CV OTOMATIS</h4>
                            <p>Lengkapi informasi profilmu, dan unduh Curiculum Vitae-mu secara otomatis.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{asset('frontpage/images/services-icon-3.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">PANTAU LAMARAN</h4>
                            <p>Lihat dalam riwayat lamaranmu, dan pantau lamaranmu hanya dalam sekali klik.</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->

	

    <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Daftar akun gratis</h2>
                        <p>
                            Kamu dapat mendaftarkan akunmu melalui menu <b>Alumni</b> Diatas. 
                            Dengan mendaftarkan akun, telah mendownload aplikasi versi android, 
                            Kemudian melakukan login pada aplikasi,
                            kamu akan selalu mendapat notifikasi berupa informasi dan lowongan terbaru,
                            mupun notofikasi mengenai status lamaranmu.
                        </p>
                        <!-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a> -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-1-office-worker.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->

    

    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Lengkapi datamu, dapatkan fitur lengkap dari kami</h2>
                        <p>
                            Cukup dengan melengkapi datamu, kamu akan mendapatkan 
                            fitur lengkap dari Kami. 
                            Seperti mengunduh CV kamu secara otomatis, dll.
                            Jangan khawatir, data kamu aman dengan sistem keamanan.
                        </p>
                        <!-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a> -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    
    <!-- Details 3 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Jobmatching yang siap membantumu selalu terkoneksi dengan lowongan yang pas!</h2>
                        <p>
                        Dengan parameter data profil kamu, 
                        Aplikasi Kami akan secara otomatis menampilkan lowongan di portal kamu, 
                        dengan lowngan yang persona dan kualifikasinya cocok dengan data profil kamu.
                         Seperti jurusan, tinggi badan dll.
                        </p>
                        <!-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a> -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-1-office-worker.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 3 -->

    
    
    <!-- Details 4 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>CV Otomatis </h2>
                        <p>
                            Dengan melengkapi informasi profil, 
                            kamu akan mendapatkan CV otomatis yang bisa kamu cetak 
                            dan kamu gunakan guna mendukung cemerlangnya masa depan karir kamu
                        </p>
                        <!-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a> -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 4 -->

    

    <!-- About -->
    <div id="about" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tim BKK SMKN 1 Prigen</h2>
                    <p class="p-heading p-large">
                        
                    </p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{asset('frontpage/images/team-member-1.svg')}}" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                        <p class="p-large"><strong>....</strong></p>
                        <p class="job-title">.....</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{asset('frontpage/images/team-member-2.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>.....</strong></p>
                        <p class="job-title">....</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{asset('frontpage/images/team-member-3.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>.....</strong></p>
                        <p class="job-title">.....</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{asset('frontpage/images/team-member-4.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>......</strong></p>
                        <p class="job-title">......</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of about -->


@endsection
