<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Illuminate\Support\Facades\DB;
use Alert;

class PerusahaanController extends Controller
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
        $dataperusahaan=Perusahaan::where('status','=','aktif')->paginate(5);
        return view('dataperusahaan',['dataperusahaan'=>$dataperusahaan]);
    }

    public function perusahaanbaru()
    {
        $perusahaanregistrasi = Perusahaan::where('status','=','belum_aktif')->paginate(5);
        return view('perusahaanregistrasi',['perusahaanregistrasi'=>$perusahaanregistrasi]);
    }

    public function tambah()
    {
        return view('tambahperusahaan');
    }

    public function ptambah(Request $request)
    {
        $perusahaan=new Perusahaan();
        $perusahaan->email = $request->email;
        $perusahaan->password = $request->password;
        $perusahaan->nama = $request->nama;
        $perusahaan->telepon = $request->hp;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->website = $request->website;
        $perusahaan->tentang = $request->tentang;
        $perusahaan->status='aktif';
        $perusahaan->save();

        if($perusahaan->save())
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

    
    public function front(Request $request)
    { 
        $perusahaan=Perusahaan::where('status','=','aktif')->paginate(5);
      return view('frontperusahaan',['perusahaan'=>$perusahaan]);
    }

    public function hapusperusahaan($id)
    { 
        $Perusahaan=Perusahaan::where('id_industri','=',$id)->delete();

            toast('Hapus Data Berhasil','success')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
    }

    public function validasiperusahaan($id)
    { 
        $Perusahaan=Perusahaan::where('id_industri','=',$id)
        ->update([
            'status' => 'aktif',
        ]);

            toast('Validasi Data Berhasil','success')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
    }
    
    
}
