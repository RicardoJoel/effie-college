@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Bienvenido, ') }} {{ Auth::user()->school }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta interfaz podrás visualizar la lista de equipos que tienes a tu cargo y calificar su propuesta enviada.') }}</p>
    </div>
</div>
<div class="ficha">
    <h3 class="card-title">{{ __('Equipos a evaluar') }}</h3>
    <p><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('Para visualizar la propuesta enviada por un equipo haz clic en el ícono de la columna Propuesta.') }}</p>
    <table id="tbl-teams" class="tablealumno">
        <thead>
            <th width="5%">{{ __('N°') }}</th>
            <th width="15%">{{ __('Equipo') }}</th>
            <th width="15%">{{ __('Marca') }}</th>
            <th width="15%">{{ __('Situación') }}</5h>
            <th width="15%">{{ __('Revisar') }}</th>
            <th width="10%">{{ __('Puntaje') }}</th>
        </thead>
        <tbody>
            @foreach(Auth::user()->caso->teams->where('situation','PARTICIPANTE') as $team)
            <tr>
                <td></td>
                <td><center><i class="fa fa-users"></i>&nbsp;{{ $team->username }}</center></td>
                <td><center>{{ $team->caso->brand->name }}</center></td>
                <td><center>{{ $team->situation }}</center></td>
                <td><center>
                @if($team->is_completed)
                <a href="{{ route('evaluation',$team->id) }}"><i class="fa fa-eye"></i>&nbsp;{{ __('Propuesta') }}</a>
                @endif
                </center></td>
                <td><center>
                @if($review = $team->reviewsByAuth->first())
                <a href="{{ route('viewScore',$team->id) }}">{{ ($review->score1 + $review->score2 + $review->score3 + $review->score4)*0.25 }}</a>
                @endif
                </center></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="space2"></div>
	<form method="POST" action="{{ route('blockScore') }}" id="frm-save">
        @csrf
	</form>
    <center>
    @if(!Auth::user()->is_finished)
    <button onclick="if (confirm('Estás a punto de cerrar las notas para las propuestas enviadas a la marca. Pasado este punto, no podrás modificarlas. ¿Deseas continuar?')) {event.preventDefault();document.getElementById('frm-save').submit();}"
            type="submit" class="btn-effie" style="width:170px">{{ __('Cerrar notas') }}</button>
    @endif
    <a href="{{ route('password') }}" class="btn-effie-inv"><i class="fa fa-lock"></i>&nbsp;{{ __('Mi clave') }}</a>
    </center>
    <div class="space"></div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/tutor/teams.js') }}"></script>
@endsection