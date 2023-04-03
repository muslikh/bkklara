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
</ul>
</div>

<form action="prosestambahalumni" method="post">  
                      {{csrf_field()}}
                          
<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Data</h4>
                          <div class="card-tools">
                          <input type="submit"  value="Simpan" class="btn btn-primary ">
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
                        Data Pribadi
		        		</a>
                    </li>
                	<li class="nav-item">
                        <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">
                        Data Login
		        		</a>
                    </li>
                </ul>    
    <div class="tab-content">
        <div class="tab-pane active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">

            Nama Lengkap : <input type="text" name="nama" required="required" class="form-control ">
            No. HP : <input type="text" name="hp" required="required" class="form-control ">
            Tempat Lahir : <input type="text" name="tempat_lahir" required="required" class="form-control ">
            Tanggal Lahir : <input type="text" name="tanggal_lahir" required="required" class="form-control ">
            Alamat : <input type="text" name="alamat" required="required" class="form-control ">
            Jenis Kelamin: <input type="text" name="enis_kelamin" required="required" class="form-control ">
            Tinggi Badan: <input type="text" name="tinggi" required="required" class="form-control ">
            Berat Badan: <input type="text" name="berat" required="required" class="form-control ">
                                    
        </div>
        <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="login-tab">

        Email : <input type="text" name="email" required="required" class="form-control ">
        Password : <input type="text" name="password" required="required" class="form-control ">
                           
        </div>
    </div> 
                                
                          

        </div>
    </div>
</div>

</form>
@endsection
