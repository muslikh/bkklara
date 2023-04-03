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
			<a href="#">Tambah Artikel</a>
		</li>
</ul>
</div>

<form action="prosestambartikel" method="post">  
                      {{csrf_field()}}
                          
<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Data</h4>
                          <div class="card-tools">
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
            Judul artikel : <input type="text" name="judul" required="required" class="form-control ">
            Isi artikel : 
            <textarea rows="10" cols="50"  id="isi_artikel" name="isi_artikel" required="required" class="form-control "></textarea>

        </div>
                          <input type="submit"  value="Simpan" class="btn btn-primary ">
    </div>
</div>

</form>
<script src="{{asset('assets/ckeditor4/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("isi_artikel");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection
