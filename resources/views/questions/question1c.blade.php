@php
    $ans1c = $answers->get($qst1c->code,$user->username);
@endphp
<div id="qst1c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1c->code }}</label>
            <p>{{ $qst1c->detail }}</p>
            <label>{{ $qst1c->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans1c_method" value="{{ $ans1c ? 'PATCH' : '' }}">
            <input type="hidden" id="ans1c_detail" value="{{ $ans1c->detail ?? '' }}">
            <input type="hidden" id="ans1c_id" value="{{ $ans1c->id ?? '' }}">
            <textarea id="ans1c"></textarea>
            <a class="btnhistory" id="btn1c-hist" onclick="showHistory('1c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans1c ? route('answers.update', $ans1c->id) : route('answers.store') }}" role="form" id="frm-ans1c">
                @csrf
                <input type="hidden" id="ans1c_method" value="{{ $ans1c ? 'PATCH' : '' }}">
                <input type="hidden" id="ans1c_detail" value="{{ $ans1c->detail ?? '' }}">
                <input type="hidden" id="qst1c_maxwrd" value="{{ $qst1c->maxwrd }}">
                <input type="hidden" id="qst1c_maxgrp" value="{{ $qst1c->maxgrp }}">
                <input type="hidden" id="ans1c_id" value="{{ $ans1c->id ?? '' }}">
                <input type="hidden" id="qst1c_id" value="{{ $qst1c->id }}">
                <div class="span-done" id="ans1c-done-div"><span id="ans1c-done-msg"></span></div>
                <div class="span-fail" id="ans1c-fail-div"><span id="ans1c-fail-msg"></span></div>
                <textarea id="ans1c"></textarea>
                <a class="btnhistory" id="btn1c-hist" onclick="showHistory('1c')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn1c-canc" class="btn-effie-inv edt" onclick="disableEditor('1c')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn1c-edit" class="btn-effie edt" onclick="enableEditor('1c')">{{ __('Editar') }}</button>
                <button type="submit" id="btn1c-save" class="btn-effie edt" onclick="sendAnswer(event,'1c')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>