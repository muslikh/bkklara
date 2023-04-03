<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mapel;
use App\Dkn;
use App\Logabsensi;
use App\Jadwal_pelajaran;
use App\Jadwal;
use App\Absensi;
use Illuminate\Support\Facades\DB;
use \Response;
use Mail;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use File;
use Kawankoding\Fcm\FcmServiceProvider;

class SiswaController extends Controller 
{
    
    public function index()
    {
        // $user=user::all();
        $user=User::where('status_siswa','=','aktif')->where('level','=','siswa')->get();
       
        // $data=[$user];

        // return $user;
        echo json_encode($user);

    }

    public function create(Request $request)
    {
        $user=new User();
        $user->email = $request->email;
        $user->nisn = $request->nisn;
        $user->hp = $request->hp;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->nama = $request->nama;
        $user->tahun_masuk = $request->tahun_masuk;
        $user->id_jenis_kelamin = $request->id_jenis_kelamin;
        $user->kode_kelas = $request->kode_kelas;
        $user->kelas_awal = $request->kelas_awal;
        $user->status_siswa='tidak_aktif';

        $user->save();
        if($user->save())
        {
            $result['code'] = '1';
            $result['code'] = 'sukses';
    
            echo json_encode($result);
            // return redirect ('datasiswa');
        }else{
            echo 'gagal boos';
        }

    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->nik = $request->nik;
        $user->id_jenis_kelamin = $request->id_jenis_kelamin;
        $user->id_agama = $request->id_agama;
        $user->kewarganegaraan = $request->kewarganegaraan;
        $user->anak_ke = $request->anak_ke;
        $user->jml_sdrkandung = $request->najml_sdrkandungma;
        $user->jml_sdrtiri = $request->jml_sdrtiri;
        $user->hobi = $request->hobi;
        $user->alamat = $request->alamat;
        $user->rt = $request->rt;
        $user->rw = $request->rw;
        $user->dusun = $request->dusun;
        $user->kabupaten = $request->kabupaten;
        $user->provinsi = $request->provinsi;
        $user->hp = $request->hp;
        $user->jenis_tinggal = $request->jenis_tinggal;
        $user->goldarah = $request->goldarah;
        $user->no_unsmp = $request->no_unsmp;
        $user->no_ijasah = $request->no_ijasah;
        $user->no_skhu = $request->no_skhu;
        $user->darisekolah = $request->darisekolah;
        $user->alamatsekolah = $request->alamatsekolah;
        $user->tinggi_badan = $request->tinggi_badan;
        $user->berat_badan = $request->berat_badan;
        $user->pindahdari = $request->pindahdari;
        $user->sakitygpernah = $request->sakitygpernah;
        $user->nama_ayah = $request->nama_ayah;
        $user->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
        $user->agama_ayah = $request->agama_ayah;
        $user->kewarga_ayah = $request->kewarga_ayah;
        $user->pendidikan_ayah = $request->pendidikan_ayah;
        $user->pekerjaan_ayah = $request->pekerjaan_ayah;
        $user->pengeluaran_ayah = $request->pengeluaran_ayah;
        $user->alamat_ayah = $request->alamat_ayah;
        $user->no_telpon_ayah = $request->no_telpon_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
        $user->agama_ibu = $request->agama_ibu;
        $user->kewarga_ibu = $request->kewarga_ibu;
        $user->pendidikan_ibu = $request->pendidikan_ibu;
        $user->pekerjaan_ibu = $request->pekerjaan_ibu;
        $user->pengeluaran_ibu = $request->pengeluaran_ibu;
        $user->alamat_ibu = $request->alamat_ibu;
        $user->no_telpon_ibu = $request->no_telpon_ibu;
        $user->nama_wali = $request->nama_wali;
        $user->tanggal_lahir_wali = $request->tanggal_lahir_wali;
        $user->agama_wali = $request->agama_wali;
        $user->kewarga_wali = $request->kewarga_wali;
        $user->pendidikan_wali = $request->pendidikan_wali;
        $user->pekerjaan_wali = $request->pekerjaan_wali;
        $user->pengeluaran_wali = $request->pengeluaran_wali;
        $user->alamat_wali = $request->alamat_wali;
        $user->no_telpon_wali = $request->no_telpon_wali;
        // $user->username = $request->username;
        // $user->password = Hash::make($request->get('password'));
        $user->status_siswa = 'aktif';
        $user->save();
        
        if($user->save())
        {

            $message = ['message'=>'sukses'];
            return $message ;
        }else{

        $message = ['message'=>'gagal'];
        return $message ;
        }
    }

    public function buatLogin(Request $request,$id)
    {
        $cek = User::where('username','=',$request->username)->count();

        if($cek > 0)
        {

            $message = ['message'=>'terpakai'];
             return $message ;

        }else{


            $user=User::find($id);
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            // $user->status_siswa = 'aktif';
            $user->save();

            if($user->save())
            {

                $message = ['message'=>'sukses'];
                return $message ;
            }else{

            $message = ['message'=>'gagal'];
            return $message ;
            }
            
        }

    }

    public function delete($id)
    {
        $user=user::find($id);
        $user->delete();

        return "Data Terhapus";
    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $user=User::where('id','=',$id)->get();
        if(count($user))
        {
            // foreach($user as $w)
            // {

                $user->nama=$request->nama;
                $user->id=$request->id;
                $user->username=$request->username;
                $user->level=$request->level;
                // $user->foto=$request->foto;
                // $result['success'] = 1;
                // $result['message'] = 'success';
                //memanggil data user sesi login
                // $result['nama'] = $w->nama;
                // $result['id'] = "$w->id";
                // $result['username'] = $w->username;
                // $result['password'] = Hash::check($w->password);
                // $result['level'] = $w->level;
            // }

            echo json_encode($user);
        }else{

        //     $result['success'] = "0";
        $message = ['message'=>'Data Tidak Ditemukan'];
            echo json_encode($message);
        }

    }
    public function detail_foto(Request $request,$id)
    {
        // $user=User::find($id);
        $result=User::where('id','=',$id)->get();
        if(count($result))
        {
            
        $result->foto=$request->foto;
        $result->file=$request->file;
            // foreach($user as $w)
            // {
            //     $result['success'] = 1;
            //     $result['message'] = 'success';
            //     //memanggil data user sesi login
            //     $result['id'] = "$w->id";
            //     $result['foto'] = $w->foto;
            // }

            echo json_encode($result);
        }else{

        $message = ['message'=>'Data Tidak Ditemukan'];
            echo json_encode($message);
        }
    }
    public function ganti_foto(Request $request,$id)
    {
        $user=User::find($id);

        $user->foto=$request->foto;
        
        $user->save();



        if($user)
        {
                $result['success'] = 1;
                $result['message'] = 'success';
            echo json_encode($user);
        }else{

        $message = ['message'=>'gagal'];
            echo json_encode($message);
        }
    }

    public function siswa_baru()
    {
        $datappdb=User::where('status_siswa','=','tidak_aktif')->get();
       
        $data=[$datappdb];

        return $data;

    }

    public function diterima()
    {
        $user=User::where('status_siswa','=','belum_aktif')->get();
       
        // $data=[$user];

        echo json_encode($user);
    }
    
    public function jmlditerima()
    {
        $user=User::where('status_siswa','=','belum_aktif')->count();
        $aktif=User::where('status_siswa','=','aktif')->count();
        
            $result[]=[
                'belum_aktif'=>$user,
                'sudah_aktif'=>$aktif
            ];
              
        echo json_encode($result);
    }

    public function validasi(Request $request, $id)
    {
        $user=User::find($id);
        $user->status_siswa=$request->status_user;
        $user->save();

        return "Data tervalidasi";
    }

    public function cekkode(Request $request)
    {
        $id = $request->id;
        $kode_aktivasi = $request->kode_aktivasi;

        $cekkode =User::where('id','=',$id)
        ->where('kode_aktivasi','=',$kode_aktivasi)
        ->get();


        

        if(count($cekkode) == 1)
        {

            $result["success"] = 1;
            $result['message'] = 'Kode Benar';

            // return $result;
            echo json_encode($result);
        }else{

            $result['success'] = 0;
            $result['message'] = 'Kode Salah';

            echo json_encode($result);
        }
     }




     public function pengumuman(Request $request)
     {
         // $user=User::find($id);
         $pengumuman=DB::table('pengumuman')->orderby('tgl_pengumuman','DESC')->get();
         if(count($pengumuman))
         {
             
        $pengumuman->id_pengumuman=$request->id_pengumuman;
        $pengumuman->judul_pengumuman=$request->judul_pengumuman;
        $pengumuman->isi_pengumuman=$request->isi_pengumuman;
        $pengumuman->tgl_pengumuman=$request->tgl_pengumuman;
        $pengumuman->level=$request->level;
        
                 
             echo json_encode($pengumuman);
         }else{
 
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }
     
    public function nilairapor(Request $request)
     {
        $users_id = $request->users_id;
        $semester = $request->semester;
         $nilai = DB::table('nilai_rapors')->where('users_id',$users_id)->where('semester',$semester)->get();
         if(count($nilai))
         {
             
        $nilai->rerataP=$request->rerataP;
        $nilai->rerataK=$request->rerataK;
        $nilai->total=$request->total;
                 
             echo json_encode($nilai);
         }else{
 
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }


     public function dkn(Request $request)
     {
        $users_id = $request->users_id;
        $semester = $request->semester;

         
          $dkn=Dkn::with(['get_mapel'],['get_user'])->where('users_id','=',$users_id)->where('semester','=',$semester)->get();
 
          

          
         if(count($dkn))
         {
            foreach($dkn as $i => $w)
            { 
                
                // $hasil['dkn'][$i]['id']=$w->id;
                // $hasil['dkn'][$i]['nama_mapel']=$w->get_mapel->nama_mapel;
                // $hasil['dkn'][$i]['nilaiAngkaPengetahuan']=$w->nilaiAngkaPengetahuan;
                // $hasil['dkn'][$i]['nilaiHurufPengetahuan']=$w->nilaiHurufPengetahuan;
                // $hasil['dkn'][$i]['nilaiAngkaKeterampilan']=$w->nilaiAngkaKeterampilan;
                // $hasil['dkn'][$i]['nilaiHurufPengetahuan']=$w->nilaiHurufPengetahuan;
                // $hasil['dkn'][$i]['kkm']=$w->kkm;
                    $hasil[]=[
                        'id'=>$w['id'],
                        'nama_mapel'=>$w->get_mapel->nama_mapel,
                        'nilaiAngkaPengetahuan'=>$w->nilaiAngkaPengetahuan,
                        'nilaiHurufPengetahuan'=>$w->nilaiHurufPengetahuan,
                        'nilaiAngkaKeterampilan'=>$w->nilaiAngkaKeterampilan,
                        'nilaiHurufKeterampilan'=>$w->nilaiHurufKeterampilan,
                        'kkm'=>$w->kkm,
                        // 'semester'=>$w->semester,
                  ];
                  
                  
            }
            
                $jmlP = 0;
                $jmlK = 0;
                foreach($hasil as $i=>$value)
                {
                    $jmlP +=$value['nilaiAngkaPengetahuan'];
                    $jmlK +=$value['nilaiAngkaKeterampilan'];
                }
                
                    $pembagi = count($hasil);
                    // $hasil[] = [
                    //     'jmlP'=>$jmlP,
                    //     'jmlK'=>$jmlK,
                    //     'rerataP'=>$jmlP/$pembagi,
                    //     'rerataK'=>$jmlK/$pembagi,
                    //     'total'=>($jmlP/$pembagi)+($jmlK/$pembagi)
                    //     ];
                    $cek = DB::table('nilai_rapors')
                        ->where('users_id', $request->users_id)
                        ->where('semester', $request->semester)
                        ->count();
                        
                    if($cek > 0 ){ 
                        
                        $nilai_rapors = DB::table('nilai_rapors')
                        ->where('users_id', $request->users_id)
                        ->where('semester', $request->semester)
                        ->update([
                                'rerataP' => $jmlP/$pembagi,
                                'rerataK' => $jmlK/$pembagi,
                                'total' => ($jmlP/$pembagi)+($jmlK/$pembagi)
                                
                        ]);
                    }else{
                        $nilai_rapors = DB::table('nilai_rapors')->insert([
        
                                'users_id' => $request->users_id,
                                'semester' => $request->semester,
                                'rerataP' => $jmlP/$pembagi,
                                'rerataK' => $jmlK/$pembagi,
                                'total' => ($jmlP/$pembagi)+($jmlK/$pembagi)
                                
                        ]);
                       
                    }
                    
                    
             echo json_encode($hasil);
            // return $hasil;
         }else{
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
 
     }

     public function jdwlPelajaran(Request $request)
     {
         $kode_kelas = $request->kode_kelas;
         $semester = $request->semester;

         $jadwal = Jadwal_pelajaran::with(['get_mapel'])->where('kode_kelas','=', $kode_kelas)->get();
         if(count($jadwal))
         {
            foreach($jadwal as $i => $w)
            { 
                
                    $hasil[]=[
                        'hari'=>$w->hari,
                        'kode_kelas'=>$w->kode_kelas,
                        'id_mapel'=>$w->get_mapel->nama_mapel,
                        'nama_guru'=>$w->nama_guru,
                        'jam_ke'=>$w->jam_ke
                  ];
                  
            }
            return $hasil;
         }else{
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }

     public function jdwlUjian(Request $request)
     {
         $kode_kelas = $request->kode_kelas;
         $semester = $request->semester;

         $jadwal = Jadwal::with(['get_mapel'])->where('kode_kelas','=', $kode_kelas)->get();
         if(count($jadwal))
         {
            foreach($jadwal as $i => $w)
            { 
                
                    $hasil[]=[
                        'hari'=>$w->hari,
                        'kode_kelas'=>$w->kode_kelas,
                        'id_mapel'=>$w->get_mapel->nama_mapel,
                        'nama_guru'=>$w->nama_guru,
                        'waktu'=>$w->waktu,
                        'jenis'=>$w->jenis
                  ];
                  
            }
            return $hasil;
         }else{
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }

     public function absen(Request $request)
     {
         $cek = Absensi::where('siswaID','=',$request->siswaID)->count();
         if($cek > 0)
         {
             Absensi::where('siswaID','=',$request->siswaID)
             ->update([
 
                 'kode_kelas' => $request->kode_kelas,
                 'semester' => $request->semester,
                 'hadir' => $request->hadir,
                 'ijin' => $request->ijin,
                 'alpha' => $request->alpha,
                 'sakit' => $request->sakit
             ]);
         }else{
             Absensi::insert([
 
                 'siswaID' => $request->siswaID,
                 'kode_kelas' => $request->kode_kelas,
                 'semester' => $request->semester,
                 'hadir' => 0,
                 'ijin' => 0,
                 'alpha' => 0,
                 'sakit' => 0
             ]);
         }
         $image = $request->foto;  // your base64 encoded
 
         $image = str_replace('data:image/jpg;base64,', '', $image);
         $image = str_replace(' ', '+', $image);
         $imageName = 'surat'.str_random(10).'.'.'jpg';
         \File::put(public_path(). '/data/images/' . $imageName, base64_decode($image));
 
 // 		$user = User::find($id);
 // 		$user->foto=$image;
 // 		$user->file=$imageName;
         
 // 		$user->save();
         $jenis = $request->jenis;

         if($jenis == 'masuk')
         {

                $absen = Logabsensi::insert([
    
                    'siswaID' => $request->siswaID,
                    'kode_kelas' => $request->kode_kelas,
                    'semester' => $request->semester,
                    'tgl' => $request->tgl,
                    'jam' => $request->jam,
                    'ket_masuk' => $request->ket_masuk,
                    'status' => $request->status,
                    'jenis' => $request->jenis
                ]);
                if($absen)
                {
                    $fcm_ortu = User::where('id','=',$request->siswaID)->value('fcm_ortu');
                    $nama = User::where('id','=',$request->siswaID)->value('nama');
        
                    fcm()
                    // ->toTopic('umum')
                    ->to([$fcm_ortu])
                    ->priority('high')
                    ->timeToLive(0)
                    ->data([
                            'title' => 'Pemberitahuan Kehadiran Siswa',
                            'message' => $nama.'Telah Melakukan Absensi dengan keterangan '
                            .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                        ])
                    ->notification([
                        'title' => 'Pemberitahuan Kehadiran Siswa',
                        'message' => $nama.'Telah Melakukan Absensi dengan keterangan '
                        .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                    ])
                    ->send();
                    $result["success"] = 1;
                    $result['message'] = 'sukses';
        
                    echo json_encode($result);
                }else{
        
                    $result['success'] = 0;
                    $result['message'] = 'Gagal';
        
                    echo json_encode($result);
                }
         }else if($jenis == 'pulang')
         {

                    $absen = Logabsensi::where( 'siswaID','=',$request->siswaID)
                    ->where('tgl','=',$request->tgl)
                    ->update([
                        'jam_pulang' => $request->jam,
                        'ket_pulang' => $request->ket_pulang,
                        'status' => $request->status,
                        'jenis_pulang' => $request->jenis
                    ]);
                    if($absen)
                    {
                        $fcm_ortu = User::where('id','=',$request->siswaID)->value('fcm_ortu');
                        $nama = User::where('id','=',$request->siswaID)->value('nama');

                        fcm()
                        // ->toTopic('umum')
                        ->to([$fcm_ortu])
                        ->priority('high')
                        ->timeToLive(0)
                        ->data([
                                'title' => 'Pemberitahuan Kehadiran Siswa',
                                'message' => $nama.'Telah Melakukan Absensi Pulang dengan keterangan '
                                .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                            ])
                        ->notification([
                            'title' => 'Pemberitahuan Kehadiran Siswa',
                            'message' => $nama.'Telah Melakukan Absensi Pulang dengan keterangan '
                            .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                        ])
                        ->send();
                        $result["success"] = 1;
                        $result['message'] = 'sukses';

                        echo json_encode($result);
                    }else{

                        $result['success'] = 0;
                        $result['message'] = 'Gagal';

                        echo json_encode($result);
                    }
         }else if($jenis == 'tidak_masuk')
         {
                    $absen = Logabsensi::insert([
            
                        'siswaID' => $request->siswaID,
                        'kode_kelas' => $request->kode_kelas,
                        'semester' => $request->semester,
                        'tgl' => $request->tgl,
                        'jam' => $request->jam,
                        'ket_masuk' => $request->ket_masuk,
                        'status' => $request->status,
                        'foto' => $imageName,
                        'keterangan' => $request->keterangan,
                        'jenis' => $request->jenis
                    ]);
                    if($absen)
                    {
                        $fcm_ortu = User::where('id','=',$request->siswaID)->value('fcm_ortu');
                        $nama = User::where('id','=',$request->siswaID)->value('nama');

                        fcm()
                        // ->toTopic('umum')
                        ->to([$fcm_ortu])
                        ->priority('high')
                        ->timeToLive(0)
                        ->data([
                                'title' => 'Pemberitahuan Kehadiran Siswa',
                                'message' => $nama.'Telah Melakukukan pengisian form jetidak hadiran dengan keterangan '
                                .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                            ])
                        ->notification([
                            'title' => 'Pemberitahuan Kehadiran Siswa',
                            'message' => $nama.'Telah Melakukukan pengisian form jetidak hadiran dengan keterangan '
                                .$request->status.' pada tanggal '.$request->tgl.' jam '.$request->jam,
                        ])
                        ->send();
                        $result["success"] = 1;
                        $result['message'] = 'sukses';

                        echo json_encode($result);
                    }else{

                        $result['success'] = 0;
                        $result['message'] = 'Gagal';

                        echo json_encode($result);
                    }
         }
      }
     public function log_absensi(Request $request)
     {
        $kode_kelas = $request->kode_kelas;
        $siswaID = $request->siswaID;
         $semester = $request->semester;

         $jadwal = Logabsensi::where('kode_kelas','=', $kode_kelas)->where('semester','=', $semester)->where('siswaID','=', $siswaID)->get();
         if(count($jadwal))
         {
            foreach($jadwal as $i => $w)
            { 
                
                    $hasil[]=[
                        'siswaID'=>$w->siswaID,
                        'kode_kelas'=>$w->kode_kelas,
                        'tgl'=>$w->tgl,
                        'jam'=>$w->jam,
                        'jam_pulang'=>$w->jam_pulang,
                        'jenis'=>$w->jenis,
                        'status'=>$w->status,
                        'keterangan'=>$w->keterangan,
                        'semester'=>$w->semester,
                        'ket_masuk'=>$w->ket_masuk,
                        'ket_pulang'=>$w->ket_pulang
                  ];
                  
            }
            return $hasil;
         }else{
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }

     public function jml_absensi(Request $request)
     {
        $kode_kelas = $request->kode_kelas;
        $siswaID = $request->siswaID;
         $semester = $request->semester;

         $jadwal = Absensi::where('kode_kelas','=', $kode_kelas)->where('semester','=', $semester)->where('siswaID','=', $siswaID)->get();
         if(count($jadwal))
         {
            foreach($jadwal as $i => $w)
            { 
                
                    $hasil[]=[
                        'siswaID'=>$w->siswaID,
                        'kode_kelas'=>$w->kode_kelas,
                        'semester'=>$w->semester,
                        'hadir'=>$w->hadir,
                        'sakit'=>$w->sakit,
                        'ijin'=>$w->ijin,
                        'alpha'=>$w->alpha
                  ];
                  
            }
            return $hasil;
         }else{
         $message = ['message'=>'Data Tidak Ditemukan'];
             echo json_encode($message);
         }
     }


    public function hitung(Request $request)
    {

        $kode_kelas = $request->kode_kelas;
        $semester = $request->semester;

        $id_siswa = $request->siswaID;
        // $id_siswa = Input::get('siswaID');

        $hadir = Logabsensi::where('siswaID', '=', $id_siswa)
        ->where('semester','=',$semester)->where('status','=','hadir')->count();
        $sakit = Logabsensi::where('siswaID', '=', $id_siswa)
        ->where('semester','=',$semester)->where('status','=','sakit')->count();
        $ijin = Logabsensi::where('siswaID', '=', $id_siswa)
        ->where('semester','=',$semester)->where('status','=','ijin')->count();
        $alpha = Logabsensi::where('siswaID', '=', $id_siswa)
        ->where('semester','=',$semester)->where('status','=','alpha')->count();
        
        
        // $cek = Absensi::where('siswaID', '=',$id_siswa)->count();
        
            Absensi::where('siswaID','=',$id_siswa)
            ->update([

                'kode_kelas' => $request->kode_kelas,
                'semester' => $request->semester,
                'hadir' => $hadir,
                'ijin' => $ijin,
                'alpha' => $alpha,
                'sakit' => $sakit
            ]);
        
            $message = [
                'message'=>'hitung sukses',
            'hadir'=>$hadir,
            'sakit'=>$sakit,
            'ijin'=>$ijin,
            'alpha'=>$alpha];
            
            echo json_encode($message);
            
    }

    public function cekAbsen(Request $request)
    {

        $kode_kelas = $request->kode_kelas;
        $semester = $request->semester;

        $siswaID = $request->siswaID;
        // $id_siswa = Input::get('siswaID');

      $tgl =  date('d-m-Y'); 
        
      $jampulang = Logabsensi::where('kode_kelas','=', $kode_kelas)
      ->where('semester','=', $semester)->where('siswaID','=', $siswaID)
      ->where('jenis_pulang','=','pulang')->value('jam_pulang');
      $jammasuk = Logabsensi::where('kode_kelas','=', $kode_kelas)
      ->where('semester','=', $semester)->where('siswaID','=', $siswaID)
      ->where('jenis','=','masuk')->value('jam');
      $masuk = Logabsensi::where('kode_kelas','=', $kode_kelas)
      ->where('semester','=', $semester)->where('siswaID','=', $siswaID)
      ->where('tgl','=', $tgl)->where('jenis','=','masuk')->count();
      $pulang = Logabsensi::where('kode_kelas','=', $kode_kelas)
      ->where('semester','=', $semester)->where('siswaID','=', $siswaID)
      ->where('tgl','=', $tgl)->where('jenis_pulang','=','pulang')->count();
      $tdkmasuk = Logabsensi::where('kode_kelas','=', $kode_kelas)
      ->where('semester','=', $semester)->where('siswaID','=', $siswaID)
      ->where('tgl','=', $tgl)->where('jenis','=','tidak_masuk')->count();
        
        if($masuk > 0 )
        {
            $message[] = ['message'=>'sudah_absen_masuk',
            'pulang' => $pulang,
            'tdkmasuk'=> $tdkmasuk,
            'tgl'=>$tgl,'jam' => $jammasuk]; 
                return $message ;
        }
        // else if($pulang > 0 )
        // {
        //     $message[] = ['message'=>'sudah_absen_pulang',
        //     'tgl'=>$tgl,'jam' => $jampulang]; 
        //         return $message ;
        // }
        else{
            
            $message[] = [
                'message'=>'belum_absen',
                'masuk'=> $jammasuk,
                'pulang'=> $jampulang,
                'tdkmasuk'=> $tdkmasuk,
                'tgl'=>$tgl
            ]; 
                return $message ;
        }
            
    }

    public function lupaPass(Request $request)
    {

        $email = $request->email;
        $cek = User::where('email','=',$email)->count();

        if($cek > 0)
        {
            $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            $shuffle  = substr(str_shuffle($karakter), 0, 5);
    
            $user=User::where('email','=',$email) 
            ->update([
                    'kode_aktivasi' =>$shuffle
            ]);

            Mail::send('email-lupapass', ['nama' => $email,
            'pesan'=> $shuffle], function ($message) use ($email)
            // use ($request)
            {
                $message->subject('Kode Lupa Password');
                $message->from('donotreply@muslikh.my.id', 'Muslikh');
                $message->to($email);
            });

    
            $pesan[] = ['message'=>'sukses'];
            return $pesan ;

        }else{


                $message[] = ['message'=>'gagal'];
                return $message ;
        }
    }

    public function gantiPass(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $kode = $request->kode;

        $cek = User::where('email','=',$email)
        ->where('kode_aktivasi','=',$kode)->count();

        if($cek > 0)
        {
            
            $user=User::where('email','=',$email) 
            ->where('kode_aktivasi','=',$kode)
            ->update([
                    'password' => HASH::make($password)
            ]);

            $message = ['message'=>'berhasil'];
            return $message ;
        }else{


                $message = ['message'=>'gagal'];
                return $message ;
        }
    }
    
    public function tes(Request $request)
    {
        $level = $request->level;

        if($level == 'siswa')
        {
            $tes =  User::where('id','=',$request->id)
            ->update([
                'fcm_token' => $request->fcm_token,
                'deviceId' => $request->deviceId,
                'aktif' => $request->aktif
            ]);
            
            if($tes)
            {
                $message = ['message'=>'sukses'];
                return $message ;
           }else{
               
                $message = ['message'=>'gagal'];
                return $message ;
           }
        }else if($level == 'ortu')
        {

            $tes =  User::where('id','=',$request->id)
            ->update([
                'fcm_ortu' => $request->fcm_ortu,
                'deviceId_ortu' => $request->deviceId_ortu,
                'aktif_ortu' => $request->aktif_ortu
            ]);
            
            if($tes)
            {
                $message = ['message'=>'sukses'];
                return $message ;
           }else{
               
                $message = ['message'=>'gagal'];
                return $message ;
           }
        }
    }

    public function fcm()
    {

        fcm()
        ->toTopic('umum')
        // ->to()
        ->priority('normal')
        ->timeToLive(0)
        ->data([
                'title' => 'hello umum',
                'message' => 'tes umum'
            ])
        ->notification([
                'title' => 'hello umum',
                'message' => 'tes umum'
            ])
        ->send();
    }

}