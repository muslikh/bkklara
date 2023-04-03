<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function dkn(){
    	return $this->hasMany('App\Dkn','mapels_id','id');
    }
    public function kelas(){
    	return $this->hasMany('App\Dkn','mapels_id','id');
    }
}
