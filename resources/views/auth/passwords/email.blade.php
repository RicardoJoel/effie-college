@extends('layouts.auth')
@section('content')
@error('username')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<center>
<h6 style="margin-bottom:20px">{{ __('Restablecimiento de contraseña') }}</h6>
</center>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="card-login__user">
        <i class="fa fa-user icon"></i>
        <input type="text" name="username" id="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" maxlength="50" required autocomplete="text" placeholder="Usuario *" autofocus>
    </div>
    
    <div class="card-login__user">
        <i class="fa fa-at icon"></i>
        <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" maxlength="50" required autocomplete="email" placeholder="Correo electrónico">
    </div>

    <a href="{{ route('login') }}" class="card-login__link2">
        {{ __('Volver a inicio de sesión') }}
    </a>

    <button type="submit" class="btn-effie-inv" style="float:right">
        {{ __('Recibir enlace') }}
    </button>
</form>
@endsection