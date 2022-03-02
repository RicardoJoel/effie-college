@php
    $sect5 = $sections->get($edition.'S5');
    $qst5a = $sect5->questions[0];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect5->title }}</h3>
    <p>{{ $sect5->description }}</p>
    <br>
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst5a')">{{ $qst5a->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('questions/question5a')
    </div>
</div>