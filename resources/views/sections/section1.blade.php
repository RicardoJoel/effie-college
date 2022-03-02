@php
    $sect1 = $sections->get($edition.'S1');
    $qst1a = $sect1->questions[0];
    $qst1b = $sect1->questions[1];
    $qst1c = $sect1->questions[2];
    $qst1d = $sect1->questions[3];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect1->title }}</h3>
    <p>{{ $sect1->description }}</p>
    <br>
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst1a')">{{ $qst1a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1b')">{{ $qst1b->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1c')">{{ $qst1c->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst1d')">{{ $qst1d->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('questions/question1a')
        @include('questions/question1b')
        @include('questions/question1c')
        @include('questions/question1d')
    </div>
</div>