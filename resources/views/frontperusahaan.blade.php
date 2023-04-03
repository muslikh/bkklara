@extends('layouts.front')
@include('layouts.menufront')

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Data Mitra Perusahaan</span></h2>
                
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

@section('content')


@foreach($perusahaan as $i => $perusahaans)


    <!-- perusahaan -->
    <div  class="basic-1">
        <div class="container">
                    <div class="card">

                    <!-- Details 2 -->
                    <div class="basic-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-8">
                                    <!-- <div class="text-container"> -->
                                        <h3>{{ $perusahaans->nama }}</h3>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                {{-- <i class="fas fa-check"></i> --}}
                                                <div class="media-body">{{ $perusahaans->tentang }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i> 
                                                <div class="media-body">{{ $perusahaans->alamat }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $perusahaans->telepon }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $perusahaans->email }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $perusahaans->website }}</div>
                                            </li>
                                        </ul>
                                    {{-- <i class="fas fa-calendar-check"></i> Dibuka Tanggal :  |
                                    
                                    <i class="fas fa-calendar-check"></i> Ditutup Tanggal :  |
                                    
                                    <br>
                                        <a class="btn-solid-reg popup-with-move-anim" href="#detailLowongan">Lihat Detail</a> --}}
                                   <!-- </div>  end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div>  <!--end of container -->
                    </div> <!-- end of basic-2 -->
                    <!-- end of details 2 -->

                    </div><!-- end of card -->
        </div>    
     </div> <!--end perusahaan -->

@endforeach

@endsection