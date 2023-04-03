<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Perusahaan;
use App\Alumni;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
        $this->middleware('guest:alumni')->except('logout');
        $this->middleware('guest:mitra')->except('logout');
        $this->middleware('guest:siswa')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->status != 'aktif') {
            $errors = [$this->username() => trans('auth.notactivated')];
        }else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'aktif'])) {

            return redirect()->intended('/home');
        }
        
        return back()->withInput($request->only('email','password'))->withErrors($errors);
    }

    public function showAlumniLoginForm()
    {
        return view('auth.login', ['url' => 'alumni']);
    }

    public function alumniLogin(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Load user from database
        $alumni = Alumni::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($alumni && \Hash::check($request->password, $alumni->password) && $alumni->status != 'aktif') {
            $errors = [$this->username() => trans('auth.notactivated')];
        }else if (Auth::guard('alumni')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'aktif'])) {

            return redirect()->intended('/alumni');
        }
        
        return back()->withInput($request->only('email','password'))->withErrors($errors);
    }

    public function showMitraLoginForm()
    {
        return view('auth.login', ['url' => 'mitra']);
    }

    public function mitraLogin(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Load user from database
        $perusahaan = Perusahaan::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($perusahaan && \Hash::check($request->password, $perusahaan->password) && $perusahaan->status != 'aktif') {
            $errors = [$this->username() => trans('auth.notactivated')];
        }else if (Auth::guard('mitra')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'aktif'])) {

            return redirect()->intended('/mitra');
        }
        
        return back()->withInput($request->only('email','password'))->withErrors($errors);
    }

    public function showSiswaLoginForm()
    {
        return view('auth.login', ['url' => 'siswa']);
    }

    public function siswaLogin(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Load user from database
        $siswa = Siswa::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($siswa && \Hash::check($request->password, $siswa->password) && $siswa->status != 'aktif') {
            $errors = [$this->username() => trans('auth.notactivated')];
        }else if (Auth::guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'aktif'])) {

            return redirect()->intended('/home');
        }
        
        return back()->withInput($request->only('email','password'))->withErrors($errors);
    }

}
