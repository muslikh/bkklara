@extends('layouts.mainAlumni')

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
									<a href="datakelas">Data Kelas</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
								<li  class="nav-item">
									<a href="tambahkelas">Tambah Kelas</a>
								</li>
							    </ul>
                            </div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Pendidikan </h4>
                     
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
                    <?php $user = Auth::guard('alumni')->user();?>
                   
                      <form action="{{ url('ptambahpendidikan') }}/{{ $user->id }}" method="post">  
                      {{csrf_field()}}
                          
                      Tingkat : 
                      <input type="text" name="tingkat" required="required" class="form-control " required>
                      Instansi : 
                      <input type="text" name="instansi" required="required" class="form-control " required>
                      
                      Tahun Masuk : 
                      <input type="text" name="masuk" required="required" class="form-control " required>
                      Tahun Keluar : 
                      <input type="text" name="lulus" required="required" class="form-control " required>
                      <br> <input type="submit"  value="Simpan" class="btn btn-primary ">
                      
                                {{-- <a href="datakelas" class="btn btn-danger">Kembali</a> --}}
                                
                      </form>

                </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
