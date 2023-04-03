<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    public function alumni(){
    	return $this->hasMany('App\Alumni','id_pendidikan','user_id');
    }
}
