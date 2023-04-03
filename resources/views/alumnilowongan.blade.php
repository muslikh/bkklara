@extends('layouts.mainAlumni')

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

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Data Lowongan</h4>
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
                                    <th>Nama Perusahaan</th>
                                    <th>Judul Lowongan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach ($datalowongan as $i =>$datalowongans)
                            <tr>
                            <td>{{++$i}}</td>
                                <td> {{$datalowongans->perusahaan->nama}} </td>
                                <td> {{$datalowongans->judul}} </td>
                                <td> {{$datalowongans->deskripsi}} </td>
                                <td>
                                    <a href="{{url('dlowongan')}}/{{$datalowongans->id_lowongan}}" class="btn btn-warning">Detail</a>
                                   
                                    <a href="{{url('hapuslowongan')}}/{{$datalowongans->id_lowongan}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table> 
                        Halaman : {{$datalowongan->currentPage()}} </br>
                        Data Per Halaman : {{$datalowongan->perPage()}} </br>

                    <center>    {{$datalowongan->links()}} </center>
                </div>  
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" charset="utf-8">
function showDetail(id)
{
    $.ajax({
        type:"GET",
        url: "{{ url('lowongandetail') }}"+"/"+id,
        dataType: "json",
        cache: false,
        success: function(modaldata){      
              
            $("#judul").append(modaldata["judul"]);
            $("#tgl").append(modaldata["updated_at"]);
            $("#penulis").append(modaldata["penulis"]);
            $("#isi").append(modaldata["isi_artikel"]); //this is likely the problem
            // alert(modaldata);
            // alert(modaldata["isi_artikel"])
        },
        error: function (modaldata) {
            // 
        }
    });
}
  </script>

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