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
		<li class="separator">
			<a href="nilairapor?id={{ request()->id }}&semester={{ request()->semester }}&kelas={{ request()->kelas }}">
				Nilai Rapor
			</a>
		</li>
		<li class="separator">
			<a href="#">
				Tambah Nilai Rapor
			</a>
		</li>
</ul>
</div>

<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                 <div class="card-header">
                     <div class="card-head-row">
                          <h4 class="card-title">Input Nilai Rapor</h4>
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
            
    <div class="form-group">
         <form action="ptambahnilai" name="add_name" id="add_name">  


            <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="table-responsive">  
                 <table class="table table-bordered table-dark"  id="dynamic_field"  >
                                         
                <tr>
                    <th  rowspan="2">Nama Mata Pelajaran</th>
                    <th rowspan="2">KKM </th>
                    <th colspan="2">Nilai Pengetahuan</th>
                    <th colspan="2">Nilai Keterampilan</th>
                    <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th>Angka</th>  
                    <th>Huruf</th> 
                    <th>Angka</th>  
                    <th>Huruf</th>    
                </tr> 
                    
                    <tr>  
                        <td>
                            <select class="form-control name_list" name="mapel[]"   required="required">
                                <option>Pilih Mapel</option>
                                    @foreach ($mapels as $mapel)
                                     <option value="{{$mapel->id}}">{{$mapel->nama_mapel}}</option>

                                    @endforeach
                            </select>
                        </td>  
                        <td>
                            <input type="hidden" name="users_id[]" value="{{ request()->id }}" class="form-control name_list" /> 
                            <input type="hidden" name="semester[]" value="{{ request()->semester }}" class="form-control name_list" />
                            <input type="text" name="kkm[]"  class="form-control name_list"   required="required" />
                        </td>  
                        <td><input type="text" name="npa[]" class="form-control name_list"  required="required"/></td>  
                        <td><input type="text" name="nph[]"  class="form-control name_list"  required="required"/></td>  
                        <td><input type="text" name="nka[]"  class="form-control name_list"  required="required"/></td>  
                        <td><input type="text" name="nkh[]" class="form-control name_list"  required="required"/></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Tambah </button></td>  
                    </tr>  
                </table>  
                <button onclick="submit_forms();" class="btn btn-primary" >Simpan</button>
            
            </form>  
          </div>

         </div> 
       </div>

    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){ 
      var postURL = "<?php echo url('inputrapor'); ?>";     
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="hidden" name="users_id[]" value="{{ request()->id }}" class="form-control name_list" /><input type="hidden" name="semester[]" value="{{ request()->semester }}" class="form-control name_list" /><select class="form-control name_list" name="mapel[]">@foreach ($mapels as $mapel)<option value="{{$mapel->id}}">{{$mapel->nama_mapel}}</option>@endforeach</select></td><td><input type="text" name="kkm[]" class="form-control name_list" /></td><td><input type="text" name="npa[]" class="form-control name_list" /></td><td><input type="text" name="nph[]" class="form-control name_list" /></td><td><input type="text" name="nka[]" class="form-control name_list" /></td><td><input type="text" name="nkp[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  

      
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


    //   $('#add_name').on('submit',function(e){    
    //       e.preventDefault();        
    //        $.ajax({  
    //             url:'ptambahnilai',  
    //             data:$($this).serialize(),
    //             type:'POST',
    //             success:function(response)  
    //             {
    //                 console.log(response);
    //                 if(data.error){
    //                     printErrorMsg(data.error);
    //                 }else{
    //                     i=1;
    //                     $('.dynamic-added').remove();
    //                     $('#add_name')[0].reset();
    //                     $(".print-success-msg").find("ul").html('');
    //                     $(".print-success-msg").css('display','block');
    //                     $(".print-error-msg").css('display','none');
    //                     $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
    //                 }
    //             }  
    //        });  

    //   });  
    function submit_forms(){
         var x = document.querySelectorAll(".name-list");
         for (let i = 0; i < x.length; i++) {
            x[i].submit();
         }
     }


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
@endsection

