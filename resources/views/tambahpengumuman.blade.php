@extends('layouts.app')

@section('content')



<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="home">Home</a> -> <a href="pengumuman">Data Pengumuman</a>  -> Tambah Pengumuman</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif (session()->has('pesan'))
                        <div class="alert alert-success">
                            {{ session()->get('pesan') }}
                        </div>   
                    @endif
                      <form action="prosestambahpengumuman" method="post">  
                      {{csrf_field()}}
                        <!-- <div class="row">-->
                        <div class="table-responsive-sm">
                            <table class="table">
                            <thead>
                            <tr>
                                <th>Tambah Pengumuman</th>
                            </tr>
                            </thead>
                            <tbody> 
                            <tr>
                            <td>   

                            <div class="col"> 
                                
                          
                                Judul Pengumuman : <input type="text" name="judul_pengumuman" required="required" class="form-control ">
                                Isi Pengumuman : <textarea name="isi_pengumuman" required="required" class="form-control "></textarea>
                                Tanggal Pengumuman : <input type="date" name="tgl_pengumuman" required="required" class="form-control ">
                                <br> <input type="submit"  value="Simpan" class="btn btn-primary ">
                                
                                <a href="pengumuman" class="btn btn-danger">Kembali</a>
                                
                            <!-- </div> -->
                        </div>  
                      </form>

                </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
