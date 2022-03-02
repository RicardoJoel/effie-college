@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Puntaje obtenido por el equipo ') }} {{ $user->username }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta interfaz podrás visualizar la calificación asignada al equipo por cada jurado de la marca.') }}</p>
    </div>
</div>
<div class="ficha">
    <h3 class="card-title">{{ __('Listado de evaluaciones') }}</h3>
    <p><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('Para visualizar el detalle de notas asignadas por un jurado haz clic en la nota de la columna Puntaje.') }}</p>
    <table id="tbl-reviews" class="tablealumno">
        <thead>
            <th width="5%">{{ __('N°') }}</th>
            <th width="30%">{{ __('Nombre del jurado') }}</th>
            <th width="20%">{{ __('Correo electrónico') }}</th>
            <th width="30%">{{ __('Fecha ult. calificación') }}</th>
            <th width="15%">{{ __('Puntaje') }}</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($user->reviewsLikeTeam as $review)
            <tr>
                <td></td>
                <td>{{ $review->jury->school }}</td>
                <td>{{ $review->jury->username }}</td>
                <td><center>{{ Carbon\Carbon::parse($review->updated_at)->format('d/m/Y H:i:s') }}</center></td>
                <td><center><a href="{{ url('admin/viewScore/'.$user->id.'/'.$review->jury->id) }}">{{ ($review->score1 + $review->score2 + $review->score3 + $review->score4)*0.25 }}</a></center></td>
                <td>{{ ($review->score1 + $review->score2 + $review->score3 + $review->score4)*0.25 }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right">{{ __('Puntaje promedio: ') }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <div class="space2"></div>
    <center><a href="{{ route('home') }}" class="btn-effie-inv"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a></center>
</div>
@endsection

@section('script')
<script src="{{ asset('js/reviews2.js') }}"></script>
@endsection