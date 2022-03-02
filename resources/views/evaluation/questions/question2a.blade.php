@php
    $ans2a = $answers->get($qst2a->code,$user->username);
@endphp
<div id="qst2a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst2a->code }}</label>
            <p>{{ $qst2a->detail }}</p>
            <label>{{ $qst2a->remark }}</label>
            <input type="hidden" id="ans2a_detail" value="{{ $ans2a->detail ?? '' }}">
            <textarea id="ans2a"></textarea>
            <br>
        </div>
    </div>
</div>