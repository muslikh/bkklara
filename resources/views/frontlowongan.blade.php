@extends('layouts.front')
@include('layouts.menufront')

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Data Lowongan Yang Tersedia</span></h2>
                
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

@section('content')

@foreach($lowongan as $i => $lowongans)

    <!-- lowongan -->
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
                                        
                                        <h2>{{ $lowongans->judul }}</h2>
                                        <h4>{{ $lowongans->nama }}</h3>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                    <div class="media-body">{{ $lowongans->tentang }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $lowongans->alamat }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $lowongans->email }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $lowongans->website }}</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-check"></i>
                                                <div class="media-body">{{ $lowongans->deskripsi }}</div>
                                            </li>
                                        </ul>
                                    <i class="fas fa-calendar-check"></i> Dibuka Tanggal : {{ $lowongans->buka }} |
                                    
                                    <i class="fas fa-calendar-check"></i> Ditutup Tanggal : {{ $lowongans->tutup }} |
                                    
                                    Dilihat 2235 kali
                                    <br>
                                        <a class="btn-solid-reg " href="{{url('detaillowongan')}}/{{$lowongans->id_lowongan}}">Lihat Detail</a>
                                   <!-- </div>  end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div>  <!--end of container -->
                    </div> <!-- end of basic-2 -->
                    <!-- end of details 2 -->

                    </div><!-- end of card -->
        </div>    
     </div> <!--end lwongan -->

@endforeach

@endsection

{{-- 
    <!--  Lightboxes 1 -->
    <!--  alumni  -->
	<div id="detailLowongan" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>

                    
                    <form method="post"><div class="col-lg-3">
                        <div class="image-container">
                            <img class="img-fluid" src="{{('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-8">
                        <!-- <div class="text-container"> -->
                            <h2>{{ $lowongans->judul }}</h2>
                            <h3>{{ $lowongans->nama }}</h3>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">{{ $lowongans->id_jurusan }}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">{{ $lowongans->alamat }}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Kepo</div>
                                </li>
                            </ul>
                        <i class="fas fa-calendar-check"></i> Dibuka Tanggal : {{ $lowongans->buka }} |
                        
                        <i class="fas fa-calendar-check"></i> Ditutup Tanggal : {{ $lowongans->tutup }} |
                        
                        Dilihat 2235 kali
                        <br>
                                    <br>
                        <input type="submit" value="Ajukan Lamaran" class="btn-solid-reg ">
                        <a class="btn-outline-reg mfp-close as-button" href="#">Batal</a>
                    </form>
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 12--> --}}


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