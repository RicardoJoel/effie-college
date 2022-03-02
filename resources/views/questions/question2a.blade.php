@php
    $ans2a = $answers->get($qst2a->code,$user->username);
@endphp
<div id="qst2a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2a->code }}</label>
            <p>{{ $qst2a->detail }}</p>
            <label>{{ $qst2a->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans2a_method" value="{{ $ans2a ? 'PATCH' : '' }}">
            <input type="hidden" id="ans2a_detail" value="{{ $ans2a->detail ?? '' }}">
            <input type="hidden" id="ans2a_id" value="{{ $ans2a->id ?? '' }}">
            <textarea id="ans2a"></textarea>
            <a class="btnhistory" id="btn2a-hist" onclick="showHistory('2a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans2a ? route('answers.update', $ans2a->id) : route('answers.store') }}" role="form" id="frm-ans2a">
                @csrf
                <input type="hidden" id="ans2a_method" value="{{ $ans2a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans2a_detail" value="{{ $ans2a->detail ?? '' }}">
                <input type="hidden" id="qst2a_maxwrd" value="{{ $qst2a->maxwrd }}">
                <input type="hidden" id="qst2a_maxgrp" value="{{ $qst2a->maxgrp }}">
                <input type="hidden" id="ans2a_id" value="{{ $ans2a->id ?? '' }}">
                <input type="hidden" id="qst2a_id" value="{{ $qst2a->id }}">
                <div class="span-done" id="ans2a-done-div"><span id="ans2a-done-msg"></span></div>
                <div class="span-fail" id="ans2a-fail-div"><span id="ans2a-fail-msg"></span></div>
                <textarea id="ans2a"></textarea>
                <a class="btnhistory" id="btn2a-hist" onclick="showHistory('2a')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn2a-canc" class="btn-effie-inv edt" onclick="disableEditor('2a')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn2a-edit" class="btn-effie edt" onclick="enableEditor('2a')">{{ __('Editar') }}</button>
                <button type="submit" id="btn2a-save" class="btn-effie edt" onclick="sendAnswer(event,'2a')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>