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
            Keterserapan
        </li>
    </ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Data Keterserapan </h4>
                          <div class="card-tools">
                            {{-- <a href="#" class="btn btn-success">Cetak </a>
                            <a href="#" class="btn btn-warning">Export PDF </a> --}}
                          </div>
                     </div>
                  </div>
                  <div class="card-body ">
                    
                        {{-- start Dropdown --}}
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label">Status Siswa : </label>
                        
                                <div class="col-md-4">
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">== Pilih ==</option>
                                        <option value="kerja"> Belum Bekerja </option>
                                        <option value="belum_bekerja"> Sudah Bekerja </option>
                                        <option value="kuliah"> Kuliah </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        {{-- end Dropdown  --}}
    
                            <div class="table-responsive-sm center">
                                <table class="table table-bordered table-hover table-checkable"  style="margin-top: 13px !important" id="keterserapan"  >
                                    <thead>
                                        <tr>
                                            <th >No.</th>
                                            <th >No. KTP</th>
                                            <th >Nama Lengkap</th>
                                            <th >Email </th>
                                            <th >Telepon</th>
                                            <th >Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td colspan='6' align='center'>Tidak Ada Data</td></tr>
                                    </tbody>
                                </table>
                                        
            </div>
        </div>
    </div>
</div>




<script>
 
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    
        $('#status').on('change', function () {
            
            var i = 1;
            $.ajax({
                url: 'dataketerserapan',
                method: 'POST',
                // data: {kode_kelas: $(this).val()},
                data: {status_user: $(this).val()},
                
            //    dataType: 'json', 
                success: function (response) {
                    if($.trim(response))
                    {
                        $('#keterserapan tbody').empty();
                        
                        $.each(response, function (index, data) {
                            
                            $('#keterserapan tbody').append("<tr><td>"+ i++ +"</td><td>"+data.username+"</td><td>"+data.nama+"</td><td>"+data.email+"</td><td>"+data.telepon+"</td><td>"+data.keterangan+"</td></tr>");
                        })
                    }else{
                        
                         $('#keterserapan tbody').empty().html("<tr><td colspan='5' align='center'>Tidak Ada Data</td></tr>");
                    }
    
    
                },
        error: function(errorThrown){
            alert(errorThrown);
            alert("There is an error with AJAX!");
        }   
            })
        });
    
        
        $('#hari').on('change', function () {
            
            $('#kelas').val($(this).find("option:selected").index());
            
        });
    
    });
    
    </script>
    





@endsection
