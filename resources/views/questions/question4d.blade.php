@php
    $ans4d = $answers->get($qst4d->code,$user->username);
@endphp
<div id="qst4d" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4d->code }}</label>
            <p>{{ $qst4d->detail }}</p>
            <label>{{ $qst4d->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans4d_method" value="{{ $ans4d ? 'PATCH' : '' }}">
            <input type="hidden" id="ans4d_detail" value="{{ $ans4d->detail ?? '' }}">
            <input type="hidden" id="ans4d_id" value="{{ $ans4d->id ?? '' }}">
            <textarea id="ans4d"></textarea>
            <a class="btnhistory" id="btn4d-hist" onclick="showHistory('4d')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans4d ? route('answers.update', $ans4d->id) : route('answers.store') }}" role="form" id="frm-ans4d">
                @csrf
                <input type="hidden" id="ans4d_method" value="{{ $ans4d ? 'PATCH' : '' }}">
                <input type="hidden" id="ans4d_detail" value="{{ $ans4d->detail ?? '' }}">
                <input type="hidden" id="qst4d_maxwrd" value="{{ $qst4d->maxwrd }}">
                <input type="hidden" id="qst4d_maxgrp" value="{{ $qst4d->maxgrp }}">
                <input type="hidden" id="ans4d_id" value="{{ $ans4d->id ?? '' }}">
                <input type="hidden" id="qst4d_id" value="{{ $qst4d->id }}">
                <div class="span-done" id="ans4d-done-div"><span id="ans4d-done-msg"></span></div>
                <div class="span-fail" id="ans4d-fail-div"><span id="ans4d-fail-msg"></span></div>
                <textarea id="ans4d"></textarea>
                <a class="btnhistory" id="btn4d-hist" onclick="showHistory('4d')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn4d-canc" class="btn-effie-inv edt" onclick="disableEditor('4d')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn4d-edit" class="btn-effie edt" onclick="enableEditor('4d')">{{ __('Editar') }}</button>
                <button type="submit" id="btn4d-save" class="btn-effie edt" onclick="sendAnswer(event,'4d')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>