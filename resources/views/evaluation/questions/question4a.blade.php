@php
    $ans4a = $answers->get($qst4a->code,$user->username);
@endphp
<div id="qst4a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst4a->code }}</label>
            <p>{{ $qst4a->detail }}</p>
            <label>{{ $qst4a->remark }}</label>
            <input type="hidden" id="ans4a_detail" value="{{ $ans4a->detail ?? '' }}">
            <textarea id="ans4a"></textarea>
            <br>
        </div>
    </div>
</div>