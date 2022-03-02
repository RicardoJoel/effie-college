@php
    $ans3c = $answers->get($qst3c->code,$user->username);
@endphp
<div id="qst3c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3c->code }}</label>
            <p>{{ $qst3c->detail }}</p>
            <label>{{ $qst3c->remark }}</label>
            <input type="hidden" id="ans3c_detail" value="{{ $ans3c->detail ?? '' }}">
            <textarea id="ans3c"></textarea>
            <br>
        </div>
    </div>
</div>