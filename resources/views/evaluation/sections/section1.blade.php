@php
    $sect1 = $sections->get($edition.'S1');
    $qst1a = $sect1->questions[0];
    $qst1b = $sect1->questions[1];
    $qst1c = $sect1->questions[2];
    $qst1d = $sect1->questions[3];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect1->title }}</h3>
    <p>{{ $sect1->description }}</p>
    <br>
    @if(Auth::user()->situation === 'JURADO')
    <div class="fila">
        <div class="columna columna-3c"></div>
        <div class="columna columna-6">
            <i class="fa fa-check-square-o"></i>&nbsp;{{ __('Puntaje obtenido:') }}
        </div>
        <div class="columna columna-6">
            <input type="text" name="score1" value="{{ old('score1',$review->score1 ?? '') }}" onkeypress="return checkNumber(event)" {{ Auth::user()->is_finished ? 'disabled' : '' }}>
        </div>
    </div>
    <p class="dato"><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('El puntaje obtenido por el equipo debe estar entre uno (1) y diez (10).') }}</p>
    @endif
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst1a')">{{ $qst1a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1b')">{{ $qst1b->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1c')">{{ $qst1c->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1d')">{{ $qst1d->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('evaluation/questions/question1a')
        @include('evaluation/questions/question1b')
        @include('evaluation/questions/question1c')
        @include('evaluation/questions/question1d')
    </div>
    <br>
</div>