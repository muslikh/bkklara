
@extends('layouts.front')
@include('layouts.menufront')



@section('content')

@foreach($lowongandetail as $i => $data)

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Detail Lowongan</span></h2>
                <h3> {{$data->judul}}</h3>
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    

    <!-- artikel -->
    <div  class="basic-1">
        <div class="container">
                    <div class="card">

                    <!-- Details 2 -->
                    <div class="basic-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{ asset('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                {{-- <div class="col-lg-3">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col --> --}}
                                <div class="col-lg-8">
                                    <!-- <div class="text-container"> -->
                                        <span><b style="font-size: 24px;">{{ $data->judul }}</b></span><br>
                                            <a href="#"><b style="font-size: 16px;">{{ $data->perusahaan->nama }}</b></a><br>
                                                <span style="font-size: 15px;">{{ $data->perusahaan->tentang  }}</span>
                                        <ul class="list-unstyled li-space-lg">
                                            
                                            <p>
                                                <hr>
                                            <li class="media">
                                                <i class="fas fa-check"></i>  
                                                <div class="media-body"><b>Deskripsi Lowongan:</b></div>
                                            </li>
                                            <li class="media">
                                                    <div class="media-body">{{ $data->deskripsi }}</div>
                                            </li>
                                                
                                            <li class="media">
                                                <i class="fas fa-check"></i>  
                                                <div class="media-body"><b>Kompetensi Keahlian :</b></div>
                                            </li>
                                                
                                            <li class="media">
                                                @if($data->id_jurusan == 0 )
                                                <div class="media-body">Semua Kompetensi Keahlian</div>
                                                @else
                                                <div class="media-body">{{ $data->id_jurusan }}</div>
                                                @endif
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body"><b>Persyaratan :</b></div>
                                            </li>
                                            <li class="media">
                                                <div class="media-body">{!! nl2br(e($data->lain )) !!}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body"><b>Catatan :</b></div>
                                            </li>
                                            <li class="media">
                                                <div class="media-body">{!! nl2br(e($data->catatan )) !!}</div>
                                            </li>
                                        </ul>
                                    <i class="fas fa-calendar-check"></i> Dibuka Tanggal : {{ $data->buka }} |
                                    
                                    <i class="fas fa-calendar-check"></i> Ditutup Tanggal : {{ $data->tutup }} |
                                    <br>
                                </div>
                            </div> <!-- end of row -->
                        </div>  <!--end of container -->
                    </div> <!-- end of basic-2 -->
                    <!-- end of details 2 -->
                    <div class="card-footer text-right">
                        <!-- <a href="/kirimlamaran" class="btn btn-success">Kirim Lamaran</a> -->
                <a href="{{url('lowongan')}}" class="btn btn-primary"> Kembali</a>
                    </div>
                    </div><!-- end of card -->
        </div>    
     </div> <!--end artikel -->

@endforeach
@endsection