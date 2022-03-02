@php
    $ans3a = $answers->get($qst3a->code,$user->username);
@endphp
<div id="qst3a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst3a->code }}</label>
            <p>{{ $qst3a->detail }}</p>
            <label>{{ $qst3a->remark }}</label>
            <input type="hidden" id="ans3a_detail" value="{{ $ans3a->detail ?? '' }}">
            <textarea id="ans3a"></textarea>
            <br>
        </div>
    </div>
</div>