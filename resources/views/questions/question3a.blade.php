@php
    $ans3a = $answers->get($qst3a->code,$user->username);
@endphp
<div id="qst3a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3a->code }}</label>
            <p>{{ $qst3a->detail }}</p>
            <label>{{ $qst3a->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans3a_method" value="{{ $ans3a ? 'PATCH' : '' }}">
            <input type="hidden" id="ans3a_detail" value="{{ $ans3a->detail ?? '' }}">
            <input type="hidden" id="ans3a_id" value="{{ $ans3a->id ?? '' }}">
            <textarea id="ans3a"></textarea>
            <a class="btnhistory" id="btn3a-hist" onclick="showHistory('3a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans3a ? route('answers.update', $ans3a->id) : route('answers.store') }}" role="form" id="frm-ans3a">
                @csrf
                <input type="hidden" id="ans3a_method" value="{{ $ans3a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans3a_detail" value="{{ $ans3a->detail ?? '' }}">
                <input type="hidden" id="qst3a_maxwrd" value="{{ $qst3a->maxwrd }}">
                <input type="hidden" id="qst3a_maxgrp" value="{{ $qst3a->maxgrp }}">
                <input type="hidden" id="ans3a_id" value="{{ $ans3a->id ?? '' }}">
                <input type="hidden" id="qst3a_id" value="{{ $qst3a->id }}">
                <div class="span-done" id="ans3a-done-div"><span id="ans3a-done-msg"></span></div>
                <div class="span-fail" id="ans3a-fail-div"><span id="ans3a-fail-msg"></span></div>
                <textarea id="ans3a"></textarea>
                <a class="btnhistory" id="btn3a-hist" onclick="showHistory('3a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn3a-canc" class="btn-effie-inv edt" onclick="disableEditor('3a')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn3a-edit" class="btn-effie edt" onclick="enableEditor('3a')">{{ __('Editar') }}</button>
                <button type="submit" id="btn3a-save" class="btn-effie edt" onclick="sendAnswer(event,'3a')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>