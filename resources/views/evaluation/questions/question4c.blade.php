@php
    $ans4c = $answers->get($qst4c->code,$user->username);
@endphp
<div id="qst4c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4c->code }}</label>
            <p>{{ $qst4c->detail }}</p>
            <label>{{ $qst4c->remark }}</label>
            <input type="hidden" id="ans4c_detail" value="{{ $ans4c->detail ?? '' }}">
            <textarea id="ans4c"></textarea>
            <br>
        </div>
    </div>
</div>