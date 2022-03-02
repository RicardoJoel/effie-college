@extends('layouts.app')
@section('content')
<div class="ficha">
    <h1 class="card-title">{{ __('Equipo') }} {{ $user->username }}</h1>
    <h3 class="card-subtitle">{{ __('Datos generales') }}</h3>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-university"></i>&nbsp;
                <b>{{ __('Institución educativa: ') }}</b>{{ $user->college->name }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-graduation-cap"></i>&nbsp;
                <b>{{ __('Escuela / Facultad: ') }}</b>{{ $user->school }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-check-circle"></i>&nbsp;
                <b>{{ __('Marca elegida: ') }}</b>{{ $user->caso->brand->name }}
            </p>
        </div>
    </div>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-calendar"></i>&nbsp;
                <b>{{ __('Fecha de inscripción: ') }}</b>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-tag"></i>&nbsp;
                <b>{{ __('Situación: ') }}</b>{{ $user->situation }}
            </p>
        </div>
        <div class="columna columna-3"></div>
    </div>
    <div class="space"></div>
    <h3 class="card-subtitle">{{ __('Alumnos inscritos') }}</h3>
    <table class="tablealumno">
        <thead>
            <th width="20%">{{ __('Nombre completo') }}</th>
            <th width="15%">{{ __('Tipo de documento') }}</th>
            <th width="15%">{{ __('N° Documento') }}</th>
            <th width="15%">{{ __('Correo') }}</th>
            <th width="15%">{{ __('Celular') }}</th>
            <th width="10%">{{ __('Carrera') }}</th>
            <th width="10%">{{ __('Ciclo') }}</th>
        </thead>
        <tbody>
            @foreach ($user->students as $student)
            <tr>
                <td>{{ $student->student_name.' '.$student->student_lastname }}</td>
                <td><center>{{ $student->documentType->name }}</center></td>
                <td><center>{{ $student->student_document }}</center></td>
                <td><center><a href="mailto:{{ $student->student_email }}">{{ $student->student_email }}</a></center></td>
                <td><center>{{ $student->student_mobile }}</center></td>
                <td><center>{{ $student->career->name }}</center></td>
                <td><center>{{ $student->cycle->name }}</center></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="space"></div>
    <h3 class="card-title">{{ __('Propuesta para la marca') }}</h3>
    <div class="text-inscripcion">
        <img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}" style="width:200px;height:auto">
        @if ($user->is_completed)
        <a href="{{ url('tutor/evaluation',$user->id) }}" class="btn-effie">{{ __('Revisar') }}</a>
        @else
        <p>{{ __('El equipo aún no ha enviado su propuesta.') }}</p>
        @endif
    </div>
    <div class="fila">
        <div class="columna columna-1">
            <center>
            @if ($user->caso->edition->name === date('Y'))
            <a href="{{ action('UserController@edit', $user->id) }}" class="btn-effie">{{ __('Editar') }}</a>
            @endif
            <a href="{{ route('home') }}" class="btn-effie-inv">{{ __('Regresar') }}</a>
            </center>
        </div>
    </div>
    <div class="space"></div>
</div>
@endsection