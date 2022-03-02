@php
    $ans4b = $answers->get($qst4b->code,$user->username);
@endphp
<div id="qst4b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4b->code }}</label>
            <p>{{ $qst4b->detail }}</p>
            <label>{{ $qst4b->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans4b_method" value="{{ $ans4b ? 'PATCH' : '' }}">
            <input type="hidden" id="ans4b_detail" value="{{ $ans4b->detail ?? '' }}">
            <input type="hidden" id="ans4b_id" value="{{ $ans4b->id ?? '' }}">
            <textarea id="ans4b"></textarea>
            <a class="btnhistory" id="btn4b-hist" onclick="showHistory('4b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans4b ? route('answers.update', $ans4b->id) : route('answers.store') }}" role="form" id="frm-ans4b">
                @csrf
                <input type="hidden" id="ans4b_method" value="{{ $ans4b ? 'PATCH' : '' }}">
                <input type="hidden" id="ans4b_detail" value="{{ $ans4b->detail ?? '' }}">
                <input type="hidden" id="qst4b_maxwrd" value="{{ $qst4b->maxwrd }}">
                <input type="hidden" id="qst4b_maxgrp" value="{{ $qst4b->maxgrp }}">
                <input type="hidden" id="ans4b_id" value="{{ $ans4b->id ?? '' }}">
                <input type="hidden" id="qst4b_id" value="{{ $qst4b->id }}">
                <div class="span-done" id="ans4b-done-div"><span id="ans4b-done-msg"></span></div>
                <div class="span-fail" id="ans4b-fail-div"><span id="ans4b-fail-msg"></span></div>
                <textarea id="ans4b"></textarea>
                <a class="btnhistory" id="btn4b-hist" onclick="showHistory('4b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn4b-canc" class="btn-effie-inv edt" onclick="disableEditor('4b')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn4b-edit" class="btn-effie edt" onclick="enableEditor('4b')">{{ __('Editar') }}</button>
                <button type="submit" id="btn4b-save" class="btn-effie edt" onclick="sendAnswer(event,'4b')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>