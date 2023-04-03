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
			<a href="tambahjadwal">Data Registrasi Alumni</a>
		</li>
</ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Detail Registrasi Alumni</h4>
                          <div class="card-tools">
                          {{-- <a href="tambahsiswa" class="btn btn-success">Tambah Alumni</a> --}}
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach ($alumniregistrasi as $i =>$alumniregistrasis)
                            <tr>
                            <td>{{++$i}}</td>
                                <td> {{$alumniregistrasis->nama}} </td>
                                <td> {{$alumniregistrasis->email}} </td>
                                <td> {{$alumniregistrasis->telepon}} </td>
                                <td>
                                 <a href="detailalumni/{{$alumniregistrasis->id}}" class="btn btn-warning">Detail</a>
                                 <a href="hapusalumni/{{$alumniregistrasis->id}}" class="btn btn-danger">Hapus</a>
                                 </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table> 
                        Halaman : {{$alumniregistrasi->currentPage()}} </br>
                        Data Per Halaman : {{$alumniregistrasi->perPage()}} </br>

                    <center>    {{$alumniregistrasi->links()}} </center>
                </div>  
        </div>
    </div>
</div>
@endsection
