@extends('layouts.app')
@section('content')
<div class="ficha">
    <h1 class="card-title">{{ __('Editar equipo') }} {{ $user->username }}</h1>
    <div class="formulario-inscripcion">
        <form method="POST" action="{{ url('admin/users',$user->id) }}" role="form" id="frm-user">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <h3 class="card-subtitle">{{ __('Datos generales') }}</h3>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Institución educativa*') }}</label>
                    @inject('colleges','App\Services\Colleges')
                    <select name="college_id" id="college_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($colleges->get() as $index => $college)
                        <option value="{{ $index }}" {{ old('college_id', $user->college_id) == $index ? 'selected' : '' }}>
                            {{ $college }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Escuela / Facultad*') }}</label>
                    <input type="text" name="school" id="school" maxlength="50" value="{{ old('school', $user->school) }}" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Marca elegida*') }}</label>
                    @inject('casos','App\Services\Casos')
                    <select name="caso_id" id="caso_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($casos->get($user->caso->edition->name) as $index => $caso)
                        <option value="{{ $index }}" {{ old('caso_id', $user->caso_id) == $index ? 'selected' : '' }}>
                            {{ $caso['brand'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Fecha de inscripción') }}</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}" style="background-color:#E5E7E9" disabled>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Situación*') }}</label>
                    <select name="situation" id="situation" required>
                        <option value="PARTICIPANTE" {{ old('situation', $user->situation) == 'PARTICIPANTE' ? 'selected' : '' }}>{{ __('PARTICIPANTE') }}</option>
                        <option value="NO VALIDADO" {{ old('situation', $user->situation) == 'NO VALIDADO' ? 'selected' : '' }}>{{ __('NO VALIDADO') }}</option>
                        <option value="DESCALIFICADO" {{ old('situation', $user->situation) == 'DESCALIFICADO' ? 'selected' : '' }}>{{ __('DESCALIFICADO') }}</option>
                        <option value="FINALISTA" {{ old('situation', $user->situation) == 'FINALISTA' ? 'selected' : '' }}>{{ __('FINALISTA') }}</option>
                        <option value="GANADOR" {{ old('situation', $user->situation) == 'GANADOR' ? 'selected' : '' }}>{{ __('GANADOR') }}</option>
                        <option value="PRUEBA" {{ old('situation', $user->situation) == 'PRUEBA' ? 'selected' : '' }}>{{ __('PRUEBA') }}</option>
                    </select>
                </div>
                <div class="columna columna-3"></div>
            </div>
            <div class="space"></div>
            <h3 class="card-subtitle">{{ __('Datos del tutor') }}</h3>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Nombres*') }}</label>
                    <input type="text" name="teacher_name" id="teacher_name" maxlength="50" value="{{ old('teacher_name', $user->teacher->teacher_name) }}" onkeypress="return checkName(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Apellidos*') }}</label>
                    <input type="text" name="teacher_lastname" id="teacher_lastname" maxlength="50" value="{{ old('teacher_lastname', $user->teacher->teacher_lastname) }}" onkeypress="return checkName(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Correo institucional*') }}</label>
                    <input type="email" name="teacher_email" id="teacher_email" maxlength="50" value="{{ old('teacher_email', $user->teacher->teacher_email) }}" onkeypress="return checkEmail(event)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                </div>
            </div>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Tipo de documento*') }}</label>
                    @inject('documentTypes','App\Services\DocumentTypes')
                    <select name="teacher_document_type_id" id="teacher_document_type_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($documentTypes->get() as $index => $documentType)
                        <option value="{{ $index }}" {{ old('teacher_document_type_id', $user->teacher->teacher_document_type_id) == $index ? 'selected' : '' }}>
                            {{ $documentType }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="columna columna-6">
                    <label>{{ __('N° Documento*') }}</label>
                    <input type="hidden" name="teacher_pattern" id="teacher_pattern" value="{{ old('teacher_pattern') }}">
                    <input type="text" name="teacher_document" id="teacher_document" value="{{ old('teacher_document', $user->teacher->teacher_document) }}" maxlength="15" onkeyup="return mayusculas(this)" required>
                </div>
                <div class="columna columna-6">
                    <label>{{ __('Número celular*') }}</label>
                    <input type="tel" name="teacher_mobile" id="teacher_mobile" maxlength="11" value="{{ old('teacher_mobile', $user->teacher->teacher_mobile) }}" onkeypress="return checkNumber(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Profesión / Especialidad*') }}</label>
                    <input type="text" name="teacher_profession" id="teacher_profession" maxlength="50" value="{{ old('teacher_profession', $user->teacher->teacher_profession) }}" onkeypress="return checkText(event)" required>
                </div>
            </div>
        </form>
    </div>
    <div class="space"></div>
    <h3 id="subtitle" class="card-subtitle">{{ __('Agregar alumno') }}</h3>
    <div class="formulario-inscripcion">
        <form method="POST" action="{{ action('StudentController@store') }}" role="form" id="frm-student">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ old('id') }}">
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Nombres*') }}</label>
                    <input type="text" name="student_name" id="student_name" maxlength="50" value="{{ old('student_name') }}" onkeypress="return checkName(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Apellidos*') }}</label>
                    <input type="text" name="student_lastname" id="student_lastname" maxlength="50" value="{{ old('student_lastname') }}" onkeypress="return checkName(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Correo institucional*') }}</label>
                    <input type="email" name="student_email" id="student_email" maxlength="50" value="{{ old('student_email') }}" onkeypress="return checkEmail(event)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                </div>
            </div>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Tipo de documento*') }}</label>
                    @inject('documentTypes','App\Services\DocumentTypes')
                    <select name="student_document_type_id" id="student_document_type_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($documentTypes->get() as $index => $documentType)
                        <option value="{{ $index }}" {{ old('student_document_type_id') == $index ? 'selected' : '' }}>
                            {{ $documentType }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="columna columna-6">
                    <label>{{ __('N° Documento*') }}</label>
                    <input type="hidden" name="student_pattern" id="student_pattern" value="{{ old('student_pattern') }}">
                    <input type="text" name="student_document" id="student_document" value="{{ old('student_document') }}" maxlength="15" onkeyup="return mayusculas(this)" required>
                </div>
                <div class="columna columna-6">
                    <label>{{ __('Número celular*') }}</label>
                    <input type="tel" name="student_mobile" id="student_mobile" maxlength="11" value="{{ old('student_mobile') }}" onkeypress="return checkNumber(event)" required>
                </div>
                <div class="columna columna-3">
                    <label>{{ __('Tipo de carrera*') }}</label>
                    @inject('careers','App\Services\Careers')
                    <select name="student_career_id" id="student_career_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($careers->get() as $index => $career)
                        <option value="{{ $index }}" {{ old('student_career_id') == $index ? 'selected' : '' }}>
                            {{ $career }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="fila">
                <div class="columna columna-3">
                    <label>{{ __('Ciclo actual*') }}</label>
                    @inject('cycles','App\Services\Cycles')
                    <select name="student_cycle_id" id="student_cycle_id" required>
                        <option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
                        @foreach ($cycles->get() as $index => $cycle)
                        <option value="{{ $index }}" {{ old('student_cycle_id') == $index ? 'selected' : '' }}>
                            {{ $cycle }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="columna columna-3"><br></div>
                <div class="columna columna-3">
                    <center>
                    <button id="submit" type="submit" class="btn-effie" style="margin:16px 0px">{{ __('Agregar') }}</button>  
                    <a onclick="clearForm()" class="btn-effie-inv" style="margin:16px 0px;width:150px">{{ __('Limpiar') }}</a>
                    </center>
                </div>
            </div>
            <div class="span-fail" id="fail-div"><span id="fail-msg"></span></div>
        </form>
    </div>
    <div class="space"></div>
    <h3 class="card-title">{{ __('Alumnos inscritos') }}</h3>
    <table id="tbl-students" class="tablealumno">
        <thead>
            <th width="20%">{{ __('Nombre completo') }}</th>
            <th width="15%">{{ __('N° Documento') }}</th>
            <th width="15%">{{ __('Correo') }}</th>
            <th width="15%">{{ __('Celular') }}</th>
            <th width="15%">{{ __('Carrera') }}</th>
            <th width="10%">{{ __('Ciclo') }}</th>
            <th width="5%">{{ __('Editar') }}</th>
            <th width="5%">{{ __('Borrar') }}</th>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
            <tr>
                <td>{{ $student['student_name'].' '.$student['student_lastname'] }}</td>
                <td><center>{{ $student['student_document'] }}</center></td>
                <td><center>{{ $student['student_email'] }}</center></td>
                <td><center>{{ $student['student_mobile'] }}</center></td>
                <td><center>{{ $student['student_career'] }}</center></td>
                <td><center>{{ $student['student_cycle'] }}</center></td>
                <td><center><a name="{{ $index }}" onclick="editStudent(this)"><i class="fa fa-edit"></i></a></center></td>
                <td><center><a name="{{ $index }}" onclick="removeStudent(this)"><i class="fa fa-trash"></i></a></center></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fila">
        <div class="columna columna-1">
            <center>
            <button type="submit" id="btn-submit" class="btn-effie" onclick="document.getElementById('frm-user').submit();">{{ __('Guardar') }}</button>
            <a href="{{ url('admin/users/'.$user->id) }}" class="btn-effie-inv">{{ __('Cancelar') }}</a>
            </center>
        </div>
    </div>
    <div class="space"></div>
    <div class="fila">
        <div class="columna columna-1">
            <p>
                <i class="fa fa-info-circle fa-icon" aria-hidden="true"></i>&nbsp;
                <b>{{ __('Importante') }}</b>
                <ul>
                    <li>{{ __('(*) Campos obligatorios.') }}</li>
                    <li>{{ __('El tamaño máximo del nombre, apellido, correo institucional y profesión/especialidad es cincuenta (50) caracteres.') }}</li>
                    <li>{{ __('Para cancelar la inserción o edición de datos de un alumno presiona el botón "Limpiar".') }}</li>
                    <li>{{ __('Para guardar los cambios realizados se debe presionar el botón "Guardar".') }}</li>
                </ul>
            </p>
        </div>
    </div>
    <div class="space"></div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('js/students/edit.js') }}"></script>
<script src="{{ asset('js/users/edit2.js') }}"></script>
@endsection