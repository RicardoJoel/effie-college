@php
    $ans3b = $answers->get($qst3b->code,$user->username);
@endphp
<div id="qst3b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3b->code }}</label>
            <p>{{ $qst3b->detail }}</p>
            <label>{{ $qst3b->remark }}</label>
            <input type="hidden" id="ans3b_detail" value="{{ $ans3b->detail ?? '' }}">
            <textarea id="ans3b"></textarea>
            <br>
        </div>
    </div>
</div>