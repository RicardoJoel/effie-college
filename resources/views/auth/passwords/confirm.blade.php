@extends('layouts.auth')
@section('content')
@error('password')
<div class="span-alert">
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
</div>
@enderror
<center>
<h6 style="margin-bottom:20px">{{ __('Confirmación de contraseña') }}</h6>
</center>
<div class="alert alert-success" role="alert">
    <label>{{ __('Por favor, confirma tu contraseña antes de continuar.') }}</label>
</div>
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="card-login__password">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" maxlength="20" required autocomplete="current-password" placeholder="Contraseña" autofocus>
    </div>

    <button type="submit" class="btn btn-primary" style="float:right">
        {{ __('Confirmar contraseña') }}
    </button>

    @if (Route::has('password.request'))
    <a class="card-login__link" href="{{ route('password.request') }}">
        {{ __('¿Olvidaste tu contraseña?') }}
    </a>
    @endif
</form>
@endsection
