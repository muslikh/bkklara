<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    //
    public function alumni(){
    	return $this->hasMany('App\Alumni','user_id','user_id');
    }
    public function pendidikan(){
    	return $this->belongsTo('App\Pendidikan','user_id','user_id');
    }

}
