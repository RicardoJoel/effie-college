@extends('layouts.auth')
@section('content')
@error('password')
<div class="span-alert">
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
</div>
@enderror
@error('email')
<div class="span-alert">
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
</div>
@enderror
<center>
<h6 style="margin-bottom:20px">{{ __('Restablecimiento de contraseña') }}</h6>
</center>
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="card-login__user">
        <i class="fa fa-user icon"></i>
        <input type="text" name="username" id="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" maxlength="50" required autocomplete="text" placeholder="Usuario *" autofocus>
    </div>

    <div class="card-login__user">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" maxlength="20" required autocomplete="new-password" placeholder="Nueva contraseña">
    </div>

    <div class="card-login__user">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password_confirmation" id="password-confirm" maxlength="20" required autocomplete="new-password" placeholder="Confirmar contraseña">
    </div>

    <a href="{{ route('login') }}" class="card-login__link2">
        {{ __('Volver a inicio de sesión') }}
    </a>

    <button type="submit" class="btn-effie-inv" style="float:right">
        {{ __('Restablecer') }}
    </button>
</form>
@endsection
