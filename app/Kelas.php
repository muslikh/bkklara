<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public function get_mapel(){
    	return $this->belongsTo('App\Mapel','mapels_id','id');
    }
    public function get_user(){
    	return $this->belongsTo('App\User','users_id','id');
    }
}
