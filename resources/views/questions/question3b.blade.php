@php
    $ans3b = $answers->get($qst3b->code,$user->username);
@endphp
<div id="qst3b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3b->code }}</label>
            <p>{{ $qst3b->detail }}</p>
            <label>{{ $qst3b->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans3b_method" value="{{ $ans3b ? 'PATCH' : '' }}">
            <input type="hidden" id="ans3b_detail" value="{{ $ans3b->detail ?? '' }}">
            <input type="hidden" id="ans3b_id" value="{{ $ans3b->id ?? '' }}">
            <textarea id="ans3b"></textarea>
            <a class="btnhistory" id="btn3b-hist" onclick="showHistory('3b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans3b ? route('answers.update', $ans3b->id) : route('answers.store') }}" role="form" id="frm-ans3b">
                @csrf
                <input type="hidden" id="ans3b_method" value="{{ $ans3b ? 'PATCH' : '' }}">
                <input type="hidden" id="ans3b_detail" value="{{ $ans3b->detail ?? '' }}">
                <input type="hidden" id="qst3b_maxwrd" value="{{ $qst3b->maxwrd }}">
                <input type="hidden" id="qst3b_maxgrp" value="{{ $qst3b->maxgrp }}">
                <input type="hidden" id="ans3b_id" value="{{ $ans3b->id ?? '' }}">
                <input type="hidden" id="qst3b_id" value="{{ $qst3b->id }}">
                <div class="span-done" id="ans3b-done-div"><span id="ans3b-done-msg"></span></div>
                <div class="span-fail" id="ans3b-fail-div"><span id="ans3b-fail-msg"></span></div>
                <textarea id="ans3b"></textarea>
                <a class="btnhistory" id="btn3b-hist" onclick="showHistory('3b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn3b-canc" class="btn-effie-inv edt" onclick="disableEditor('3b')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn3b-edit" class="btn-effie edt" onclick="enableEditor('3b')">{{ __('Editar') }}</button>
                <button type="submit" id="btn3b-save" class="btn-effie edt" onclick="sendAnswer(event,'3b')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>