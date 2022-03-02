@php
    $ans4b = $answers->get($qst4b->code,$user->username);
@endphp
<div id="qst4b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4b->code }}</label>
            <p>{{ $qst4b->detail }}</p>
            <label>{{ $qst4b->remark }}</label>
            <input type="hidden" id="ans4b_detail" value="{{ $ans4b->detail ?? '' }}">
            <textarea id="ans4b"></textarea>
            <br>
        </div>
    </div>
</div>