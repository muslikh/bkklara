@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                 <center>  <h2>Bursa Kerja Khusus<br><br></h2> </center>
<br>
<button onclick="gelap(true)">Gelap</button>
<button onclick="gelap(false)">Terang</button>
<br>

<style>
    #darkMode{
        background: #000000;
        color : #ffffff;
    }
</style>

<script>

if(localStorage.getItem("theme") == "dark" )
{

    gelap(true)
}else{
    
gelap(false)
}

function gelap(isDark)
{
    if(isDark)
    {
        document.body.setAttribute("id","darkMode");
        localStorage.setItem("theme","dark");
    }else{
        document.body.setAttribute("id","");
        localStorage.removeItem("theme");
    }
}
</script>
@if(count($errors) > 0)
@foreach( $errors->all() as $message )
 <div class="alert alert-danger display-hide">
  <button class="close" data-close="alert"></button>
  <span>{{ $message }}</span>
 </div>
@endforeach
@endif
            <div class="card">
                <h5 class="card-header">Login</h5>
                
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        {{-- @csrf --}}
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <br>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="flaticon-user"></i>
                                    </span>
                                </div>
                                <input  id="email" type="email" class="form-control  input-square" placeholder="Tuliskan Email" name="email" value="{{ old('email') }}" required autofocus>
                                
                            </div>
                        </div> 

                        <br>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="flaticon-user"></i>
                                    </span>
                                </div>
                                <input  id="password" type="password" class="form-control input-square" name="password" required class="form-control  input-square" placeholder="Tuliskan Password" name="password" autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
