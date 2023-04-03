<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logabsensi extends Model
{
    public function get_user(){
    	return $this->hasMany('App\User','siswaID','id');
    }

}
