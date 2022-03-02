@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Bienvenido, ') }} {{ Auth::user()->situation }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta interfaz podrás visualizar la lista de equipos inscritos, conocer su detalle y editar sus datos generales, del tutor a cargo y de los alumnos miembros. Asimismo, podrás descargar los documentos entregados por las marcas participantes en cada edición.') }}</p>
    </div>
</div>
<div class="ficha">
    <p><i class="fa fa-info-circle"></i>&nbsp;{{ __('Seleccione la edición que desea visualizar: ') }}
    @inject('editions','App\Services\Editions')
    <select name="edition_id" id="edition_id">
        @foreach ($editions->get() as $index => $edition)
        <option value="{{ $index }}" {{ $edition === date('Y') ? 'selected' : '' }}>
            {{ $edition }}
        </option>
        @endforeach
    </select></p>
    <div class="span-fail" id="fail-div"><span id="fail-msg"></span></div>
    <div class="space"></div>
    <h3 id="subtitle" class="card-title">{{ __('Listado de marcas participantes') }}</h3>
    <p style="margin-bottom:10px"><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('Para descargar los documentos proporcionados por una marca haz clic en los íconos de la derecha.') }}</p>
    <table id="tbl-casos" class="tablealumno">
        <thead>
            <th width="30%">{{ __('Marca') }}</th>
            <th width="35%">{{ __('Brief') }}</th>
            <th width="35%">{{ __('Kit completo') }}</th>
        </thead>
    </table>
    <div class="space"></div>
    <h3 class="card-title">{{ __('Listado de equipos participantes') }}</h3>
    <div class="fila dato">
        <p><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Equipos inscritos: ') }}</b><p id="numteams"></p></p>
        <a id="btn-refresh" onclick="showTeams()"><i class="fa fa-refresh fa-2x"></i></a>
    </div>
    <div class="fila">
        <p><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('Para visualizar el detalle de un equipo haz clic en la lupa de la columna Detalle.') }}</p>
    </div>
    <table id="tbl-index" class="tablealumno">
        <thead>
            <th width="5%">{{ __('N°') }}</th>
            <th width="15%">{{ __('Equipo') }}</th>
            <th width="25%">{{ __('Institución educativa') }}</th>
            <th width="10%">{{ __('Marca') }}</th>
            <th width="15%">{{ __('Situación') }}</th>
            <th width="10%">{{ __('Revisar') }}</th>
            <th width="10%">{{ __('Puntaje') }}</th>
            <th width="10%">{{ __('Detalle') }}</th>
        </thead>
    </table>
    <div class="space2"></div>
    <form method="GET" action="{{ route('users.download') }}">
        <center><button type="submit" class="btn-effie" style="width:225px"><i class="fa fa-download"></i>&nbsp;{{ __('Descargar equipos') }}</button></center>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/admin/cases4.js') }}"></script>
<script src="{{ asset('js/admin/teams10.js') }}"></script>
@endsection