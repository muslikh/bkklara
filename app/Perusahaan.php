<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Perusahaan extends Authenticatable
{
    protected $primaryKey = 'id_industri';
    use Notifiable;
    protected $guarded = [];
    protected $fillable = [
        'username', 'email', 'password','nama',
    ];


    public function lowongan(){
    	return $this->hasMany('App\Lowongan','id_industri','id_industri');
    }
    
    public function lamaran(){
    	return $this->belongsTo('App\Lamaran','id_industri');
    }
}
