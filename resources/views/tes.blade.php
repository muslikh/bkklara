<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
    <h2 align="center">Laravel - Dynamically Add or Remove input fields using JQuery</h2>  

    <div class="panel panel-default">
        <div class="panel-heading"><a href="home">Home</a> -> <a href="detailsiswa?id={{ request()->id }}">Detail Siswa</a> -> Nilai Rapor</div>

        <div class="panel-body"> 
             @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div> @elseif (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>   
        @endif
            
    <div class="form-group">
         <form name="add_name" id="add_name">  


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
                        <td><input type="text" name="mapel[]"  class="form-control name_list" /></td>  
                        <td><input type="text" name="kkm[]"  class="form-control name_list" /></td>  
                        <td><input type="text" name="npa[]" class="form-control name_list" /></td>  
                        <td><input type="text" name="nph[]"  class="form-control name_list" /></td>  
                        <td><input type="text" name="nka[]"  class="form-control name_list" /></td>  
                        <td><input type="text" name="nkh[]" class="form-control name_list" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
         
            
            </form>  
          </div>

         </div> 
       </div>

    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="mapel[]" class="form-control name_list" /></td><td><input type="text" name="kkm[]" class="form-control name_list" /></td><td><input type="text" name="npa[]" class="form-control name_list" /></td><td><input type="text" name="nph[]" class="form-control name_list" /></td><td><input type="text" name="nka[]" class="form-control name_list" /></td><td><input type="text" name="nkp[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


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
</body>
</html>