@extends('layouts.app')
@section('content')
@inject('sections','App\Services\Sections')
@inject('answers','App\Services\Answers')
@php
	$edition = $user->caso->edition->name;
	$review = $user->reviewsByAuth->first();
	$sect5 = $sections->get($edition.'S5');
	$qst5b = $sect5->questions[1];
	$ans5b = $answers->get($qst5b->code,$user->username);
@endphp
<div class="card-introduccion">
    <div class="card-introduccion__container">
		<h1 class="card-title">{{ $user->is_completed ? 'Propuesta enviada por el equipo ' : 'Avance de propuesta del equipo' }} {{ $user->username }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('Te presentamos el Formulario de Participación, el cual se compone de seis secciones. Cada una requiere textos, archivos y/o documentos que el equipo ha completado para continuar con el proceso de participación.') }}</p>
    </div>
</div>
<div class="ficha">
	<h1 class="card-title">{{ __('Formulario de participación') }}</h1>
	<div class="logo">
		<img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}" class="logo__proposal">
	</div>
	<div class="space"></div>
	<center>
	<p class="dato">{{ __('Descargar el caso') }}</p>
	<a href="{{ route('downloadWhole', ['edition' => $edition,'brand' => $user->caso->brand->name]) }}" id="btn-whole"><i class="fa fa-download fa-2x"></i></a>
	</center>
	<h1 class="card-title">{{ __('Información general') }}</h1>
	@include('evaluation/questions/question5b')
	<div class="space"></div>
	<div class="text-inscripcion">
		<p>{{ __('Puedes descargar aquí el formulario en formato Word') }}</p>				
		<a href="{{ route('downloadForm',$edition) }}" class="btn-effie">{{ __('Descargar') }}</a>
	</div>
</div>
<div class="card-introduccion">
	<div class="card-introduccion__container">
		<h1 class="card-title">{{ __('Secciones') }}</h1>
	</div>
	<div class="sections">
		<span onclick="openSection(0)" class="step active">{{ __('1') }}</span>
		<span onclick="openSection(1)" class="step">{{ __('2') }}</span>
		<span onclick="openSection(2)" class="step">{{ __('3') }}</span>
		<span onclick="openSection(3)" class="step">{{ __('4') }}</span>
		<span onclick="openSection(4)" class="step">{{ __('5') }}</span>
	</div>
	<div class="sections">
		<label>{{ __('Sección 1') }}</label>
		<label>{{ __('Sección 2') }}</label>
		<label>{{ __('Sección 3') }}</label>
		<label>{{ __('Sección 4') }}</label>
		<label>{{ __('Sección 5') }}</label>
	</div>
</div>
<div id="subtitle" class="ficha">
	@if(Auth::user()->situation === 'JURADO' && !Auth::user()->is_finished)
	<form method="POST" action="{{ route('sendScore',$user->id) }}" role="form">
   		@csrf
	@endif
	@include('evaluation/sections/section1')
	@include('evaluation/sections/section2')
	@include('evaluation/sections/section3')
	@include('evaluation/sections/section4')
	@include('evaluation/sections/section5')
	<center>
	@if(Auth::user()->situation === 'JURADO' && !Auth::user()->is_finished)
		<button type="submit" class="btn-effie" style="width:170px">{{ __('Guardar notas') }}</button>
	</form>
	@endif
	<a href="{{ route('home') }}" class="btn-effie-inv" style="width:170px"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a>
	</center>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="{{ asset('css/proposal2.css') }}">
<link rel="stylesheet" href="{{ asset('LineControl/css/editor.css') }}">
<script src="{{ asset('js/proposal/questions2.js') }}"></script>
<script src="{{ asset('LineControl/js/viewer.js') }}"></script>
<script src="{{ asset('js/proposal/viewers4.js') }}"></script>
@endsection