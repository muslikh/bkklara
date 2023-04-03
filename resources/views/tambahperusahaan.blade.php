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
			<a href="dataperusahaan">Data Perusahaan</a>
		</li>
</ul>
</div>

<form action="prosestambahperusahaan" method="post">  
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
                        Data 
		        		</a>
                    </li>
                </ul>    
    <div class="tab-content">
        <div class="tab-pane active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">

            Nama Perusahaan : <input type="text" name="nama" required="required" class="form-control ">
            Deskripsi Perusahaan <textarea type="text" name="tentang" required="required" class="form-control "></textarea>
            No. HP : <input type="number" name="hp" required="required" class="form-control ">
            Alamat : <input type="text" name="alamat" required="required" class="form-control ">
            Website <input type="text" name="website" required="required" class="form-control ">
            Email <input type="email" name="email" required="required" class="form-control ">
            Password <input type="text" name="password" required="required" class="form-control ">
                  
        </div>
    </div> 
                                
                          

        </div>
    </div>
</div>

</form>
@endsection
