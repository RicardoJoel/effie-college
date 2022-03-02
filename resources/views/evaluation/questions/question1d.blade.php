@php
    $ans1d = $answers->get($qst1d->code,$user->username);
@endphp
<div id="qst1d" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1d->code }}</label>
            <p>{{ $qst1d->detail }}</p>
            <label>{{ $qst1d->remark }}</label>
            <input type="hidden" id="ans1d_detail" value="{{ $ans1d->detail ?? '' }}">
            <textarea id="ans1d"></textarea>
            <br>
        </div>
    </div>
</div>