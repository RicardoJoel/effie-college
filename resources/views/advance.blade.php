@extends('layouts.app')
@section('content')
@inject('sections','App\Services\Sections')
@inject('answers','App\Services\Answers')
@php
	$edition = $user->caso->edition->name;
	$sect1 = $sections->get($edition.'S1');
	$sect2 = $sections->get($edition.'S2');
	$sect3 = $sections->get($edition.'S3');
	$sect4 = $sections->get($edition.'S4');
	$sect5 = $sections->get($edition.'S5');
	$qst1a = $sect1->questions[0];
	$qst1b = $sect1->questions[1];
	$qst1c = $sect1->questions[2];
	$qst1d = $sect1->questions[3];
	$qst2a = $sect2->questions[0];
	$qst2b = $sect2->questions[1];
	$qst2c = $sect2->questions[2];
	$qst3a = $sect3->questions[0];
	$qst3b = $sect3->questions[1];
	$qst3c = $sect3->questions[2];
	$qst4a = $sect4->questions[0];
	$qst4c = $sect4->questions[1];
	$qst4d = $sect4->questions[2];
	$qst5a = $sect5->questions[0];
	$qst5b = $sect5->questions[1];
	$ans1a = $answers->get($qst1a->code,$user->username);
	$ans1b = $answers->get($qst1b->code,$user->username);
	$ans1c = $answers->get($qst1c->code,$user->username);
	$ans1d = $answers->get($qst1d->code,$user->username);
	$ans2a = $answers->get($qst2a->code,$user->username);
	$ans2b = $answers->get($qst2b->code,$user->username);
	$ans2c = $answers->get($qst2c->code,$user->username);
	$ans3a = $answers->get($qst3a->code,$user->username);
	$ans3b = $answers->get($qst3b->code,$user->username);
	$ans3c = $answers->get($qst3c->code,$user->username);
	$ans4a = $answers->get($qst4a->code,$user->username);
	$ans4c = $answers->get($qst4c->code,$user->username);
	$ans4d = $answers->get($qst4d->code,$user->username);
	$ans5a = $answers->get($qst5a->code,$user->username);
	$ans5b = $answers->get($qst5b->code,$user->username);
@endphp
<div class="card-introduccion">
    <div class="card-introduccion__container">
		<h1 class="card-title">{{ __('Avance de propuesta del equipo ') }} {{ $user->username }}</h1>
		@if(Auth::user()->id === $user->id)
        <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás visualizar el avance de tus respuestas en cada sección de formulario de participación. Debes tener en cuenta las fechas claves establecidas en el cronograma del concurso a fin de enviar tu propuesta a tiempo.') }}</p>
		@else
        <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás visualizar el avance de las respuestas enviadas por el equipo en cada sección de formulario de participación.') }}</p>
		@endif
	</div>
</div>
<div class="ficha">
<h1 class="card-title">{{ __('Formulario de participación') }}</h1>
	<div class="logo">
		<img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}" class="logo__proposal">
	</div>
	<h3 class="card-subtitle">{{ __('Información general') }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst5b->title }}</b>{{ ' (cód. '.$qst5b->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
            @if($ans5b)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<h3 class="card-subtitle">{{ $sect1->title }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst1a->title }}</b>{{ ' (cód. '.$qst1a->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans1a)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst1b->title }}</b>{{ ' (cód. '.$qst1b->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans1b)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst1c->title }}</b>{{ ' (cód. '.$qst1c->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans1c)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst1d->title }}</b>{{ ' (cód. '.$qst1d->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans1d)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<h3 class="card-subtitle">{{ $sect2->title }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst2a->title }}</b>{{ ' (cód. '.$qst2a->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans2a)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst2b->title }}</b>{{ ' (cód. '.$qst2b->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans2b)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst2c->title }}</b>{{ ' (cód. '.$qst2c->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans2c)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<h3 class="card-subtitle">{{ $sect3->title }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst3a->title }}</b>{{ ' (cód. '.$qst3a->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans3a)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst3b->title }}</b>{{ ' (cód. '.$qst3b->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans3b)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst3c->title }}</b>{{ ' (cód. '.$qst3c->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans3c)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<h3 class="card-subtitle">{{ $sect4->title }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst4a->title }}</b>{{ ' (cód. '.$qst4a->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans4a)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst4c->title }}</b>{{ ' (cód. '.$qst4c->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans4c)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst4d->title }}</b>{{ ' (cód. '.$qst4d->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if($ans4d)<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<h3 class="card-subtitle">{{ $sect5->title }}</h3>
	<div class="fila">
	    <div class="columna columna-2 dato">
            <p><i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $qst5a->title }}</b>{{ ' (cód. '.$qst5a->code.')' }}</p>
        </div>
		<div class="columna columna-2 dato">
			@if(count($user->files))<i class="fa fa-check fa-icon"></i>@else<i class="fa fa-close"></i>@endif
        </div>
	</div>
	<div class="space"></div>
	<h3 class="card-title">{{ __('Retroalimentación') }}</h3>
	<p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás encontrar los comentarios enviados por los jurados de la marca al momento de la calificación del equipo.') }}</p>
	@foreach($user->reviewsLikeTeam as $review)
	@if($review->feedback)
	<textarea rows="5" disabled>{{ $review->feedback }}</textarea>
	@endif
	@endforeach
	<center>
    <a href="{{ URL::previous() }}" class="btn-effie-inv"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a>
    </center>
</div>
@endsection