<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/lowonganlist','LowonganController@frontApi');

Route::group(['middleware' => 'jwt.verify'], function () {

    Route::get('/siswa/detail','SiswaController@detail');
    Route::get('/siswa/detail/foto/{id}','SiswaController@detail_foto');
    // Route::post('/siswa/detail/ganti_foto/{id}','SiswaController@ganti_foto');
    Route::post('/siswa/detail/ganti_foto/{id}','UploadController@uploadBaseJpg');
Route::get('/siswa/aktif','SiswaController@index');

Route::post('/logout', function (Request $request) {
    JWTAuth::invalidate(JWTAuth::getToken());
    
    return response()->json(
        [
            'status' => 'ok',
            "code" => 200,
            "message"=> ""
        ], 200
    );
});

});
Route::post('/ortu','MasukController@ortu');
Route::post('/register','MasukController@register');
Route::post('/gantidevice','MasukController@gantiDevice');
Route::get('/hapuslogin','MasukController@hapuslogin');


Route::get('/siswa/nilai','SiswaController@dkn');
Route::get('/siswa/nilairapor','SiswaController@nilairapor');
Route::get('/siswa/daftarulang','SiswaController@detail');
Route::get('/siswa/baru','SiswaController@siswa_baru');
Route::get('/siswa/jmlditerima','SiswaController@jmlditerima');
Route::get('/siswa/diterima','SiswaController@diterima');
Route::post('/siswa/validasi/{id}','SiswaController@validasi');
Route::post('/siswa/cekkode','SiswaController@cekkode');
Route::post('/siswa/daftar','SiswaController@create');
Route::post('/siswa/absen','SiswaController@absen');


Route::get('/tes','SiswaController@tes');
Route::get('/fcm','SiswaController@fcm');

Route::get('/pengumuman','SiswaController@pengumuman');

Route::post('/siswa/{id}','SiswaController@update');
Route::post('/siswa/buatLogin/{id}','SiswaController@buatLogin');

Route::delete('/siswa/{id}','SiswaController@delete');

Route::get('/jadwalPelajaran','SiswaController@jdwlPelajaran');
Route::get('/jadwalUjian','SiswaController@jdwlUjian');


Route::get('/logabsensi','SiswaController@Log_absensi');
Route::get('/jmlabsensi','SiswaController@jml_absensi');
Route::get('/hitungabsensi', 'SiswaController@hitung');
Route::get('/cekabsen', 'SiswaController@cekAbsen');


Route::post('/gantipass','SiswaController@gantiPass');
Route::get('/lupapass', 'SiswaController@lupaPass');


