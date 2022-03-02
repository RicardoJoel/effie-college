@php
    $ans1c = $answers->get($qst1c->code,$user->username);
@endphp
<div id="qst1c" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1c->code }}</label>
            <p>{{ $qst1c->detail }}</p>
            <label>{{ $qst1c->remark }}</label>
            <input type="hidden" id="ans1c_detail" value="{{ $ans1c->detail ?? '' }}">
            <textarea id="ans1c"></textarea>
            <br>
        </div>
    </div>
</div>