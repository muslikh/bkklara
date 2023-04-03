<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Alumni;
use App\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:user');
        $this->middleware('guest:alumni');
        $this->middleware('guest:mitra');
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showAlumniRegisterForm()
    {
        return view('auth.registeralumni', ['url' => 'alumni']);
    }

    public function showMitraRegisterForm()
    {
        return view('auth.register', ['url' => 'mitra']);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'nik' => 'required|string',
            // 'telepon' => 'required|string',
            // 'tempat_lahir' => 'required|string',
            // 'tgl_lahir' => 'required|string',
            // 'jenis_kelamin' => 'required|string',
            // 'tahun_lulus' => 'required|string',
            // 'alamat' => 'required|string',
            // 'status' => 'required|string'
        ]);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = User::create([
            'nama' => $request['name'],
            'email' => $request['email'],
            'nik' => $request['nik'],
            'telepon' => $request['telepon'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tahun_lulus' => $request['tahun_lulus'],
            'alamat' => $request['alamat'],
            'status' => 'belum_aktif',
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    
    protected function createAlumni(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Alumni::create([
            'nama' => $request['name'],
            'email' => $request['email'],
            'nik' => $request['nik'],
            'telepon' => $request['telepon'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tahun_lulus' => $request['tahun_lulus'],
            'alamat' => $request['alamat'],
            'status' => 'belum_aktif',
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/alumni');
    }

    
    protected function createMitra(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Perusahaan::create([
            'nama' => $request['name'],
            'email' => $request['email'],
            'nik' => $request['nik'],
            'telepon' => $request['telepon'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tahun_lulus' => $request['tahun_lulus'],
            'alamat' => $request['alamat'],
            'status' => 'belum_aktif',
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/mitra');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nik' => $request['nik'],
            'telepon' => $request['telepon'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tahun_lulus' => $request['tahun_lulus'],
            'alamat' => $request['alamat'],
            'status' => 'belum_aktif',
            'password' => bcrypt($data['password']),
        ]);
    }
    // protected function createUser(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $admin = Admin::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->intended('login');
    // }
    // protected function createAlumni(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $admin = Admin::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->intended('login/alumni');
    // }
    // protected function createPerusahaan(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $admin = Admin::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->intended('login/perusahaan');
    // }
}
