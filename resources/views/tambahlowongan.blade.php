@extends('layouts.main')
<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
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
			<a href="datalowongan">Data lowongan</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Tambah lowongan</a>
		</li>
</ul>
</div>

<form action="prosestambahlowongan" method="post">  
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
                <ul class="nav nav-pills nav-secondary" id="myTab" role="tablist">
                	<li class="nav-item">
                        <a class="nav-link active" id="pribadi-tab" data-toggle="tab" href="#pribadi" role="tab" aria-controls="pribadi" aria-selected="true">
                        Data Lowongan
		        		</a>
                    </li>
                </ul>    
    <div class="tab-content">
        <div class="tab-pane active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">

            Nama Perusahaan : 
            <select class="form-control" name="nama"   required="required" placeholder="Pilih Perusahaan">
                <option value="">Pilih Perusahaan</option>
                     @foreach ($perusahaan as $perusahaans)
                <option value="{{$perusahaans->id_industri}}">{{$perusahaans->nama}}</option>
                     @endforeach
            </select>
            Judul Lowongan : <input type="text" name="judul" required="required" class="form-control ">
            <!-- Gambaran Perusahaan : <input type="text" name="tanggal_lahir" required="required" class="form-control "> -->
            <!-- Gaji : <input type="text" name="tempat_lahir" required="required" class="form-control "> -->
            Persyaratan Pekerjaan : 
            <textarea type="text" name="persyaratan" required="required" class="form-control "></textarea>
            Di Utamakan Jurusan ? 
            <select class="form-control" name="jurusan"   required="required" placeholder="Pilih Jurusan">
                <option value="">Pilih Jurusan</option>
                 @foreach ($jurusan as $jurusans)
                    <option value="{{$jurusans->id_jurusan}}">{{$jurusans->jurusan}}</option>
                 @endforeach
                {{-- <option value="0">Semua Jurusan</option> --}}
            </select>

            Deskripsi Pekerjaan : 
            <textarea type="text" name="deskripsi" required="required" class="form-control "></textarea>
            Kualifikasi / Syarat Tambahan: 
            <textarea type="text" name="kualifikasi"  class="form-control " placeholder="Kosongkan Jika Tidak Ada"></textarea>  
            Catatan : 
            <textarea type="text" name="catatan"  required="required"  class="form-control "></textarea>  
            Lowongan Di buka: <input type="date" name="buka" required="required" class="form-control ">
            Lowongan Di Tutup : <input type="date" name="tutup" required="required" class="form-control ">
        </div>
    </div> 
                                           

        </div>
                
                <input type="submit"  value="Simpan" class="btn btn-primary ">  
    </div>
</div>

</form>
<script>
 $(document).ready(function(){

var multipleCancelButton = new Choices('#multiple', {
removeItemButton: true,
maxItemCount:15,
searchResultLimit:15,
renderChoiceLimit:15
});


});</script>
@endsection
