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
			<a href="">Data Artkeil</a>
		</li>
</ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Data Artikel</h4>
                          <div class="card-tools">
                          <a href="tambahartikel" class="btn btn-success">Tambah Artikel</a>
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
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                        @if(count($artikel))    

                            @foreach ($artikel as $i =>$artikels)
                            <tr>
                            <td>{{++$i}}</td>
                                <td> {{$artikels->judul}} </td>
                                <td> {{$artikels->penulis}} </td>
                                <td>
                                <button title="Detail Info" type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#viewModal" onclick='showDetail({{$artikels->id}});'><i class="fa fa-eye"></i> Lihat</button>
            
                                <a href="ubahartikel/{{$artikels->id}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Ubah</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Hapus
                                </button>
 

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin Ingin Menghapus Artikel
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <a href="hapusartikel?id={{$artikels->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 </td>
                            </tr>
                             @endforeach
                        @else
                            <tr><td colspan="4" class="text-center">
                                    Belum Ada Artikel
                            </td></tr>

                        @endif

                            </tbody>
                        </table> 
                        Halaman : {{$artikel->currentPage()}} </br>
                        Data Per Halaman : {{$artikel->perPage()}} </br>

                    <center>    {{$artikel->links()}} </center>
                </div>  
        </div>
    </div>
</div>
@endsection 

<div class="modal fade bd-example-modal-l" id="viewModal" > 
    <div class="modal-dialog  modal-lg" >
        <div class="modal-content mdl-content">
            <div class="modal-header">
                <h5 class="modal-title"> Lihat Artikel : <span  id="judul"></span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            Di tulis Oleh : <span id="penulis"></span>, Pada Tanggal : <span id="tgl"></span>
            <br>
            <br>
                <div  id="isi"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">

$(document).ready(function()
{
    // codes works on all bootstrap modal windows in application
    $('#viewModal').on('hidden.bs.modal', function(e)
    { 
        $(this).removeData();
    }) ;

});

function showDetail(id)
{
    $.ajax({
        type:"GET",
        url: "{{ url('artikeldetail') }}"+"/"+id,
        dataType: "json",
        data:[],
        cache: false,
        success: function(data){    
            $.each(data, function (i, val) {

                // console.log(val.judul);
                // console.log(val.penulis);
                $("#judul").append('<span  id="judul">'+val.judul+'</span>');
                $("#tgl").append('<span id="tgl">'+val.updated_at+'</span>');
                $("#penulis").append('<span id="penulis">'+val.penulis+'</span>');
                $("#isi").append('<div  id="isi">'+val.isi_artikel+'</div>'); 
            });
            
            // alert(modaldata);
            // alert(modaldata["isi_artikel"])
        },
        error: function (data) {
            // 
        }
    });
}

  </script>
