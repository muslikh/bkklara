<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    //
    
    public function get_user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function perusahaan(){
    	return $this->belongsTo('App\Perusahaan','id_industri','id_industri');
    }
    
    // public function lamaran(){
    // 	return $this->hashMany('App\Lamaran','id_lowongan');
    // }
}
