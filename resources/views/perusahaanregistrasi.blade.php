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
			<a href="tambahjadwal">Data perusahaanregistrasi</a>
		</li>
</ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Detail Alumni</h4>
                          <div class="card-tools">
                          </div>
                     </div>
                  </div>
                  <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div> @elseif (session()->has('pesan'))
                        <div class="alert alert-success">
                            {{ session()->get('pesan') }}
                        </div>   
                    @endif
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach ($perusahaanregistrasi as $i =>$perusahaanregistrasis)
                            <tr>
                            <td>{{++$i}}</td>
                                <td> {{$perusahaanregistrasis->nama}} </td>
                                <td> {{$perusahaanregistrasis->email}} </td>
                                <td> {{$perusahaanregistrasis->telepon}} </td>
                                <td> {{$perusahaanregistrasis->alamat}} </td>
                                <td>
                                 <a href="validasiperusahaan/{{$perusahaanregistrasis->id_industri}}" class="btn btn-warning">Validasi</a>
                                 <a href="{{url('hapusperusahaan')}}/{{$perusahaanregistrasis->id_industri}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table> 
                        Halaman : {{$perusahaanregistrasi->currentPage()}} </br>
                        Data Per Halaman : {{$perusahaanregistrasi->perPage()}} </br>

                    <center>    {{$perusahaanregistrasi->links()}} </center>
                </div>  
        </div>
    </div>
</div>
@endsection
