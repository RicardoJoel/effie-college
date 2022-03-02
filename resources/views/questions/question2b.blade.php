@php
    $ans2b = $answers->get($qst2b->code,$user->username);
@endphp
<div id="qst2b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2b->code }}</label>
            <p>{{ $qst2b->detail }}</p>
            <label>{{ $qst2b->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans2b_method" value="{{ $ans2b ? 'PATCH' : '' }}">
            <input type="hidden" id="ans2b_detail" value="{{ $ans2b->detail ?? '' }}">
            <input type="hidden" id="ans2b_id" value="{{ $ans2b->id ?? '' }}">
            <textarea id="ans2b"></textarea>
            <a class="btnhistory" id="btn2b-hist" onclick="showHistory('2b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans2b ? route('answers.update', $ans2b->id) : route('answers.store') }}" role="form" id="frm-ans2b">
                @csrf
                <input type="hidden" id="ans2b_method" value="{{ $ans2b ? 'PATCH' : '' }}">
                <input type="hidden" id="ans2b_detail" value="{{ $ans2b->detail ?? '' }}">
                <input type="hidden" id="qst2b_maxwrd" value="{{ $qst2b->maxwrd }}">
                <input type="hidden" id="qst2b_maxgrp" value="{{ $qst2b->maxgrp }}">
                <input type="hidden" id="ans2b_id" value="{{ $ans2b->id ?? '' }}">
                <input type="hidden" id="qst2b_id" value="{{ $qst2b->id }}">
                <div class="span-done" id="ans2b-done-div"><span id="ans2b-done-msg"></span></div>
                <div class="span-fail" id="ans2b-fail-div"><span id="ans2b-fail-msg"></span></div>
                <textarea id="ans2b"></textarea>
                <a class="btnhistory" id="btn2b-hist" onclick="showHistory('2b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn2b-canc" class="btn-effie-inv edt" onclick="disableEditor('2b')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn2b-edit" class="btn-effie edt" onclick="enableEditor('2b')">{{ __('Editar') }}</button>
                <button type="submit" id="btn2b-save" class="btn-effie edt" onclick="sendAnswer(event,'2b')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>