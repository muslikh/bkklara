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
									<a href="jurusan">Data Jurusan</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li class="nav-item">
									<a href="#">Tambah Jurusan</a>
								</li>
                            </ul>
                        </div>  

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Jurusan</h4>
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
                      <form action="pjurusan" method="post">  
                      {{csrf_field()}}
                                Nama Jurusan : <input type="text" name="nama_jurusan" required="required" class="form-control ">
                                Kode Jurusan : <input type="text" name="kode_jurusan" required="required" class="form-control ">
                               
                                <br> <input type="submit"  value="Tambah" class="btn btn-primary ">
                                
                                <a href="mapel" class="btn btn-danger">Kembali</a>
                                
                      </form>

        </div>
    </div>
</div>
@endsection
