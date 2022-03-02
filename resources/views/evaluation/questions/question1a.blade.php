@php
    $ans1a = $answers->get($qst1a->code,$user->username);
@endphp
<div id="qst1a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst1a->code }}</label>
            <p>{{ $qst1a->detail }}</p>
            <label>{{ $qst1a->remark }}</label>
            <input type="hidden" id="ans1a_detail" value="{{ $ans1a->detail ?? '' }}">
            <textarea id="ans1a"></textarea>
            <br>
        </div>
    </div>
</div>