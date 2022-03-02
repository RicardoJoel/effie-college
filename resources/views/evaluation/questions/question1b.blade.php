@php
    $ans1b = $answers->get($qst1b->code,$user->username);
@endphp
<div id="qst1b" class="tabcontent">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1b->code }}</label>
            <p>{{ $qst1b->detail }}</p>
            <label>{{ $qst1b->remark }}</label>
            <input type="hidden" id="ans1b_detail" value="{{ $ans1b->detail ?? '' }}">
            <textarea id="ans1b"></textarea>
            <br>
        </div>
    </div>
</div>