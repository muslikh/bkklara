<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{

    use Notifiable;

    protected $guard = 'siswa';
    protected $fillable = [
        'username', 'email', 'password','nama','nik','telepon','tgl_lahir','tempat_lahir','jenis_kelamin','tahun_lulus'
    ];
    //
    // public function pendidikan(){
    // 	return $this->hasMany('App\Pendidikan','id_pendidikan','id');
    // }

    // public function pekerjaan(){
    // 	return $this->hasMany('App\Pekerjaan','id_pekerjaan','id');
    // }
    // public function pendidikan(){
    // 	return $this->belongsTo('App\Pendidikan','id_pendidikan','id_pendidikan');
    // }

    // public function pekerjaan(){
    // 	return $this->belongsTo('App\Pekerjaan','id_pekerjaan','id');
    // }
    // public function lamaran(){
    // 	return $this->hasMany('App\Lamaran','id_user','id');
    // }
}
