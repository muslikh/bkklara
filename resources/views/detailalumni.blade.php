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
			<a href="dataalumni">Data Alumni</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Detail Alumni</a>
		</li>
</ul>
</div>
@foreach($alumni as $alumnis)
                          
<div class="container ">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif (session()->has('pesan'))
                        <div class="alert alert-success">
                            {{ session()->get('pesan') }}
                        </div>   
                    @endif

  <!-- Page content -->
  <div class="container ">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <!-- <img src="http://localhost/sispia//assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top"> -->
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <!-- <img src="http://localhost/sispia/assets/img/alumni/default.png" class="rounded-circle"> -->
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info  mr-4 ">Alumni</a>
              <a href="#" class="btn btn-sm btn-default float-right">SMK</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="text-center">
              <h5 class="h3">
              {{$alumnis->nama}}             
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>
              {{$alumnis->alamat}}             
                 </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>
                Alumni - {{$alumnis->tahun_lulus}}  
                            </div>
              <div>
                <i class="ni education_hat mr-2"></i>SMK NEGERI 1 PRIGEN
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-6">
                @if($alumnis->status == 'belum_aktif')
                 <h4 class="card-title">Detail Registrasi Alumni</h4>
                @else
                <h4 class="card-title">Detail Alumni</h4>
                @endif
              </div>
              <div class="col-6">
              @if($alumnis->status == 'belum_aktif')
              <a href="{{ url('validasi/')}}/{{ $alumnis->id }}" class="btn btn-success">
                <i class="fa fa-check"></i> Validasi
                </a>
                <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> Kembali
                </a>
              @else
              
              <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> Kembali
                </a>
              {{-- <button class="btn btn-danger">
                <i class="fa fa-pen"></i> Ubah 
                </button> --}}
              {{-- <button class="btn btn-success">
                <i class="fa fa-cek"></i> CV
                </button> --}}
              @endif
              {{-- {{ $alumnis->status }} --}}

              </div>
            </div>
          </div>
          <div class="card-body">
                    <ul class="nav nav-pills nav-secondary" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pribadi-tab" data-toggle="tab" href="#pribadi" role="tab" aria-controls="pribadi" aria-selected="true">
                              Data Pribadi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Pendidikan-tab" data-toggle="tab" href="#Pendidikan" role="tab" aria-controls="Pendidikan" aria-selected="false">
                              Riwayat Pendidikan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Pekerjaan-tab" data-toggle="tab" href="#Pekerjaan" role="tab" aria-controls="Pekerjaan" aria-selected="false">
                              Riwayat Pekerjaan
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="Lainnya-tab" data-toggle="tab" href="#Lainnya" role="tab" aria-controls="Lainnya" aria-selected="false">
                                Data Lainnya
                            </a>
                        </li> --}}
                    </ul>  

                    <div class="tab-content">
                        <div class="tab-pane active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">
                          <label>Nama : </label>
                          <input type="text" name="nama" id="nama" value="{{ $alumnis->nama}}" class="form-control" style="color: black" disabled> 
                          <label>NIK : </label>
                          <input type="text" name="nik" id="nik" value="{{ $alumnis->username}}" class="form-control" style="color: black" disabled> 
                          <label>Jenis Kelamin : </label>
                          @if( $alumnis->jenis_kelamin == 'L')
                          <input type="text" name="jk" id="jk" value="Laki - Laki" class="form-control" style="color: black" disabled> 
                          @else
                          <input type="text" name="jk" id="jk" value="Perempuan" class="form-control" style="color: black" disabled> 
                          @endif
                          <label>Tempat Lahir : </label>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $alumnis->tempat_lahir}}" class="form-control" style="color: black" disabled> 
                          <label>Tanggal Lahir : </label>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ $alumnis->tgl_lahir}}" class="form-control" style="color: black" disabled> 
                          <label>No Telepon : </label>
                          <input type="text" name="telepon" id="telepon" value="{{ $alumnis->telepon}}" class="form-control" style="color: black" disabled> 
                          <label>Alamat : </label>
                          <input type="text" name="alamat" id="alamat" value="{{ $alumnis->alamat}}" class="form-control" style="color: black" disabled> 
                          <label>Tahun Lulus : </label>
                          <input type="text" name="tahun_lulus" id="tahun_lulus" value="{{ $alumnis->tahun_lulus}}" class="form-control" style="color: black" disabled> 
                          
                        </div>

                        <div class="tab-pane" id="Pendidikan" role="tabpanel" aria-labelledby="Pendidikan-tab">
                            @foreach($alumnis->pendidikan as $pendidikan)
                            <span style="color: white">Tingkat  {{ $pendidikan->tingkat }}</span>
                            <br>
                            <label>Nama Sekolah :</label>
                            <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ $pendidikan->instansi}}" class="form-control" style="color: black" disabled> 
                                  
                            <label>Tahun Masuk :</label>
                            <input type="text" name="tahun_masuk" id="tahun_masuk" value="{{ $pendidikan->masuk}}" class="form-control" style="color: black" disabled> 
                                    
                            <label>Tahun Lulus :</label>
                            <input type="text" name="tahun_lulus" id="tahun_lulus" value="{{ $pendidikan->lulus}}" class="form-control" style="color: black" disabled> 
                                      
                            @endforeach
                        </div>

                        <div class="tab-pane" id="Pekerjaan" role="tabpanel" aria-labelledby="Pekerjaan-tab">
                          @foreach($alumnis->pekerjaan as $pekerjaan)
                            <label>Tempat :</label>
                            <input type="text" name="tempat" id="tempat" value="{{ $pekerjaan->tempat}}" class="form-control" style="color: black" disabled> 
                                  
                            <label>Tahun Masuk :</label>
                            <input type="text" name="masuk" id="masuk" value="{{ $pekerjaan->masuk}}" class="form-control" style="color: black" disabled> 
                                    
                            <label>Tahun Keluar :</label>
                            <input type="text" name="lulus" id="lulus" value="{{ $pekerjaan->keluar}}" class="form-control" style="color: black" disabled> 
                          @endforeach          
                        </div>

                        {{-- <div class="tab-pane" id="Lainnya" role="tabpanel" aria-labelledby="Lainnya-tab">
                          TIdak ADa           
                        </div> --}}
          </div>
        </div>
      </div>
    </div>
</div> <!--akhir Container-->
@endforeach
@endsection