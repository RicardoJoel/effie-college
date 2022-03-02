@php
    $ans4c = $answers->get($qst4c->code,$user->username);
@endphp
<div id="qst4c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4c->code }}</label>
            <p>{{ $qst4c->detail }}</p>
            <label>{{ $qst4c->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans4c_method" value="{{ $ans4c ? 'PATCH' : '' }}">
            <input type="hidden" id="ans4c_detail" value="{{ $ans4c->detail ?? '' }}">
            <input type="hidden" id="ans4c_id" value="{{ $ans4c->id ?? '' }}">
            <textarea id="ans4c"></textarea>
            <a class="btnhistory" id="btn4c-hist" onclick="showHistory('4c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans4c ? route('answers.update', $ans4c->id) : route('answers.store') }}" role="form" id="frm-ans4c">
                @csrf
                <input type="hidden" id="ans4c_method" value="{{ $ans4c ? 'PATCH' : '' }}">
                <input type="hidden" id="ans4c_detail" value="{{ $ans4c->detail ?? '' }}">
                <input type="hidden" id="qst4c_maxwrd" value="{{ $qst4c->maxwrd }}">
                <input type="hidden" id="qst4c_maxgrp" value="{{ $qst4c->maxgrp }}">
                <input type="hidden" id="ans4c_id" value="{{ $ans4c->id ?? '' }}">
                <input type="hidden" id="qst4c_id" value="{{ $qst4c->id }}">
                <div class="span-done" id="ans4c-done-div"><span id="ans4c-done-msg"></span></div>
                <div class="span-fail" id="ans4c-fail-div"><span id="ans4c-fail-msg"></span></div>
                <textarea id="ans4c"></textarea>
                <a class="btnhistory" id="btn4c-hist" onclick="showHistory('4c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn4c-canc" class="btn-effie-inv edt" onclick="disableEditor('4c')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn4c-edit" class="btn-effie edt" onclick="enableEditor('4c')">{{ __('Editar') }}</button>
                <button type="submit" id="btn4c-save" class="btn-effie edt" onclick="sendAnswer(event,'4c')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>