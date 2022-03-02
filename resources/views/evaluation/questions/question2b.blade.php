@php
    $ans2b = $answers->get($qst2b->code,$user->username);
@endphp
<div id="qst2b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2b->code }}</label>
            <p>{{ $qst2b->detail }}</p>
            <label>{{ $qst2b->remark }}</label>
            <input type="hidden" id="ans2b_detail" value="{{ $ans2b->detail ?? '' }}">
            <textarea id="ans2b"></textarea>
            <br>
        </div>
    </div>
</div>