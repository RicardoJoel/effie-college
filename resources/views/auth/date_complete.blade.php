@extends('layouts.auth')
@section('content')
@if ($errors->has('password'))
<div class="span-alert">
    <span class="invalid-feedback">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
</div>
@endif
<center>
<h6 style="margin-bottom:20px">{{ __('Activación de cuenta') }}</h6>
</center>
<form method="POST" action="{{ url('/complete/'.$id) }}">
    @csrf
    <div class="card-login__password">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password" id="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" maxlength="20" required autocomplete="password" placeholder="Contraseña" autofocus>
    </div>

    <div class="card-login__password">
        <i class="fa fa-key icon"></i>
        <input type="password" name="password_confirmation" id="password-confirm" maxlength="20" required autocomplete="password" placeholder="Confirmar contraseña">
    </div>
    
    <a href="{{ route('login') }}" class="card-login__link2">
        {{ __('Volver a inicio de sesión') }}
    </a>

    <button type="submit" class="btn-effie-inv" style="float:right">
        {{ __('Activar cuenta') }}
    </button>
</form>
@endsection
