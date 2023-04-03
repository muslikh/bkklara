<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Ortu as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;
class Ortu extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function dkn(){
    	return $this->hasMany('App\Dkn','users_id','id_siswa');
    }
    public function absensi(){
        //->select(array('hadir','sakit','ijin','alpha')
    	return $this->hasMany('App\Absensi','id_siswa','siswaID');
    }
    
}
