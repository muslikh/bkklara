

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="{{ asset('assets/img/sister.png') }}"  alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route('index') }}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route('lowongan') }}">Lowongan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route('perusahaan') }}">Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ URL::route('artikel') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::route('info') }}">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Bantuan</a>
                </li>
                
                @if(Auth::guard('siswa')->check())

                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('home') }}">Dashboard</a>
                </li>

                @elseif(Auth::guard('alumni')->check())

                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('alumni') }}">Dashboard</a>
                </li>
                
                @elseif(Auth::guard('mitra')->check())

                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('mitra') }}">Dashboard</a>
                </li>

                @elseif(Auth::guard('siswa')->check())

                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('siswa') }}">Dashboard</a>
                </li>

                @elseif(\Route::current()->getName() != 'index')

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Masuk</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item popup-with-move-anim" href="#alumni"><span class="item-text">Alumni</span></a> --}}
                        <a class="dropdown-item" href="{{ url('login/mitra') }}"><span class="item-text">Perusahaan</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('login/alumni') }}"><span class="item-text">Alumni</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('login/siswa') }}"><span class="item-text">Siswa</span></a>
                    </div>
                </li> 
                <!-- end of dropdown menu -->


                @else

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Masuk</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item popup-with-move-anim" href="#alumni"><span class="item-text">Alumni</span></a> --}}
                        <a class="dropdown-item" href="{{ url('login/mitra') }}"><span class="item-text">Perusahaan</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('login/alumni') }}"><span class="item-text">Alumni</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('login/siswa') }}"><span class="item-text">Siswa</span></a>
                    </div>
                </li> 
                <!-- end of dropdown menu -->

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Register</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item popup-with-move-anim" href="#alumni"><span class="item-text">Alumni</span></a> --}}
                        <a class="dropdown-item" href="{{ url('register/alumni') }}"><span class="item-text">Register Alumni</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('register/mitra') }}"><span class="item-text">Register Mitra</span></a>
                        {{-- <div class="dropdown-items-divide-hr"></div> --}}
                        {{-- <a class="dropdown-item" href="{{ url('register/alumni') }}"><span class="item-text">Register Sis</span></a> --}}
                    </div>
                </li> 
                <!-- end of dropdown menu -->
                @endif

{{-- 
            @if(Request::is('register/*')))

            @else --}}
            {{-- @endif --}}
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
									