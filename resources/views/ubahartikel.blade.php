@extends('layouts.main')

@section('content')

<div class="page-header">
<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-home"></i> | Beranda
			</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="dataartikel">Data Artikel</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Ubah Artikel</a>
		</li>
</ul>
</div>
@foreach($artikel as $artikels)
<form action="{{$artikels->id}}/prosesubahartikel" method="post">  
                      {{csrf_field()}}
                          
<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                     
                    {{-- @if($request->is(lihatartikel))
                    

                        <h4 class="card-title">Lihat Artikel | {{$artikels->judul}}</h4>
                    @else --}}
                        
                        <h4 class="card-title">Ubah Artikel | {{$artikels->judul}}</h4>
                    {{-- @endif --}}
                          <div class="card-tools">
                          <a href="{{ url('dataartikel') }}" class="btn btn-primary"><i class="fa fa-back">Kembali</i></a> 
                          </div>
                     </div>
                  </div>
                  <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif (session()->has('pesan'))
                        <div class="alert alert-success">
                            {{ session()->get('pesan') }}
                        </div>   
                    @endif
                    {{ Form::open(array('url' => 'ubahartikel')) }}
                        Judul artikel : <input type="text"  name="judul" required="required" class="form-control " value="{{$artikels->judul}}">
                        Isi artikel : 
                        <textarea rows="10" cols="50"  id="isi_artikel" name="isi_artikel" required="required" class="form-control ">{{$artikels->isi_artikel}}</textarea>

                    </div>
                          <input type="submit"  value="Simpan" class="btn btn-primary ">
                   
                    {{ Form::close() }}

            {{-- Judul artikel : <input type="text" name="judul" required="required" class="form-control " value="{{$artikels->judul}}">
            Isi artikel : 
            <textarea rows="10" cols="50"  id="isi_artikel" name="isi_artikel" required="required" class="form-control ">{{$artikels->isi_artikel}}</textarea> --}}

        </div>
                          {{-- <input type="submit"  value="Simpan" class="btn btn-primary "> --}}
    </div>
</div>

</form>
@endforeach
<script src="{{asset('assets/ckeditor4/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("isi_artikel");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection
