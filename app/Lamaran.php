<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    
    public function lowongan(){
    	return $this->belongsTo('App\Lowongan','id_lowongan','id_lowongan');
    }
    
    public function perusahaan(){
    	return $this->belongsTo('App\Perusahaan','id','id_industri');
    }

    public function get_alumni(){
    
    	return $this->belongsTo('App\Alumni','id_user','id');
    }

}
