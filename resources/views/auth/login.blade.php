@extends('layouts.auth')
@section('content')
@error('username')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<center>
<h6 style="margin-bottom:20px">{{ __('Inicio de sesión') }}</h6>
</center>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card-login__user">
        <i class="fa fa-user icon"></i>
        <input type="text" name="username" id="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" maxlength="50" required autocomplete="text" placeholder="Usuario *" autofocus>
    </div>
    
    <div class="card-login__user">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" maxlength="20" required autocomplete="current-password" placeholder="Contraseña">
    </div>

    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="card-login__link2">
        {{ __('Olvidé mi contraseña') }}
    </a>
    @endif

    <button type="submit" class="btn-effie-inv" style="float:right">
        {{ __('Iniciar sesión') }}
    </button>
</form>
@endsection