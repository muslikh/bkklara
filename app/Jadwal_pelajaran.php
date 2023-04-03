<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_pelajaran extends Model
{
    public function get_mapel(){
    	return $this->belongsTo('App\Mapel','id_mapel','id');
    }
}
