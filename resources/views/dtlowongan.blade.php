@extends('layouts.main')

@section('content')

<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        maargin: 5px;
    }

</style>

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
			<a href="">Data Alumni</a>
		</li>
</ul>
</div>

<?php $user = Auth::guard('user')->user();?>

@foreach ($detaillowongan as $data)
<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Data Lowongan</h4>
                          <div class="card-tools">
                              
                             <a href="{{ url()->previous() }}" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Kembali
                             </a>
                             <a href="{{ url('dtpelamar') }}/{{ $data->id_lowongan }}" class="btn btn-success">
                                <i class="fas fa-employe"></i> Data Pelamar
                             </a>
                             {{-- <a href="{{ url('kirimlamaran') }}/{{ $user->id }}" class="btn btn-success">
                               <i class="fas fa-paper-plane"></i> 
                             </a> --}}
                             {{-- <input type="submit" class="btn btn-success" form="kirimLamaran"  id="simpan"  value="Kirim Lamaran"> --}}
                                   
                          </div>
                     </div>
                  </div>
                  <div class="card-body ">
                      
{{-- <form id="kirimLamaran" name="kirimLamaran" method="POST" >
    {{ csrf_field() }} --}}
    <input type="hidden" value="{{ $user->id }}" name="id_user" id="id_user">
                        <input type="hidden" value="{{ $data->id_lowongan }}" name="id_lowongan" id="id_lowongan">
                            <label>Judul Lowongan</label>
                            <input type="text" value="{{ $data->judul }}" class="form-control" disabled style="color: black">
                            <label>Nama Perusahaan</label>
                            <input type="text" value="{{ $data->perusahaan->nama }}" class="form-control" disabled style="color: black">
                            
                            <label>Tanggal Dibuka</label>
                            <input type="text" value="{{ $data->buka }}" class="form-control" disabled style="color: black">
                            <label>Tanggal Di Tutup</label>
                            <input type="text" value="{{ $data->tutup }}" class="form-control" disabled style="color: black">
                            <label>Kompetensi Keahlian </label>
                            <textarea type="text" value="" class="form-control" disabled style="color: black">{{ $data->id_jurusan }}</textarea>
                            <label>Deskripsi Lowongan</label>
                            <textarea type="text" value="" class="form-control" disabled style="color: black">{{ $data->deskripsi }}</textarea>
                            <label>Persyaratan</label>
                            <textarea type="text" value="" class="form-control" disabled style="color: black">{{ $data->lain }}</textarea>
                            <label>Catatan</label>
                            <textarea type="text" value="" class="form-control" disabled style="color: black">{{ $data->catatan }}</textarea>


                        @endforeach
                </div>  
            </div>
        </div>
{{-- </form> --}}
@endsection
