@php
    $ans2c = $answers->get($qst2c->code,$user->username);
@endphp
<div id="qst2c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2c->code }}</label>
            <p>{{ $qst2c->detail }}</p>
            <label>{{ $qst2c->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans2c_method" value="{{ $ans2c ? 'PATCH' : '' }}">
            <input type="hidden" id="ans2c_detail" value="{{ $ans2c->detail ?? '' }}">
            <input type="hidden" id="ans2c_id" value="{{ $ans2c->id ?? '' }}">
            <textarea id="ans2c"></textarea>
            <a class="btnhistory" id="btn2c-hist" onclick="showHistory('2c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans2c ? route('answers.update', $ans2c->id) : route('answers.store') }}" role="form" id="frm-ans2c">
                @csrf
                <input type="hidden" id="ans2c_method" value="{{ $ans2c ? 'PATCH' : '' }}">
                <input type="hidden" id="ans2c_detail" value="{{ $ans2c->detail ?? '' }}">
                <input type="hidden" id="qst2c_maxwrd" value="{{ $qst2c->maxwrd }}">
                <input type="hidden" id="qst2c_maxgrp" value="{{ $qst2c->maxgrp }}">
                <input type="hidden" id="ans2c_id" value="{{ $ans2c->id ?? '' }}">
                <input type="hidden" id="qst2c_id" value="{{ $qst2c->id }}">
                <div class="span-done" id="ans2c-done-div"><span id="ans2c-done-msg"></span></div>
                <div class="span-fail" id="ans2c-fail-div"><span id="ans2c-fail-msg"></span></div>
                <textarea id="ans2c"></textarea>
                <a class="btnhistory" id="btn2c-hist" onclick="showHistory('2c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn2c-canc" class="btn-effie-inv edt" onclick="disableEditor('2c')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn2c-edit" class="btn-effie edt" onclick="enableEditor('2c')">{{ __('Editar') }}</button>
                <button type="submit" id="btn2c-save" class="btn-effie edt" onclick="sendAnswer(event,'2c')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>