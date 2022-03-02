@php
    $ans3c = $answers->get($qst3c->code,$user->username);
@endphp
<div id="qst3c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3c->code }}</label>
            <p>{{ $qst3c->detail }}</p>
            <label>{{ $qst3c->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans3c_method" value="{{ $ans3c ? 'PATCH' : '' }}">
            <input type="hidden" id="ans3c_detail" value="{{ $ans3c->detail ?? '' }}">
            <input type="hidden" id="ans3c_id" value="{{ $ans3c->id ?? '' }}">
            <textarea id="ans3c"></textarea>
            <a class="btnhistory" id="btn3c-hist" onclick="showHistory('3c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans3c ? route('answers.update', $ans3c->id) : route('answers.store') }}" role="form" id="frm-ans3c">
                @csrf
                <input type="hidden" id="ans3c_method" value="{{ $ans3c ? 'PATCH' : '' }}">
                <input type="hidden" id="ans3c_detail" value="{{ $ans3c->detail ?? '' }}">
                <input type="hidden" id="qst3c_maxwrd" value="{{ $qst3c->maxwrd }}">
                <input type="hidden" id="qst3c_maxgrp" value="{{ $qst3c->maxgrp }}">
                <input type="hidden" id="ans3c_id" value="{{ $ans3c->id ?? '' }}">
                <input type="hidden" id="qst3c_id" value="{{ $qst3c->id }}">
                <div class="span-done" id="ans3c-done-div"><span id="ans3c-done-msg"></span></div>
                <div class="span-fail" id="ans3c-fail-div"><span id="ans3c-fail-msg"></span></div>
                <textarea id="ans3c"></textarea>
                <a class="btnhistory" id="btn3c-hist" onclick="showHistory('3c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn3c-canc" class="btn-effie-inv edt" onclick="disableEditor('3c')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn3c-edit" class="btn-effie edt" onclick="enableEditor('3c')">{{ __('Editar') }}</button>
                <button type="submit" id="btn3c-save" class="btn-effie edt" onclick="sendAnswer(event,'3c')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>