<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Form;

class AdminController extends Controller
{
    
    public function index()
    {
        $artikel=Artikel::paginate(5);
        return view('dataartikel',['artikel'=>$artikel]);
    }

    public function tambahArtikel()
    {

        return view('tambahartikel');
    }

    public function ptambah(Request $request)
    {
        $artikel=new Artikel();
        $artikel->judul = $request->judul;
        $artikel->isi_artikel = $request->isi_artikel;
        $artikel->penulis = 'Admin BKK';
        $artikel->save();

        if($artikel->save())
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

    
    public function hapusartikel(Request $request)
    {
        $id = $request->id;
        $db=Artikel::where('id','=',$id)->delete();
        toast('Hapus Artikel Berhasi','success')
        ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
        ->width('300px')->position('top-end');

        return back();
    }

    public function show($id)
    { 
            $artikeldetail = Artikel::where('id','=',$id)->get();
            // $modaldata['content'] = $artikeldetail;
            // $modaldata['view'] = view('dataartikel.ajax_modal_view')->with('modaldata', json_encode($artikeldetail))->render();
        
            // echo json_encode($artikeldetail);
        return view('detailartikel',['artikeldetail'=>$artikeldetail]);
        // echo json_encode($artikeldetail);
    }

    public function artikeldetail($id)
    { 
            $artikeldetail = Artikel::where('id','=',$id)->get();
            // $modaldata['content'] = $artikeldetail;
            // $modaldata['view'] = view('dataartikel.ajax_modal_view')->with('modaldata', json_encode($artikeldetail))->render();
        
            // echo json_encode($artikeldetail);d
            // dd($artikeldetail);
        // return view('detailartikel',['artikeldetail'=>$artikeldetail]);
        echo json_encode($artikeldetail);
    }

        
    public function front(Request $request)
    { 
        $artikel=Artikel::orderby('updated_at','desc')->paginate(5);
      return view('frontartikel',['artikel'=>$artikel]);
    }


    public function ubahartikel($id)
    {
        $artikel=Artikel::where('id','=',$id)->get();
        return view('ubahartikel',['artikel'=>$artikel]);
    }

    public function pubah(Request $request,$id)
    {
        $artikel=Artikel::where('id','=',$id)
        ->update([
            'judul' => $request->judul,
            'isi_artikel' => $request->isi_artikel
        ]);

        if($artikel)
        {  
            toast('Ubah Data Berhasi','success')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
        }else{  
            toast('Ubah Data Gagal','failed')
            ->autoClose(5000)->timerProgressBar()->background('#ffffffc2')
            ->width('300px')->position('top-end');

            return back();
        }
    }

}