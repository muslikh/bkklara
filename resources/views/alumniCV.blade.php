                          <h1>Curicullim Vitae</h1>
<hr>
<br>

<br>
<h3>Data Pribadi</h3>
                        @foreach ($alumni as $data)
                            
                        
                          <label>Nama : </label>
                          <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="form-control" style="color: black" disabled> 
                         <br> <label>NIK : </label>
                          <input type="text" name="nik" id="nik" value="{{ $data->nik }}" class="form-control" style="color: black" disabled> 
                          <br><label>Jenis Kelamin : </label>
                          
                          <input type="text" name="jk" id="jenis_kelamin" value="{{ $data->jenis_kelamin }}" class="form-control" style="color: black" disabled> 
                          
                          <br> <label>Tempat Lahir : </label>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir}}" class="form-control" style="color: black" disabled> 
                          <br><label>Tanggal Lahir : </label>
                          <input type="text" name="tgl_lahir" id="tgl_lahir" value="{{ $data->tgl_lahir }}" class="form-control" style="color: black" disabled> 
                          <br><label>No Telepon : </label>
                          <input type="text" name="telepon" id="telepon" value="{{ $data->telepon }}" class="form-control" style="color: black" disabled> 
                          <br><label>Alamat : </label>
                          <input type="text" name="alamat" id="alamat" value="{{ $data->alamat }}" class="form-control" style="color: black" disabled> 
                          <br><label>Tahun Lulus : </label>
                          <input type="text" name="tahun_lulus" id="tahun_lulus" value="{{ $data->tahun_lulus }}" class="form-control" style="color: black" disabled> 
                          
<H3>Pendidikan Terakhir</H3>
                            @foreach ($data->pendidikan as $datapend)
                                
                            <br> <label>Tingkat</label>
                            <input type="text" name="tingkat"  id="tingkat" value="{{ $datapend->tingkat }}"  class="form-control"  style="color: black"  disabled>
                           
                            <br><label>Nama Sekolah :</label>
                            <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ $datapend->instansi }}" class="form-control" style="color: black" disabled> 
                                  
                            <br> <label>Tahun Masuk :</label>
                            <input type="text" name="tahun_masuk" id="tahun_masuk" value=" {{ $datapend->masuk }} "class="form-control" style="color: black" disabled> 
                                    
                            <br> <label>Tahun Lulus :</label>
                            <input type="text" name="tahun_lulus" id="tahun_lulus" value=" {{ $datapend->lulus }}" class="form-control" style="color: black" disabled> 
                                 <hr>
                            @endforeach
                                
                             
                        </div>

                        <H3>Riwayat Pekerjaan</H3>
                          @foreach ($pekerjaan as $kerja)
                                    
                          <br>      <label>Tempat :</label>
                                    <input type="text" name="tempat" id="tempat" value="{{ $kerja->tempat}}" class="form-control" style="color: black" disabled> 
                                        
                                    <br>       <label>Tahun Masuk :</label>
                                    <input type="text" name="masuk" id="masuk" value="{{ $kerja->masuk}}" class="form-control" style="color: black" disabled> 
                                            
                                    <br>    <label>Tahun Keluar :</label>
                                    <input type="text" name="lulus" id="lulus" value="{{ $kerja->keluar}}" class="form-control" style="color: black" disabled> 
                        <hr>
                                @endforeach
                            

                            {{-- TIdak Ada Data
                            <br>
                                    <a href="#" class="btn btn-danger" >Tambah Pekerjaan</a>
                             --}}
                        </div>

                        @endforeach