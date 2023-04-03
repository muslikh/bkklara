<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Email extends Controller
{
    public function sendEmail(Request $request)
    {
        try{
            Mail::send('email', ['nama' => $request->nama,
            'pesan'=> $request->pesan], function ($message) use ($request)
            {
                $message->subject($request->judul);
                $message->from('donotreply@muslikh.my.id', 'Muslikh');
                $message->to($request->email);
            });

            return back()->with('alert-success','Berhasil');
        }
        catch (Exception $e)
        {
            return response (['status' => false, 'errors' => $e->getMessage()]);
        }
    }
}
