<?php

namespace App\Http\Controllers;

use App\User;
use App\Jadwal_pelajaran;
use App\Jadwal;
use App\Dkn;
use App\Kelas;
use App\Mapel;
use App\Pengumunan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Alert;
use Mail;
use Auth;
use Kawankoding\Fcm\FcmServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman=DB::table('pengumuman')->orderBy('id_pengumuman', 'DESC')->simplepaginate(5);
        return view('home',['pengumunan'=>$pengumuman]);
    }

    public function siswa_baru()
    {
        $datappdb=User::where('status_siswa','=','tidak_aktif')->paginate(5);
        return view('datappdb',['casis'=>$datappdb]);
    }

    public function belumdaftarulang()
    {
        $belumDU=User::where('status_siswa','=','belum_aktif')->paginate(5);
        return view('belumdaftarulang',['belumDU'=>$belumDU]);
    }
    

    public function nilairapor(Request $request)
    {
        //Request $request
        $users_id = $request->id;
        $semester = $request->semester;
        $dkn=Dkn::with(['get_mapel'])->where('users_id','=',$users_id)->where('semester','=',$semester)->get();
 
        
          
        return view('nilairapor',['dkns'=>$dkn]); 
        // return view('nilairapor');
        // return view('tes');
    }

    public function datasiswa()
    {

        $datasiswas=User::where('status_siswa','=','aktif')->where('level','=','siswa')->simplePaginate(5);
        return view('datasiswa', ['siswa'=>$datasiswas]);
    }

    public function datakelas(Request $request)
    {
       $datakelas = Kelas::simplePaginate(5);
        return view('datakelas', ['kelas' => $datakelas]);
    }
    
    public function detailkelas(Request $request)
    {
        $id = $request->id;
        $kode_kelas = $request->kode_kelas;
       $count = User::where('kode_kelas','=',$kode_kelas)->count();
       //->with('count', $count)
        // $kelasdetail = Kelas::with(['get_mapel' => function($q)
        // {
        //     $q->where('kelas','=','X_AK');
        // }])->where('id_kelas','=',$id)->get();

        $kelasdetail = Kelas::where('id_kelas','=',$id)->get();
        $kelasdetail2 = Kelas::join('mapels','kelas.kode_kelas','=','mapels.kode_kelas')->where('id_kelas','=',$id)->get();
        return view('detailkelas',['kelasdetails'=>$kelasdetail],['kelasdetails2'=>$kelasdetail2])->with('count', $count);
    }

    public function tambahKelas()
    {

        return view('tambahkelas');
    }

    public function ptambahKelas(Request $request)
    {

        $kelas=DB::table('kelas')->insert([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas'=>$request->nama_kelas
            ]);
            
        if($kelas)
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
    }

    public function tambahsiswa()
    {

         return view('tambahsiswa');
    }

    public function tambahnilai(Request $request)
    {
        $kelas = $request->kelas;;
        
       $mapels = DB::table('mapels')->where('kode_kelas','=',$kelas)->get();
        return view('tambahnilai', ['mapels' => $mapels]);
    }


    public function ptambahnilai(Request $request)
    {
             foreach($request->mapel as $mapel) {
            $tets = new Dkn;

            foreach($request->mapel as $mapel) {
                $tets->mapels_id =$mapel;
            }
            foreach($request->kkm as $kkm) {
                    $tets->kkm =$kkm;
            }
            foreach($request->npa as $npa) {
                $tets->nilaiAngkaPengetahuan =$npa;
            }
            foreach($request->nph as $nph) {
                $tets->nilaiHurufPengetahuan =$nph;
            }
            foreach($request->nka as $nka) {
                $tets->nilaiAngkaKeterampilan =$nka;
                
            }
            foreach($request->nkh as $nkh) {
                $tets->nilaiHurufKeterampilan =$nkh;
                
            }
            foreach($request->users_id as $users_id) {
                $tets->users_id =$users_id;
                
            }
            foreach($request->semester as $semester) {
                $tets->semester =$semester;
                
            }

            $tets->save();
            }
       

        return redirect()->back()->with('pesan','Sukses Broo');
        
            // if($DKN->save())
            // {
            //     return redirect ()->back()->with('pesan','Sukses Broo');
            // }else{
            //     return redirect ()->back()->with('pesan','Gagal Broo');
            // }
    }
    
    public function datamapel()
    {

        $mapels = DB::table('mapels')->simplepaginate(5);
        return view('datamapel', ['mapel' => $mapels]);
    }
    public function mapelperkelas(Request $request)
    {
        // $kode_kelas = $request->kode_kelas;
        $mapels = DB::table('mapels')->where('kode_kelas', $request->get('id'))->pluck('nama_mapel','id');
        // $mapels = DB::table('mapels')->where('kode_kelas', $request->get('id'))->pluck('nama_mapel','id');
        
        return $response()->json($mapels);
    }

    public function tambahmapel()
    {

         return view('tambahmapel');
    }
    public function pmapel(Request $request)
    {
        $mapel = new Mapel;
        $mapel->kode_kelas = $request->kode_kelas;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->semester = $request->semester;
        $mapel->save();

        if($mapel->save())
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
    }

    public function jurusan()
    {

        $jurusans = DB::table('jurusans')->simplepaginate(5);
        return view('datajurusan', ['jurusan' => $jurusans]);
    }

    public function tjurusan()
    {

         return view('tambahjurusan');
    }

    public function pjurusn(Request $request)
    {
        $mapel = new Mapel;
        $mapel->kode_kelas = $request->kode_kelas;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->semester = $request->semester;
        $mapel->save();

        if($mapel->save())
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
    }

    public function tes()
    {

        
        return view('tes');
    }


    public function hapusmapel(Request $request)
    {
        $id = $request->id;
        $db=Mapel::where('id','=',$id)->delete();
        return redirect ()->back()->with('pesan','BErhasil Di Hapus');
    }


    public function jadwal(Request $request)
    {
        $kode_kelas = $request->kode_kelas;
        $hari = $request->hari;
       $kelas = Kelas::get();
       $jadwal = Jadwal_pelajaran::with(['get_mapel'])->where('kode_kelas','=',$kode_kelas)->where('hari','=',$hari)->get();

        return view('jadwal',['kelas'=>$kelas],['jadwal'=>$jadwal]);
    }
    public function tambahjadwal()
    {
        $guru = User::where('level','=','guru')->get();
        $kelas = Kelas::get();
        $mapel = Mapel::get();
        // $kelas = Kelas::with(['get_mapel'])->get();
        return view('tambahjadwal',['kelas'=>$kelas],['mapel' => $mapel]);
    }
    public function pjadwalPelajaran(Request $request)
    {
        $jadwalPelajaran=Jadwal_pelajaran::insert([
            'hari' => $request->hari,
            'kode_kelas'=>$request->kode_kelas,
            'id_mapel' => $request->id_mapel,
            'nama_guru' => $request->nama_guru,
            'jam_ke' => $request->jam_ke
            ]);
            
        if($jadwalPelajaran)
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
        
    }

    public function jadwalujian(Request $request)
    {
        $kode_kelas = $request->kode_kelas;
        $jenis = $request->jenis;
       $kelas = Kelas::get();
       $jadwal = Jadwal::with(['get_mapel'])->where('kode_kelas','=',$kode_kelas)->where('jenis','=',$jenis)->get();

        return view('jadwalUjian',['kelas'=>$kelas],['jadwal'=>$jadwal]);
    }
    public function tambahUjian()
    {
        $guru = User::where('level','=','guru')->get();
        $kelas = Kelas::get();
        $mapel = Mapel::get();
        // $kelas = Kelas::with(['get_mapel'])->get();
        return view('tambahujian',['kelas'=>$kelas],['mapel' => $mapel]);
    }
    public function pujian(Request $request)
    {
        $jadwalUjian=DB::table('jadwals')->insert([
            'hari' => $request->hari,
            'kode_kelas'=>$request->kode_kelas,
            'id_mapel' => $request->id_mapel,
            'nama_guru' => $request->nama_guru,
            'waktu' => $request->waktu,
            'jenis' => $request->jenis
            ]);
            
        if($jadwalUjian)
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
        
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
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->kode_kelas = $request->kode_kelas;
        $user->kelas_awal = $request->kelas_awal;
        $user->status_siswa='tidak_aktif';

        $user->save();
        if($user->save())
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }

    }


    public function editsiswa(Request $request)
    {
        $id = $request->id;
        $datasiswas=User::where('id','=',$id)->get();
        return view('editsiswa',['siswa'=>$datasiswas]);
    }

    public function peditsiswa(Request $request,$id)
    {
        // $id = $request->id;
        $user=User::find($id);
        $user->email = $request->email;
        $user->nisn = $request->nisn;
        $user->hp = $request->hp;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->nama = $request->nama;
        $user->tahun_masuk = $request->tahun_masuk;
        $user->id_jenis_kelamin = $request->id_jenis_kelamin;
        // $user->username = $request->username;
        // $user->password = Hash::make($request->password);
        $user->kode_kelas = $request->kode_kelas;
        $user->kelas_awal = $request->kelas_awal;
      
        $user->save();
        if($user->save())
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }

    }
    public function detailsiswa(Request $request)
    {
        $id = $request->id;
        
        $aktif=User::where('id','=',$id)->where('status_siswa','=','aktif')->get();
        $tidak_aktif=User::where('id','=',$id)->where('status_siswa','=','tidak_aktif')->get();

        if ($aktif)
        {
            $datasiswas=User::where('id','=',$id)->get();
            return view('detailsiswa',['siswa'=>$datasiswas]);
        }elseif($tidak_aktif)
        {

            $datasiswas=User::where('id','=',$id)->get();
            return view('detailsiswa',['siswa'=>$datasiswas]);
        }
    }

    public function validasisiswa(Request $request,$id,$nama,$email)
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $shuffle  = substr(str_shuffle($karakter), 0, 5);

        $user=User::find($id);
        $user->status_siswa='belum_aktif';
        $user->kode_aktivasi= $shuffle;
        $user->save();
        // $email = $request->email;

        Mail::send('email', ['nama' => $nama,
        'pesan'=> $shuffle], function ($message) use ($email)
        // use ($request)
        {
            $message->subject('Kode Daftar Ulang');
            $message->from('donotreply@muslikh.my.id', 'Muslikh');
            $message->to($email);
        });

        return redirect ()->back()->with('pesan','Siswa Sudah Di Validasi');
    }

    public function daftarulang($id)
    {
        $user=User::find($id);
        $user->status_siswa='aktif';
        $user->save();

        return redirect ()->back()->with('pesan','Siswa Sudah Daftar Ulang');
    }

    public function hapussiswa($id)
    {
        
        $datasiswas=User::where('id','=',$id)->delete();
        return redirect ()->back()->with('pesan','BErhasil Di Hapus');
    }

}
