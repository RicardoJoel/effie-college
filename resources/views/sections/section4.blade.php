@php 
    $sect4 = $sections->get($edition.'S4');
    $qst4a = $sect4->questions[0];
    $qst4c = $sect4->questions[1];
    $qst4d = $sect4->questions[2];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect4->title }}</h3>
    <p>{{ $sect4->description }}</p>
    <br>
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst4a')">{{ $qst4a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst4c')">{{ $qst4c->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst4d')">{{ $qst4d->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('questions/question4a')
        @include('questions/question4c')
        @include('questions/question4d')
    </div>
</div>