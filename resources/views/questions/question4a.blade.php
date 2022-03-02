@php
    $ans4a = $answers->get($qst4a->code,$user->username);
@endphp
<div id="qst4a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4a->code }}</label>
            <p>{{ $qst4a->detail }}</p>
            <label>{{ $qst4a->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans4a_method" value="{{ $ans4a ? 'PATCH' : '' }}">
            <input type="hidden" id="ans4a_detail" value="{{ $ans4a->detail ?? '' }}">
            <input type="hidden" id="ans4a_id" value="{{ $ans4a->id ?? '' }}">
            <textarea id="ans4a"></textarea>
            <a class="btnhistory" id="btn4a-hist" onclick="showHistory('4a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans4a ? route('answers.update', $ans4a->id) : route('answers.store') }}" role="form" id="frm-ans4a">
                @csrf
                <input type="hidden" id="ans4a_method" value="{{ $ans4a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans4a_detail" value="{{ $ans4a->detail ?? '' }}">
                <input type="hidden" id="qst4a_maxwrd" value="{{ $qst4a->maxwrd }}">
                <input type="hidden" id="qst4a_maxgrp" value="{{ $qst4a->maxgrp }}">
                <input type="hidden" id="ans4a_id" value="{{ $ans4a->id ?? '' }}">
                <input type="hidden" id="qst4a_id" value="{{ $qst4a->id }}">
                <div class="span-done" id="ans4a-done-div"><span id="ans4a-done-msg"></span></div>
                <div class="span-fail" id="ans4a-fail-div"><span id="ans4a-fail-msg"></span></div>
                <textarea id="ans4a"></textarea>
                <a class="btnhistory" id="btn4a-hist" onclick="showHistory('4a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn4a-canc" class="btn-effie-inv edt" onclick="disableEditor('4a')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn4a-edit" class="btn-effie edt" onclick="enableEditor('4a')">{{ __('Editar') }}</button>
                <button type="submit" id="btn4a-save" class="btn-effie edt" onclick="sendAnswer(event,'4a')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>