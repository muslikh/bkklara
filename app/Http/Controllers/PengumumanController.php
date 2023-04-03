<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Form;
use DB;

class PengumumanController extends Controller
{
    

    public function index()
    {

        $pengumuman=DB::table('pengumuman')->orderBy('id_pengumuman', 'DESC')->simplepaginate(5);
        return view('pengumuman', ['pengumuman'=>$pengumuman]);
    }


    public function tambahpengumuman()
    {
       
        return view('tambahpengumuman');
    }
    public function prosestambahpengumuman(Request $request)
    {
        $pengumuman=DB::table('pengumuman')->insert([
            'judul_pengumuman' => $request->judul_pengumuman,
            'isi_pengumuman'=>$request->isi_pengumuman,
            'tgl_pengumuman' => $request->tgl_pengumuman
            ]);
            
        if($pengumuman)
        {
            fcm()
            ->toTopic('umum')
            // ->to(['c7MzlI-4n6A:APA91bHXd4cbRMVZVbTz6cDVvvKEtYz8FL27fJYoBjThGwqPJ3ELOfrNvKPDWfGdaRWvExRlV2PckEMOPR9TE5Z-trXA-KPH1cY8cYNHmHoJn8OlkrYZRruGsmgQpdlLGQur6nJYiSwd'])
            ->priority('high')
            ->timeToLive(0)
            ->data([
                    'title' => $request->judul_pengumuman,
                    'message' => $request->isi_pengumuman
                ])
            ->notification([
                    'title' => $request->judul_pengumuman,
                    'message' => $request->isi_pengumuman
                ])
            ->send();
    
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }

    }

    public function editpengumuman(Request $request)
    {
        $id = $request->id;
        $db=DB::table('pengumuman')->where('id_pengumuman','=',$id)->get();
        return view('editpengumuman',['pengumuman'=>$db]);
    }
    
    public function peditpengumuman(Request $request)
    {
        $id = $request->id;
        
        $pengumuman=DB::table('pengumuman')->where('id_pengumuman','=',$id)
        ->update([
            'judul_pengumuman' => $request->judul_pengumuman,
            'isi_pengumuman'=>$request->isi_pengumuman,
            'tgl_pengumuman' => $request->tgl_pengumuma
            ]);
            
        if($pengumuman)
        {
            return redirect ()->back()->with('pesan','Sukses Broo');
        }else{
            return redirect ()->back()->with('pesan','Gagal Broo');
        }
    }
    public function hapuspengumuman(Request $request)
    {
        $id = $request->id;
        $db=DB::table('pengumuman')->where('id_pengumuman','=',$id)->delete();
        return redirect ()->back()->with('pesan','BErhasil Di Hapus');
    }


}
