@extends('layouts.front')
@include('layouts.menufront')

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
            <h2><span class="turquoise">Pendaftaran Alumni</span></h2>
                
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md">
                <div class="card ">
                     <div class="card-header">
                         <div class="card-head-row">
                              <h4 class="card-title"></h4>
                              <div class="card-tools">
                                  
                              </div>
                         </div>
                      </div>
                      <div class="card-body ">
                        <div class="panel-body">
                            
                            @isset($url)
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                            @else
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @endisset
                                {{-- @csrf --}}
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                    
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nama Lengkap</label>
                    
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                    <label for="nik" class="col-md-4 control-label">NIK</label>
                    
                                    <div class="col-md-6">
                                        <input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus>
                    
                                        @if ($errors->has('nik'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nik') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                                    <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>
                    
                                    <div class="col-md-6">
                                        <input id="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autofocus>
                    
                                        @if ($errors->has('jenis_kelamin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                    <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                    
                                    <div class="col-md-6">
                                        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autofocus>
                    
                                        @if ($errors->has('tempat_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                    
                                <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                    <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                    
                                    <div class="col-md-6">
                                        <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autofocus>
                    
                                        @if ($errors->has('tgl_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                    
                                <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
                                    <label for="telepon" class="col-md-4 control-label">No Telepon</label>
                    
                                    <div class="col-md-6">
                                        <input id="telepon" type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" required autofocus>
                    
                                        @if ($errors->has('telepon'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('telepon') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                    
                                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                    <label for="alamat" class="col-md-4 control-label">Alamat</label>
                    
                                    <div class="col-md-6">
                                        <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>
                    
                                        @if ($errors->has('alamat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="form-group{{ $errors->has('tahun_lulus') ? ' has-error' : '' }}">
                                    <label for="tahun_lulus" class="col-md-4 control-label">Tahun Lulus</label>
                    
                                    <div class="col-md-6">
                                        <input id="tahun_lulus" type="text" class="form-control" name="tahun_lulus" value="{{ old('tahun_lulus') }}" required autofocus>
                    
                                        @if ($errors->has('tahun_lulus'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tahun_lulus') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                    
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                    
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
                    
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection