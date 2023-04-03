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
            Pengumuman
        </li>
    </ul>
</div>

<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        maargin: 5px;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="home">Home</a> -> Data Pengumuman</div>

                <div class="panel-body">
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
                                    <a href="tambahpengumuman" class="btn btn-success">Tambah Pengumuman</a>
                                </tr>
                                <tr>
                                <br>
                                <br>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th>Tanggal </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <tr>
                            @foreach ($pengumuman as $i => $pengumumans)

                            <td>{{++$i}}</td>
                                <td> <span>{{$pengumumans->judul_pengumuman}} </span>
                                <td> {{$pengumumans->isi_pengumuman}} </td>
                                <td> {{$pengumumans->tgl_pengumuman}} </td>
                                <td>
                                 <!-- <a href="editpengumuman?id={{$pengumumans->id_pengumuman}} " class="btn btn-warning"  class="edit">Edit</a> -->
                                 <a href="hapuspengumuman?id={{$pengumumans->id_pengumuman}} " class="btn btn-danger">Hapus</a>
                                 </td>
                            </tr>
                             @endforeach
                            </tbody>
                        </table>
                     </div>   
                        Halaman : {{$pengumuman->currentPage()}} </br>
                        Data Per Halaman : {{$pengumuman->perPage()}} </br>

                    <center>    {{$pengumuman->links()}} </center>
                </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(".table").on("click", ".edit", function() {
  var prevTD = $(this).parent().prev();
  var value = prevTD.find("span").hide().text();
  prevTD.find("input").show().val(value);
  $(this).toggleClass("edit save").text("Save");
}).on("click", ".save", function() {
  var prevTD = $(this).parent().prev();
  var value = prevTD.find("input").hide().val();
  prevTD.find("span").show().text(value);
  $(this).toggleClass("edit save").text("Edit");
});
// Unhide all the hidden inputs when submitting the form
$("form").submit(function() { 
    $(this).find("input").show(); 
});
</script>


@endsection
