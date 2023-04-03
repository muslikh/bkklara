<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lowongan;
use App\Perusahaan;
use App\Jurusan;
use App\Lamaran;

class LowonganController extends Controller
{
    public function index()
    {
        $datalowongan=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->paginate(5);
        return view('datalowongan',['datalowongan'=>$datalowongan]);
    }

    public function tambahLowongan()
    {

        $perusahaan = Perusahaan::get();
        $jurusan = Jurusan::get();
        return view('tambahlowongan',['perusahaan'=>$perusahaan],['jurusan'=>$jurusan]);
    }

    public function ptambah(Request $request)
    {
        $lowongan=new Lowongan();
        $lowongan->id_industri = $request->nama;
        $lowongan->judul = $request->judul;
        $lowongan->lain = $request->persyaratan;
        $lowongan->id_jurusan = $request->jurusan;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->kualifikasi = $request->kualifikasi;
        $lowongan->catatan = $request->catatan;
        $lowongan->buka = $request->buka;
        $lowongan->tutup = $request->tutup;
        $lowongan->save();

        if($lowongan->save())
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
    
        public function show(Request $request)
        { 
            $datalowongan=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->where('id_lowongan','=',$request->id)->get();
            echo json_encode($datalowongan);
        }

        public function frontlowongandetail($id)
        { 
            $lowongandetail = Lowongan::with(['perusahaan'])->where('id_lowongan','=',$id)->get();
            return view('detaillowongan',['lowongandetail'=>$lowongandetail]);
        }

    
        public function front(Request $request)
        { 
          $lowongan=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->paginate(5);
          return view('frontlowongan',['lowongan'=>$lowongan]);
        }

        public function frontApi(Request $request)
        { 
            $nama=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->pluck('nama');
            $judul=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->pluck('judul');
            $id_lowongan=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->pluck('id_lowongan');
            $lowongan=Lowongan::join('perusahaans','lowongans.id_industri','=','perusahaans.id_industri')->pluck('nama');
          
          return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'nama' => $nama,
            'id_lowongan' => $id_lowongan,
            'judul' => $judul
        ], 200);
        }

        public function hapuslowongan($id)
        { 
            
            $Lowongan=Lowongan::where('id_lowongan','=',$id)->delete();

                toast('Hapus Data Berhasi','success')
                ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
                ->width('300px')->position('top-end');

                return back();
        }
    
        
    public function detaillowongan($id)
    {
        $detaillowongan=Lowongan::with(['perusahaan'])->where('id_lowongan','=',$id)->get();
        return view('dtlowongan',['detaillowongan'=>$detaillowongan]);
    }

    public function datapelamar(Request $request,$id)
    {

    //     => function ($query)  use ($id) {
    //         $query->where('id_user', '=', $id);
    // }
        $datapelamar=Lamaran::with(['get_alumni'])
        ->where('id_lowongan','=',$id)->simplepaginate(5);
        // dd($datapelamar);
        return view('datapelamar',['datapelamar'=>$datapelamar]);
    }

}
