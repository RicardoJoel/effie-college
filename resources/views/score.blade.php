@extends('layouts.app')
@section('content')
@inject('sections','App\Services\Sections')
@php
	$edition = $user->caso->edition->name;
	$sect1 = $sections->get($edition.'S1');
	$sect2 = $sections->get($edition.'S2');
	$sect3 = $sections->get($edition.'S3');
	$sect4 = $sections->get($edition.'S4');
@endphp
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Puntaje obtenido por el equipo ') }} {{ $user->username }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás visualizar el puntaje asignado al equipo en cada sección de formulario de participación.') }}</p>
    </div>
</div>
<div class="ficha">
	<h1 class="card-title">{{ __('Formulario de participación') }}</h1>
	<p class="cuerpo-gracias__contenido">{{ __('Jurado calificador: ') }} {{ $review->jury->school }}</p>
	<div class="logo">
		<img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}" class="logo__proposal">
	</div>
	<div class="fila">
		<div class="columna columna-2">
			<h3 class="card-subtitle">{{ __('Nombre de la sección') }}</h3>
		</div>
		<div class="columna columna-2">
			<h3 class="card-subtitle">{{ __('Puntaje') }}</h3>
        </div>
	</div>
	<div class="fila dato">
		<div class="columna columna-2">
			<p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $sect1->title }}</b></p>
		</div>
		<div class="columna columna-2">
			<b>{{ $review->score1 }}</b>
        </div>
	</div>
	<div class="fila dato">
		<div class="columna columna-2">
			<p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $sect2->title }}</b></p>
		</div>
		<div class="columna columna-2">
			<b>{{ $review->score2 }}</b>
        </div>
	</div>
	<div class="fila dato">
		<div class="columna columna-2">
			<p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $sect3->title }}</b></p>
		</div>
		<div class="columna columna-2">
			<b>{{ $review->score3 }}</b>
        </div>
	</div>
	<div class="fila dato">
		<div class="columna columna-2">
			<p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $sect4->title }}</b></p>
		</div>
		<div class="columna columna-2">
			<b>{{ $review->score4 }}</b>
        </div>
	</div>
	<div class="fila">
		<div class="columna columna-2">
			<h3 class="card-subtitle">{{ __('Puntaje final obtenido') }}</h3>
		</div>
		<div class="columna columna-2">
			<h3 class="card-subtitle">{{ ($review->score1 + $review->score2 + $review->score3 + $review->score4)*0.25 }}</h3>
        </div>
	</div>
	<div class="space"></div>
	<h3 class="card-title">{{ __('Retroalimentación') }}</h3>
	@if(Auth::user()->is_admin)
	<p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás encontrar el comentario enviado por el jurado de la marca al momento de la calificación del equipo.') }}</p>
	<textarea rows="5" disabled>{{ $review->feedback }}</textarea>
	<center><a href="{{ URL::previous() }}" class="btn-effie-inv"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a></center>
	@else
	<p class="cuerpo-gracias__contenido">{{ __('Puedes enviar comentarios al equipo en base a la propuesta que has revisado.') }}</p>
	<form method="POST" action="{{ route('sendFeedback',$user->id) }}" role="form">
		@csrf
		<textarea name="feedback" rows="5" maxlength="500">{{ old('feedback',$review->feedback) }}</textarea>
		<center>
		<button type="submit" class="btn-effie">{{ __('Enviar') }}</button>
		<a href="{{ URL::previous() }}" class="btn-effie-inv"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a>
		</center>
	</form>
	@endif
</div>
@endsection