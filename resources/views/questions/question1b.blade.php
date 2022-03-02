@php
    $ans1b = $answers->get($qst1b->code,$user->username);
@endphp
<div id="qst1b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1b->code }}</label>
            <p>{{ $qst1b->detail }}</p>
            <label>{{ $qst1b->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans1b_method" value="{{ $ans1b ? 'PATCH' : '' }}">
            <input type="hidden" id="ans1b_detail" value="{{ $ans1b->detail ?? '' }}">
            <input type="hidden" id="ans1b_id" value="{{ $ans1b->id ?? '' }}">
            <textarea id="ans1b"></textarea>
            <a class="btnhistory" id="btn1b-hist" onclick="showHistory('1b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans1b ? route('answers.update', $ans1b->id) : route('answers.store') }}" role="form" id="frm-ans1b">
                @csrf
                <input type="hidden" id="ans1b_method" value="{{ $ans1b ? 'PATCH' : '' }}">
                <input type="hidden" id="ans1b_detail" value="{{ $ans1b->detail ?? '' }}">
                <input type="hidden" id="qst1b_maxwrd" value="{{ $qst1b->maxwrd }}">
                <input type="hidden" id="qst1b_maxgrp" value="{{ $qst1b->maxgrp }}">
                <input type="hidden" id="ans1b_id" value="{{ $ans1b->id ?? '' }}">
                <input type="hidden" id="qst1b_id" value="{{ $qst1b->id }}">
                <div class="span-done" id="ans1b-done-div"><span id="ans1b-done-msg"></span></div>
                <div class="span-fail" id="ans1b-fail-div"><span id="ans1b-fail-msg"></span></div>
                <textarea id="ans1b"></textarea>
                <a class="btnhistory" id="btn1b-hist" onclick="showHistory('1b')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn1b-canc" class="btn-effie-inv edt" onclick="disableEditor('1b')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn1b-edit" class="btn-effie edt" onclick="enableEditor('1b')">{{ __('Editar') }}</button>
                <button type="submit" id="btn1b-save" class="btn-effie edt" onclick="sendAnswer(event,'1b')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>