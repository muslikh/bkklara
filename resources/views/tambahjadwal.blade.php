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
			<a href="jadwal">Jadwal Pelajaran</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="tambahjadwal">Tambah Jadwal</a>
		</li>
</ul>
</div>


<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Tambah Jadwal</h4>
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
                      <form action="pjadwalPelajaran" method="post">  
                      {{csrf_field()}}

                                Hari : 
                                <select class="form-control" name="hari">
                                    <option value="">Pilih Hari</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jum 'at</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
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
                                Jam Ke : 
                                <select class="form-control" name="jam_ke">
                                    <option value="">Pilih Jam</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <br> <input type="submit"  value="Tambah" class="btn btn-primary ">
                                
                                <a href="jadwal" class="btn btn-danger">Kembali</a>
                                
                      </form>

        </div>
    </div>
</div>
<!-- {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<!-- <script>
$(function () {

    $('#kelas').on('change', function(){
        axios.post('{{route('tambahjadwal.lihatmapel')}}',{kode_kelas:$(this).val()})
        .then(function(response)
        {
            $('#mapel').empty();
            $.each(response.data, function(id,nama_mapel){
                $('#mapel').append(new Option(nama_mapel,id))
            })
        });
    });
    
});

</script> --}} -->

@endsection
