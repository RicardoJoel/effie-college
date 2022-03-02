@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Bienvenido, ') }} {{ Auth::user()->teacher->teacher_name }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta interfaz podrás visualizar tus datos personales y la lista de equipos que tienes a tu cargo.') }}</p>
    </div>
</div>
<div class="ficha">
    <h3 class="card-title">{{ __('Mis datos') }}</h3>
    <div class="fila dato">
        <div class="columna columna-3">
            <p><i class="fa fa-user"></i>&nbsp;
                <b>{{ __('Nombre completo: ') }}</b>{{ Auth::user()->teacher->teacher_name.' '.Auth::user()->teacher->teacher_lastname }}
            </p>
        </div>
        <div class="columna columna-3">
            <p><i class="fa fa-address-book"></i>&nbsp;
                <b>{{ __('Tipo de documento: ') }}</b>{{ Auth::user()->teacher->documentType->name }}
            </p>
        </div>
        <div class="columna columna-3">
            <p><i class="fa fa-id-card"></i>&nbsp;
                <b>{{ __('N° Documento: ') }}</b>{{ Auth::user()->teacher->teacher_document }}
            </p>
        </div>
    </div>
    <div class="fila dato">
        <div class="columna columna-3">
            <p><i class="fa fa-envelope"></i>&nbsp;
                <b>{{ __('Correo institucional: ') }}</b><a href="mailto:{{ Auth::user()->teacher->teacher_email }}">{{ Auth::user()->teacher->teacher_email }}</a>
            </p>
        </div>
        <div class="columna columna-3">
            <p><i class="fa fa-phone"></i>&nbsp;
                <b>{{ __('Número celular: ') }}</b>{{ Auth::user()->teacher->teacher_mobile }}
            </p>
        </div>
        <div class="columna columna-3">
            <p><i class="fa fa-briefcase"></i>&nbsp;
                <b>{{ __('Profesión / Especialidad: ') }}</b>{{ Auth::user()->teacher->teacher_profession }}
            </p>
        </div>
    </div>
    <center>
    <a href="{{ route('profile') }}" class="btn-effie">{{ __('Editar') }}</a>
    </center>
    <div class="space"></div>
    <h3 class="card-title">{{ __('Mis equipos') }}</h3>
    <p><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('Para visualizar el detalle de un equipo haz clic en la lupa de la columna Detalle.') }}</p>
    <table id="tbl-teams" class="tablealumno">
        <thead>
            <th width="5%">{{ __('N°') }}</th>
            <th width="15%">{{ __('Equipo') }}</th>
            <th width="25%">{{ __('Institución educativa') }}</th>
            <th width="10%">{{ __('Marca') }}</th>
            <th width="13%">{{ __('Inscripción') }}</th>
            <th width="12%">{{ __('Situación') }}</th>
            <th width="10%">{{ __('Revisar') }}</th>
            <th width="10%">{{ __('Detalle') }}</th>
        </thead>
        <tbody>
            @foreach(Auth::user()->teacher->teams as $team)
            @if($team->caso->edition->name === date('Y'))
            <tr>
                <td></td>
                <td><i class="fa fa-users"></i>&nbsp;{{ $team->username }}</td>
                <td>{{ $team->college->name }}</td>
                <td><center>{{ $team->caso->brand->name }}</center></td>
                <td><center>{{ Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i:s') }}</center></td>
                <td><center>{{ $team->situation }}</center></td>
                <td><center><a href="{{ url('tutor/evaluation',$team->id) }}"><i class="fa fa-eye"></i>&nbsp;{{ $team->is_completed ? 'Envío' : 'Avance' }}</a></center></td>
                <td><center><a href="{{ url('tutor/users',$team->id) }}"><i class="fa fa-search-plus"></i><i class="{{ $team->is_viewed ? '' : 'new' }}"></i></a></center></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="space2"></div>
    <div class="space"></div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/tutor/teams.js') }}"></script>
@endsection