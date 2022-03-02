@extends('layouts.app')
@section('content')
<div class="container error-404 not-found">
    <div class="space3"></div>
    <div class="fila">
        <div class="columna columna-1">
            <center><h1 class="title-404">{{ __('404') }}</h1></center>
        </div>
    </div>
    <div class="space3"></div>
    <div class="fila">
        <div class="columna columna-1">
            <center><h4>{{ __('¡Uy! No se pudo encontrar esta página.') }}</h4></center>					
        </div>
    </div>  
    <div class="space2"></div>
    <div class="fila">
        <div class="columna columna-1">
            <center><a href="{{ url('/') }}" class="btn-effie">{{ __('Regresar') }}</a></center>
        </div>
    </div>
    <div class="space2"></div>
</div>
@endsection