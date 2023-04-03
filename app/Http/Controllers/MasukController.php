<?php

namespace App\Http\Controllers;
 
// use App\Siswa;
use App\User;
use App\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Config;
use Tymon\JWTAuth\Exceptions\JWTException;
 

class MasukController extends Controller
{ 
    public function __construct()
    {
        $this->user = new User;
        $this->ortu = new Ortu;
    }

     public function login(Request $request)
     {

        $username = $request->username;
        $password = $request->password;
        
        $user = User::where('username','=',$username)->count();
        $ortu = User::where('username_ortu','=',$username)->count();
        if($user )
        {
            Config::set('jwt.user','App\User');
            Config::set('auth.providers.users.model', App\User::class);

            $nama =User::where('username','=',$username)->value('nama');
            $aktif =User::where('username','=',$username)->value('aktif');
            $file =User::where('username','=',$username)->value('file');
            $level =User::where('username','=',$username)->value('level');
            $kode_kelas =User::where('username','=',$username)->value('kode_kelas');
            $semester =User::where('username','=',$username)->value('semester');
            $id =User::where('username','=',$username)->value('id');

            $credentials = $request->only('username', 'password');
    
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'success' => 0,
                        'message' => 'Username / Password Salah '
                        ], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['message' => 'could_not_create_token'], 500);
            }

           

            if($aktif == 0)
            { 
                $user = User::where('username','=',$username)
                ->update([
                    'token' => $token,
                ]);
                $result['success'] = 1;
                $result['message'] = 'success';
                $result['id'] = $id;
                $result['file'] = $file;
                $result['username'] = $username;
                $result['nama'] = $nama;
                $result['kode_kelas'] = $kode_kelas;
                $result['semester'] = $semester;
                $result['level'] = 'siswa';
                $result['token'] = $token;
                $result['aktif'] = $aktif;
                
                return $result;
            }else{
                $result['success'] = 0;
                $result['message'] = 'User Sudah Aktif Di Device Lain';
                return $result;
            }
        }else if($ortu)
        {
            $nama =User::where('username_ortu','=',$username)->value('nama');
            $aktif =User::where('username_ortu','=',$username)->value('aktif_ortu');
            $file =User::where('username_ortu','=',$username)->value('file');
            $token =User::where('username_ortu','=',$username)->value('token');
            $kode_kelas =User::where('username_ortu','=',$username)->value('kode_kelas');
            $semester =User::where('username_ortu','=',$username)->value('semester');
            $id =User::where('username_ortu','=',$username)->value('id');

            if($aktif == 0)
            {
                $result['success'] = 1;
                $result['username'] = $username;
                $result['nama'] = $nama;
                $result['id'] = $id;
                $result['kode_kelas'] = $kode_kelas;
                $result['file'] = $file;
                $result['semester'] = $semester;
                $result['level'] = 'ortu';
                $result['token'] = $token;
                $result['message'] = 'success';
                
                return $result;
            }else{
                
                $result['success'] = 0;
                $result['message'] = 'User Sudah Aktif Di Device Lain';
                return $result;
            }
        }
     }

     
     public function register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'nama' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
  
         if($validator->fails()){
             return response()->json($validator->errors()->toJson(), 400);
         }
  
         $user = User::create([
             'nama' => $request->get('nama'),
             'email' => $request->get('email'),
             'password' => Hash::make($request->get('password')),
         ]);
         $token = JWTAuth::fromUser($user);
         return response()->json(compact('user','token'),201);
     }  
     
    public function gantiDevice(Request $request)
    {
        $level = $request->level;

       $tes =  User::where('username','=',$request->username)
            ->update([

                'deviceId' => $request->deviceId,
                'aktif' => $request->aktif
            ]);

            if($tes)
            {
                $result['success'] = 1;
                $result['message'] = 'success';
                return $result ;
            }else{
                
                    $result['success'] = 0;
                    $result['message'] = 'gagal';
                    return $result ;
            }
    }
    
    public function hapuslogin(Request $request)
    {
        $level = $request->level;

        if($level == 'siswa')
        {
            $tes =  User::where('username','=',$request->username)
            ->update([

                'deviceId' => $request->deviceId,
                'aktif' => $request->aktif
            ]);
            
            if($tes)
            {
                $result['success'] = 1;
                $result['message'] = 'success';
                return $result ;
            }else{
                
                    $result['success'] = 0;
                    $result['message'] = 'gagal';
                    return $result ;
            }
        }else if($level == 'siswa')
        {
            $tes =  User::where('username_ortu','=',$request->username)
            ->update([

                'deviceId_ortu' => $request->deviceId,
                'aktif_ortu' => $request->aktif
            ]);
            
            if($tes)
            {
                $result['success'] = 1;
                $result['message'] = 'success';
                return $result ;
            }else{
                
                    $result['success'] = 0;
                    $result['message'] = 'gagal';
                    return $result ;
            }
        }    
    }
     
  
     public function getAuthenticatedUser()
     {
         try {
             if (! $user = JWTAuth::parseToken()->authenticate()) {
                 return response()->json(['user_not_found'], 404);
             }
         } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
             return response()->json(['token_expired'], $e->getStatusCode());
         } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
             return response()->json(['token_invalid'], $e->getStatusCode());
         } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
             return response()->json(['token_absent'], $e->getStatusCode());
         }
         return response()->json(compact('user'));
     }
}
