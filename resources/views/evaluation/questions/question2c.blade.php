@php
    $ans2c = $answers->get($qst2c->code,$user->username);
@endphp
<div id="qst2c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2c->code }}</label>
            <p>{{ $qst2c->detail }}</p>
            <label>{{ $qst2c->remark }}</label>
            <input type="hidden" id="ans2c_detail" value="{{ $ans2c->detail ?? '' }}">
            <textarea id="ans2c"></textarea>
            <br>
        </div>
    </div>
</div>