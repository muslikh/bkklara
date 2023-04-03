@extends('layouts.main')

@section('content')
<!-- {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}} -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
<!-- {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"> --}} -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

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
			<a href="jadwalUjian">Jadwal Ujian</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="tambahujian">Tambah Jadwal</a>
		</li>
</ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Jadwal Ujian </h4>

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
                      <form action="pujian" method="post">  
                      {{csrf_field()}}
                                
                               Tanggal : <input name="hari"  id="hari" type="date" class="form-control" >
                                
                                Kelas : 
                                <select class="form-control" name="kode_kelas" id="kode_kelas">
                                    <option value="">Pilih Kelas</option>
                                        @foreach ($kelas as $kelass)
                                         <option value="{{$kelass->kode_kelas}}">{{$kelass->nama_kelas}}</option>
    
                                        @endforeach
                                </select>
                                Nama Mapel : 
                                <select class="form-control" name="id_mapel" name="id_mapel">
                                    <option value="">Pilih Mapel</option>
                                    @foreach ($mapel as $mapels)
                                    <option value="{{$mapels->id}}">{{$mapels->nama_mapel}} | {{$mapels->kode_kelas}}</option>
    
                                    @endforeach
                                </select>
                                Nama Guru :  <input class="form-control" type="text" name="nama_guru">
                                {{-- <select class="form-control" name="guru">
                                    <option value="">Pilih Guru</option> --}}
                                        {{-- @foreach ($gurus as $guru)
                                         <option value="{{$guru->id}}">{{$guru->nama}}</option>
    
                                        @endforeach --}}
                                {{-- </select> --}}
                                Waktu : 
                                <input id='datetimepicker1' name="waktu" type="time" class="out_timepicker form-control input-small" data-provide="timepicker"/>
                                        <input type="hidden" name="jenis" value="{{request()->jenis}}">
                                <br> <input type="submit"  value="Tambah" class="btn btn-primary ">
                                
                                <a href="jadwal" class="btn btn-danger">Kembali</a>
                              
                      </form>

        </div>
    </div>
</div>
<!-- <script>
    $(function() {
  $('#datetimepicker1').datetimepicker({
            format: 'HH:mm'
  });
  
  $('#datetimepicker2').datetimepicker({
            format: 'MM/DD/YYYY HH:mm'
  });
  $('#datetimepicker3').datetimepicker({
      format: 'hh:mm A',
  });
});
</script> -->
@endsection
