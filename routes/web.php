<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::view('/', 'welcome')->name('index');

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');
Route::get('/login/alumni', 'Auth\LoginController@showAlumniLoginForm')->name('alumni');
Route::get('/login/mitra', 'Auth\LoginController@showMitraLoginForm')->name('mitra');
Route::get('/login/siswa', 'Auth\LoginController@showSiswaLoginForm')->name('siswa');


Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/alumni', 'Auth\LoginController@alumniLogin');
Route::post('/login/mitra', 'Auth\LoginController@mitraLogin');
Route::post('/login/siswa', 'Auth\LoginController@siswaLogin');


Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/alumni', 'Auth\RegisterController@showAlumniRegisterForm');
Route::get('/register/mitra', 'Auth\RegisterController@showMitraRegisterForm');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/alumni', 'Auth\RegisterController@createAlumni');
Route::post('/register/mitra', 'Auth\RegisterController@createMitra');


Route::middleware('auth:alumni')->group(function(){
    // Route::get('/alumni', function() {} );
    Route::view('alumni', 'homeALumni')->name('alumni');
    Route::get('alumni', 'AlumniController@index')->name('alumni');
    Route::view('dataku', 'dataku')->name('dataku');
    Route::get('dataku/{id}', 'AlumniController@dataku')->name('dataku');
    Route::get('cv/{id}', 'AlumniController@cv')->name('cv');
    Route::get('lamaranku/{id}', 'AlumniController@lamaranku')->name('lamaranku');
    Route::view('lamaranku', 'lamaranku')->name('lamaranku');
    Route::get('listlowongan', 'AlumniController@lowongan')->name('lowongan');
    Route::get('dlowongan/{id}', 'AlumniController@detaillowongan')->name('lowongan');
    Route::post('dlowongan/{id}', 'AlumniController@kirimlamaran');
    
    Route::view('tambahpendidikan/{id}','tambahpendidikan');
    Route::post('ptambahpendidikan/{id}', 'AlumniController@tambahpendidikan');
    Route::view('tambahpekerjaan/{id}','tambahpekerjaan');
    Route::post('ptambahpekerjaan/{id}', 'AlumniController@tambahpekerjaan');

    Route::get('/alumnikeluar', function(){
        Auth::logout();
        Session::flush();
        return Redirect::to('login/alumni/');
    });
});


Route::get('dtlowongan/{id}', 'LowonganController@detaillowongan')->name('lowongan');
Route::get('dtpelamar/{id}', 'LowonganController@datapelamar')->name('pelamar');


Route::middleware('auth:mitra')->group(function(){
        // Route::get('dashboard', function() {} );
    Route::view('mitra', 'homePerusahaan')->name('mitra');
        
    Route::get('/mitrakeluar', function(){
        Auth::logout();
        Session::flush();
        return Redirect::to('login/mitra/');
    });
});


Route::middleware('auth:siswa')->group(function(){
    // Route::get('dashboard', function() {} );
Route::view('siswa', 'homeSiswa')->name('siswa');
    
Route::get('/siswakeluar', function(){
        Auth::logout();
        Session::flush();
        return Redirect::to('login/siswa/');
    });
});


// Route::get('/keluar', function(){
//     Auth::logout();
//     Session::flush();
//     // if (Auth::guard('alumni')->check())
//     // {
//     //     return Redirect::to('login/admin');
//     // } elseif (Auth::guard('alumni')->check()) {
//     //     return Redirect::to('login/alumni');
//     // } else{

//     //     return Redirect::to('login');
//     // }
//     // return Redirect::to('login');
//  });

Route::middleware('auth:user')->group(function(){

Route::get('/home', 'HomeController@index')->name('home');
 

    Route::get('dataalumni', 'AlumniController@dataalumni')->name('dataalumni');
    Route::get('dataadmin', 'AlumniController@dataadmin')->name('dataadmin');
    Route::get('dataregistrasi', 'AlumniController@alumnibaru')->name('dataregistrasi');
    Route::get('tambahalumni', 'AlumniController@tambah');
    Route::get('validasi/{id}', 'AlumniController@validasialumni');
    Route::get('detailalumni/{id}', 'AlumniController@detail');
    Route::post('prosestambahalumni', 'AlumniController@ptambah');
    Route::get('hapusalumni/{id}', 'AlumniController@hapusalumni');
    Route::get('keterserapan', 'AlumniController@keterserapan')->name('keterserapan');
    Route::post('dataketerserapan', 'AlumniController@dataketerserapan')->name('dataketerserapan');

    Route::get('dataperusahaan', 'PerusahaanController@index')->name('dataperusahaan');
    Route::get('dataregistrasiperusahaan', 'PerusahaanController@perusahaanbaru')->name('dataregistrasiperusahaan');
    Route::get('tambahperusahaan', 'PerusahaanController@tambah');
    Route::post('prosestambahperusahaan', 'PerusahaanController@ptambah');
    Route::get('hapusperusahaan/{id}','PerusahaanController@hapusperusahaan')->name('hapusperusahaan');
    Route::get('validasiperusahaan/{id}', 'PerusahaanController@validasiperusahaan');


    Route::get('datalowongan', 'LowonganController@index')->name('datalowongan');
    Route::get('hapuslowongan/{id}', 'LowonganController@hapuslowongan')->name('hapuslowongan');
    Route::get('tambahlowongan', 'LowonganController@tambahlowongan');
    Route::post('prosestambahlowongan', 'LowonganController@ptambah');
    Route::get('dataartikel', 'ArtikelController@index')->name('dataartikel');
    // Route::get('dataartikel', 'ArtikelController@show');
    Route::get('tambahartikel', 'ArtikelController@tambahArtikel')->name('tambahartikel');
    Route::post('prosestambartikel', 'ArtikelController@ptambah');
    Route::get('hapusartikel', 'ArtikelController@hapusartikel');
    Route::get('artikeldetail/{id}','ArtikelController@artikeldetail')->name('artikeldetail');
    Route::get('ubahartikel/{id}','ArtikelController@ubahartikel');
    Route::post('ubahartikel/{id}/prosesubahartikel','ArtikelController@pubah');

    
    Route::get('/pengumuman','PengumumanController@index');
    Route::get('/tambahpengumuman','PengumumanController@tambahpengumuman');
    Route::post('/prosestambahpengumuman','PengumumanController@prosestambahpengumuman');
    Route::get('/editpengumuman', 'PengumumanController@editpengumuman');;
    Route::post('/peditpengumuman', 'PengumumanController@peditpengumuman');;
    Route::get('/hapuspengumuman', 'PengumumanController@hapuspengumuman');
    
    Route::get('diterima', 'AlumniController@diterima');
    Route::get('diproses', 'AlumniController@diproses');
    Route::get('ditolak', 'AlumniController@ditolak');
    
    Route::get('/adminkeluar', function(){
        Auth::logout();
        Session::flush();
        return Redirect::to('login/admin/');
    });


});

Route::get('/info', 'AlumniController@infofront')->name('info');

Route::get('bacaartikel/{id}','ArtikelController@show');
Route::get('artikel','ArtikelController@front')->name('artikel');

Route::get('lowongandetail/{id}','LowonganController@show');
Route::get('lowongan','LowonganController@front')->name('lowongan');
Route::get('detaillowongan/{id}','LowonganController@frontlowongandetail')->name('detaillowongan');


Route::get('perusahaan','PerusahaanController@front')->name('perusahaan');


Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@uploadBasePNG');

Route::get('/clear', function()
{
    // $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    return 'Routes Clered';
});
