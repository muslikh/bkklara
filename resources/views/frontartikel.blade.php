@extends('layouts.front')
@include('layouts.menufront')


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Artikel dan Tips</span></h2>
                
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

@section('content')

@foreach($artikel as $i => $artikels)


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
                                        <img class="img-fluid" src="{{('frontpage/images/details-2-office-team-work.svg')}}" alt="alternative">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-8">
                                    <!-- <div class="text-container"> -->
                                        <h3>{{ $artikels->judul }}</h3>
                                        <span>{{ $artikels->penulis }}</span> <span>{{ $artikels->created_at }}</span>
                                    
                                   <p> {{ str_limit(strip_tags($artikels->isi_artikel), 350) }}
            @if (strlen(strip_tags($artikels->isi_artikel)) > 350)
              ... 
            @endif</p>
                                   <a href="{{ action('ArtikelController@show', $artikels) }}" class="btn btn-warning " style="color:white;">Baca Selengkapnya</a>
                                    <!-- </div>  end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div>  <!--end of container -->
                    </div> <!-- end of basic-2 -->
                    <!-- end of details 2 -->

                    </div><!-- end of card -->
        </div>    
     </div> <!--end artikel -->

@endforeach

@endsection