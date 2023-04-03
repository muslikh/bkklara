<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Pekerjaan;
use App\Pengumuman;
use App\Lamaran;
use App\Lowongan;
use App\Pendidikan;
use PDF;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Alert;

class AlumniController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman=DB::table('pengumuman')->orderBy('id_pengumuman', 'DESC')->simplepaginate(5);
        return view('homeAlumni',['pengumuman'=>$pengumuman]);
    }

    public function dataalumni()
    {
        $alumni=Alumni::where('status','=','aktif')->paginate(5);
        return view('dataalumni',['alumni'=>$alumni]);
    }

    public function infofront()
    {
        // $info=Pengumuman::orderby('updated_at','desc')->paginate(5);
        $info=DB::table('pengumuman')->orderby('updated_at','desc')->paginate(5);
         return view('infofront',['info'=>$info]);
    }

    public function alumnibaru()
    {
        $alumniregistrasi =Alumni::where('status','=','belum_aktif')->paginate(5);
        return view('dataregistrasi',['alumniregistrasi'=>$alumniregistrasi]);
    }
    
    public function tambah()
    {
        return view('tambahalumni');
    }

    public function ptambah(Request $request)
    {
        $user=new Alumni();
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->telepon = $request->hp;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->enis_kelamin;
        $user->password = Hash::make($request->password);
        $user->berat = $request->berat_badan;
        $user->tinggi = $request->tinggi_badan;
        $user->status='aktif';
        $user->save();

        if($user->save())
        {  
            toast('Tambah Data Berhasi','success')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
        }else{  
            toast('Tambah Data Gagal','failed')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
        }

    }
    
    public function validasialumni($id)
    {
        $db=Alumni::where('id','=',$id)
        ->update([
            'status' => 'aktif',
        ]
        );
        toast('validasi Berhasil','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }

    public function hapusalumni($id)
    {
        $db=Alumni::where('id','=',$id)->delete();
        toast('Hapus  Berhasi','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }

    public function detail($id)
    {
        // ,function ($query) {
        //     $query->where('user_id', '=', $id);
        // }
        $alumni=Alumni::
        with(['pendidikan'],['pekerjaan'])
        ->where('id','=',$id)->get();
        // dd($alumni);
        return view('detailalumni')->with('alumni',$alumni);
        // return view('detailalumni',compact('alumni'));
        
    }


    public function dataku($id)
    {
        // $q->select('id', 'name');
        $dataku=Alumni::
        where('id','=',$id)
        ->get();
        // with(['pekerjaan' => function ($query)  use ($id) {
        //     $query->where('user_id', '=', $id);
        // }])
        // $pendidikan=Pendidikan::where('user_id','=',$id)->get();
        $pekerjaan=Pekerjaan::where('user_id','=',$id)
        ->with(['pendidikan'=> function ($query)  use ($id) {
                $query->where('user_id', '=', $id);
            }])
        ->get();
        // dd($dataku);
        // return view('dataku',['dataku'=>$dataku],['pendidikan'=>$pendidikan]);
        return view('dataku',['dataku'=>$dataku],['pekerjaan'=>$pekerjaan]);
    }

    public function cv($id)
    {
        // ,function ($query) {
        //     $query->where('user_id', '=', $id);
        // }
        $alumni=Alumni::
        with(['pendidikan' => function ($query)  use ($id) {
            $query->where('user_id', '=', $id);
        }])
        ->where('id','=',$id)
        ->get();
        $pekerjaan=Pekerjaan::where('user_id','=',$id)->get();

    	$pdf = PDF::loadview('alumniCV',['alumni'=>$alumni],['pekerjaan' => $pekerjaan]);
    	return $pdf->download('cv.pdf');
    }
    public function keterserapan()
    {
        // $data=Alumni::where('status_user','=',''  )->get();
        // return view('keterserapan',['data'=>$data]);

        return view('keterserapan');
    }

    public function dataketerserapan(Request $request)
    {
        $status = $request->status_user;
        $data=Alumni::where('status_user','=', $status )->get();
        // dd($data);
        return response()->json($data);
        // dd($data);
        // return view('keterserapan');
    }

    public function lamaranku($id)
    {
        // => function ($query)  use ($id) {
        //     $query->where('user_id', '=', $id);
        $lamaran=Lamaran::where('id_user','=', $id )
        ->with(['lowongan'])
        ->get();
        // dd($lamaran);
        return view('lamaranku',['lamaranku' => $lamaran]);
    }

    public function lowongan()
    {
        $datalowongan=Lowongan::with(['perusahaan'])->paginate(5);
        return view('alumnilowongan',['datalowongan'=>$datalowongan]);
    }

    public function detaillowongan($id)
    {
        $detaillowongan=Lowongan::with(['perusahaan'])->where('id_lowongan','=',$id)->get();
        return view('alumnidetaillowongan',['detaillowongan'=>$detaillowongan]);
    }

    public function kirimlamaran(Request $request)
    {
        
        $lamaran=new Lamaran();
        $lamaran->id_user = $request->id_user;
        $lamaran->id_lowongan = $request->id_lowongan;
        $lamaran->status = 'Menunggu';
        $lamaran->save();

        toast('Lamaran Berhasil Dikirim','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }
    
    
    public function diterima(Request $request)
    {
        $diterima = Lamaran::where('id_lowongan','=',$request->id_lowongan)
        ->where('id_user','=',$request->id_user)
        ->update([
            'status' => 'diterima',
            'pesan' => 'Selamat Kamu Sudah DI Terima, Silahkan Segera datang ke kantor ya',
        ]);

        toast('Update Berhasil','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }
    public function diproses(Request $request)
    {
        $diterima = Lamaran::where('id_lowongan','=',$request->id_lowongan)
        ->where('id_user','=',$request->id_user)
        ->update([
            'status' => 'diproses',
            'pesan' => 'Data lamaranmu sedang kami proses ya',
        ]);

        toast('Update Berhasil','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }
    public function ditolak(Request $request)
    {
        $diterima = Lamaran::where('id_lowongan','=',$request->id_lowongan)
        ->where('id_user','=',$request->id_user)
        ->update([
            'status' => 'ditolak',
            'pesan' => 'Mohon Maaf Anda Belum masuk kriteria yg kami butuhkan saat ini :) ',
        ]);

        toast('Update Berhasil','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }

    public function tambahpendidikan(Request $request,$id)
    {
        
        $pendidikan=new Pendidikan();
        $pendidikan->user_id = $id;
        $pendidikan->tingkat = $request->tingkat;
        $pendidikan->instansi = $request->instansi;
        $pendidikan->masuk = $request->masuk;
        $pendidikan->lulus = $request->lulus;
        $pendidikan->save();

        toast(' Berhasil ','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }
    

    public function tambahpekerjaan(Request $request,$id)
    {
        
        $pendidikan=new Pekerjaan();
        $pendidikan->user_id = $id;
        $pendidikan->tempat = $request->tempat;
        $pendidikan->masuk = $request->masuk;
        $pendidikan->keluar = $request->keluar;
        $pendidikan->save();

        toast(' Berhasil ','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }
    
}
