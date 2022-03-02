@php
    $sect2 = $sections->get($edition.'S2');
    $qst2a = $sect2->questions[0];
    $qst2b = $sect2->questions[1];
    $qst2c = $sect2->questions[2];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect2->title }}</h3>
    <p>{{ $sect2->description }}</p>
    <br>
    @if(Auth::user()->situation === 'JURADO')
    <div class="fila">
        <div class="columna columna-3c"></div>
        <div class="columna columna-6">
            <i class="fa fa-check-square-o"></i>&nbsp;{{ __('Puntaje obtenido:') }}
        </div>
        <div class="columna columna-6">
            <input type="text" name="score2" value="{{ old('score2',$review->score2 ?? '') }}" onkeypress="return checkNumber(event)" {{ Auth::user()->is_finished ? 'disabled' : '' }}>
        </div>
    </div>
    <p class="dato"><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('El puntaje obtenido por el equipo debe estar entre uno (1) y diez (10).') }}</p>
    @endif
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst2a')">{{ $qst2a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst2b')">{{ $qst2b->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst2c')">{{ $qst2c->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('evaluation/questions/question2a')
        @include('evaluation/questions/question2b')
        @include('evaluation/questions/question2c')
    </div>
    <br>
</div>