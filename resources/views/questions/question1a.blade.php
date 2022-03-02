@php
    $ans1a = $answers->get($qst1a->code,$user->username);
@endphp
<div id="qst1a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1a->code }}</label>
            <p>{{ $qst1a->detail }}</p>
            <label>{{ $qst1a->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans1a_method" value="{{ $ans1a ? 'PATCH' : '' }}">
            <input type="hidden" id="ans1a_detail" value="{{ $ans1a->detail ?? '' }}">
            <input type="hidden" id="ans1a_id" value="{{ $ans1a->id ?? '' }}">
            <textarea id="ans1a"></textarea>
            <a class="btnhistory" id="btn1a-hist" onclick="showHistory('1a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans1a ? route('answers.update', $ans1a->id) : route('answers.store') }}" role="form" id="frm-ans1a">
                @csrf
                <input type="hidden" id="ans1a_method" value="{{ $ans1a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans1a_detail" value="{{ $ans1a->detail ?? '' }}">
                <input type="hidden" id="qst1a_maxwrd" value="{{ $qst1a->maxwrd }}">
                <input type="hidden" id="qst1a_maxgrp" value="{{ $qst1a->maxgrp }}">
                <input type="hidden" id="ans1a_id" value="{{ $ans1a->id ?? '' }}">
                <input type="hidden" id="qst1a_id" value="{{ $qst1a->id }}">
                <div class="span-done" id="ans1a-done-div"><span id="ans1a-done-msg"></span></div>
                <div class="span-fail" id="ans1a-fail-div"><span id="ans1a-fail-msg"></span></div>
                <textarea id="ans1a"></textarea>
                <a class="btnhistory" id="btn1a-hist" onclick="showHistory('1a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn1a-canc" class="btn-effie-inv edt" onclick="disableEditor('1a')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn1a-edit" class="btn-effie edt" onclick="enableEditor('1a')">{{ __('Editar') }}</button>
                <button type="submit" id="btn1a-save" class="btn-effie edt" onclick="sendAnswer(event,'1a')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>