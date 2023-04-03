<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public function get_user(){
    	return $this->belongsTo('App\User','siswaID','id');
    }
    // public function get_user(){
    // 	return $this->belongsTo('App\User','siswaID','id');
    // }

}
