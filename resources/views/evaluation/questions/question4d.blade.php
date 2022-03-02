@php
    $ans4d = $answers->get($qst4d->code,$user->username);
@endphp
<div id="qst4d" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4d->code }}</label>
            <p>{{ $qst4d->detail }}</p>
            <label>{{ $qst4d->remark }}</label>
            <input type="hidden" id="ans4d_detail" value="{{ $ans4d->detail ?? '' }}">
            <textarea id="ans4d"></textarea>
            <br>
        </div>
    </div>
</div>