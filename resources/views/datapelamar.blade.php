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
                          <h4 class="card-title">Data Pelamar</h4>
                          <div class="card-tools">
                          {{-- <a href="tambahlowongan" class="btn btn-success">Tambah Lowongan</a> --}}
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
                                    <th>Nama Alumni</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Keahlian</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach ($datapelamar as $i =>$data)
                            <tr>
                            <td>{{++$i}}</td>
                                <td> {{ $data->get_alumni['nama'] }}</td>
                                <td> {{ $data->get_alumni['jenis_kelamin'] }} </td>
                                <td> {{ $data->get_alumni['keahlian'] }} </td>
                                <td> {{ $data->status }} </td>
                                <td>
                                {{-- <button title="Detail Info" type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#viewModal" onclick='showDetail({{$datalowongans->id}});'><i class="fa fa-eye"></i> Lihat</button> --}}
            
                                <a href="{{url('detailalumni')}}/{{$data->get_alumni['id']}}" class="btn btn-warning">Detail</a>
                                <a href="{{url('diterima')}}?id_lowongan={{$data->id_lowongan}}&id_user={{$data->get_alumni['id']}}" class="btn btn-danger">Di terima</a>
                                <a href="{{url('diproses')}}?id_lowongan={{$data->id_lowongan}}&id_user={{$data->get_alumni['id']}}"class="btn btn-danger">Di Proses</a>
                                <a href="{{url('ditolak')}}?id_lowongan={{$data->id_lowongan}}&id_user={{$data->get_alumni['id']}}"class="btn btn-danger">Di Tolak</a>
                            </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table> 
                        Halaman : {{$datapelamar->currentPage()}} </br>
                        Data Per Halaman : {{$datapelamar->perPage()}} </br>

                    <center>    {{$datapelamar->links()}} </center>
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