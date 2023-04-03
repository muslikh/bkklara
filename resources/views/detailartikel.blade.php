
@extends('layouts.front')
@include('layouts.menufront')



@section('content')

@foreach($artikeldetail as $i => $artikeldetails)

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Baca Artikel</span></h2>
                <h3> {{$artikeldetails->judul}}</h3>
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
                                <div class="col-lg-8">
                                    <!-- <div class="text-container"> -->
                                        <h3>{{ $artikeldetails->judul }}</h3>
                                        <i class="fas fa-address-card"></i> {{ $artikeldetails->penulis }} | <i class="fab fa-algolia"></i> {{ $artikeldetails->created_at }}
                                    
                                   <p> 
                                  {!! $artikeldetails->isi_artikel !!}
                                   </p>
                                   <!-- </div>  end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div>  <!--end of container -->
                    </div> <!-- end of basic-2 -->
                    <!-- end of details 2 -->
                    <div class="card-footer text-right">
                    <a href="#"><i class="fa fa-share"></i> Bagikan</a>
                    </div>
                    </div><!-- end of card -->
        </div>    
     </div> <!--end artikel -->

@endforeach
@endsection