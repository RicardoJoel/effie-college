@extends('layouts.auth')
@section('content')
@if (session('resent'))
<div class="alert alert-success" role="alert">
    <label>{{ __('Hemos enviado un enlace de verificación al correo de cada integrante del equipo.') }}</label>
</div>
@endif
<center>
<h6 style="margin-bottom:20px">{{ __('Revisa tu bandeja de correo') }}</h6>
</center>
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <div style="margin-bottom:20px">
        <label>{{ __('Antes de proceder, revisa el enlace que te hemos enviado al correo.') }}</label>
    </div>

    <button type="submit" class="btn-effie-inv" style="float:right">
        {{ __('No tengo enlace') }}
    </button>
</form>
@endsection
