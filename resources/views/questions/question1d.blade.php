@php
    $ans1d = $answers->get($qst1d->code,$user->username);
@endphp
<div id="qst1d" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1d->code }}</label>
            <p>{{ $qst1d->detail }}</p>
            <label>{{ $qst1d->remark }}</label>
            @if($user->is_completed)
            <input type="hidden" id="ans1d_method" value="{{ $ans1d ? 'PATCH' : '' }}">
            <input type="hidden" id="ans1d_detail" value="{{ $ans1d->detail ?? '' }}">
            <input type="hidden" id="ans1d_id" value="{{ $ans1d->id ?? '' }}">
            <textarea id="ans1d"></textarea>
            <a class="btnhistory" id="btn1d-hist" onclick="showHistory('1d')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
            @else
            <form method="POST" action="{{ $ans1d ? route('answers.update', $ans1d->id) : route('answers.store') }}" role="form" id="frm-ans1d">
                @csrf
                <input type="hidden" id="ans1d_method" value="{{ $ans1d ? 'PATCH' : '' }}">
                <input type="hidden" id="ans1d_detail" value="{{ $ans1d->detail ?? '' }}">
                <input type="hidden" id="qst1d_maxwrd" value="{{ $qst1d->maxwrd }}">
                <input type="hidden" id="qst1d_maxgrp" value="{{ $qst1d->maxgrp }}">
                <input type="hidden" id="ans1d_id" value="{{ $ans1d->id ?? '' }}">
                <input type="hidden" id="qst1d_id" value="{{ $qst1d->id }}">
                <div class="span-done" id="ans1d-done-div"><span id="ans1d-done-msg"></span></div>
                <div class="span-fail" id="ans1d-fail-div"><span id="ans1d-fail-msg"></span></div>
                <textarea id="ans1d"></textarea>
                <a class="btnhistory" id="btn1d-hist" onclick="showHistory('1d')"><i class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}</a>
                <button type="button" id="btn1d-canc" class="btn-effie-inv edt" onclick="disableEditor('1d')">{{ __('Cancelar') }}</button>
                <button type="button" id="btn1d-edit" class="btn-effie edt" onclick="enableEditor('1d')">{{ __('Editar') }}</button>
                <button type="submit" id="btn1d-save" class="btn-effie edt" onclick="sendAnswer(event,'1d')">{{ __('Guardar') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>