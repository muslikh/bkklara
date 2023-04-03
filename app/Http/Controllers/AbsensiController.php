<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Absensi;
use App\Logabsensi;
use App\User;
use Illuminate\Support\Facades\Input;
use Alert;

class AbsensiController extends Controller
{
    
    public function absensi(Request $request)
    {
        $kode_kelas = $request->kode_kelas;
        $semester = $request->semester;
        // $id_siswa = $request->id_siswa;

        $kelas = Kelas::get();
        // with(['get_user'
        // => function($q) use($kode_kelas) {
        //     // Query the name field in status table
        //     $q->where('kode_kelas', '=', $kode_kelas);
        // }])->get();
       
        // $user = User::where('kode_kelas','=',$kode_kelas)
        // ->with(['absensi'
        // => function($q) use($semester) {
        //     // Query the name field in status table
        //     $q->where('semester', '=', $semester);
        // }])->simplepaginate(5);
        $absensi = Absensi::join('users','absensis.siswaID','=','users.id')
        ->where('absensis.semester','=',$semester)
        ->where('absensis.kode_kelas','=',$kode_kelas)
        ->get();
        
        // $absensi = Absensi::with(['get_user'
        // => function($q) use($kode_kelas) {
        //     $q->where('kode_kelas', '=', $kode_kelas);
        // }])->where('semester', '=', $semester)->simplepaginate(5);
       
    //->with('hadir', $hadir)->with('sakit', $sakit)->with('ijin', $ijin)->with('alpha', $alpha)
        return view('absensi',['kelas'=>$kelas],['absensi'=>$absensi])
        ;
    } 

    public function detailabsensi(Request $request)
    {
        $kode_kelas = $request->kode_kelas;
        $semester = $request->semester;
        $id_siswa = $request->siswaID;

        $absensi = Logabsensi::where('siswaID','=',$id_siswa)->where('kode_kelas','=',$kode_kelas)->where('semester','=',$semester)->get();

        
        return view('detailabsensi',['absensi'=>$absensi]);
    }

    public function hitung(Request $request)
    {

        $kode_kelas = $request->kode_kelas;
        $semester = $request->semester;

        $id_siswa = Input::get('siswaID');

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
        
            // return redirect ()->back()->with('pesan','Hitung Absen Sukses');
            // Alert::success('Pesan','Hitung Absen Sukses');
            toast('Hitung Absen Sukses','success')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
    }
}
