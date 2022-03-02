@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Bienvenido, ') }} {{ Auth::user()->teacher->teacher_name }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('En esta interfaz podrás actualizar tus datos personales y contraseña actual.') }}</p>
    </div>
</div>
<div class="ficha">
	<div class="fila">
		<div class="columna columna-1">
			<a href="{{ route('home') }}" class="btn-effie-inv" style="float:right"><i class="fa fa-reply"></i>&nbsp;</i>{{ __('Regresar') }}</a>
		</div>
	</div>
	<h3 class="card-title">{{ __('Mis datos') }}</h3>
	<form method="POST" action="{{ route('updateAccount') }}" role="form">
		@csrf
		<div class="fila">
			<div class="columna columna-3">
				<label>{{ __('Nombres*') }}</label>
				<input type="text" name="teacher_name" maxlength="50" value="{{ old('teacher_name', Auth::user()->teacher->teacher_name) }}" onkeypress="return checkName(event)" required>
			</div>
			<div class="columna columna-3">
				<label>{{ __('Apellidos*') }}</label>
				<input type="text" name="teacher_lastname" maxlength="50" value="{{ old('teacher_lastname', Auth::user()->teacher->teacher_lastname) }}" onkeypress="return checkName(event)" required>
			</div>
			<div class="columna columna-3">
				<label>{{ __('Correo institucional*') }}</label>
				<input type="email" name="teacher_email" maxlength="50" value="{{ old('teacher_email', Auth::user()->teacher->teacher_email) }}" onkeypress="return checkEmail(event)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" disabled>
			</div>
		</div>
		<div class="fila">
			<div class="columna columna-3">
				<label>{{ __('Tipo de documento*') }}</label>
				@inject('documentTypes','App\Services\DocumentTypes')
				<select name="teacher_document_type_id" id="teacher_document_type_id" required>
					<option selected disabled hidden value="">{{ __(' -- Elige una opción -- ') }}</option>
					@foreach ($documentTypes->get() as $index => $documentType)
					<option value="{{ $index }}" {{ old('teacher_document_type_id', Auth::user()->teacher->teacher_document_type_id) == $index ? 'selected' : '' }}>
						{{ $documentType }}
					</option>
					@endforeach
				</select>
			</div>
			<div class="columna columna-6">
				<label>{{ __('N° Documento*') }}</label>
				<input type="hidden" name="teacher_pattern" id="teacher_pattern" value="{{ old('teacher_pattern') }}">
				<input type="text" name="teacher_document" id="teacher_document" value="{{ old('teacher_document', Auth::user()->teacher->teacher_document) }}" maxlength="15" onkeyup="return mayusculas(this)" required>
			</div>
			<div class="columna columna-6">
				<label>{{ __('Número celular*') }}</label>
				<input type="tel" name="teacher_mobile" id="teacher_mobile" maxlength="11" value="{{ old('teacher_mobile', Auth::user()->teacher->teacher_mobile) }}" onkeypress="return checkNumber(event)" required>
			</div>
			<div class="columna columna-3">
				<label>{{ __('Profesión / Especialidad*') }}</label>
				<input type="text" name="teacher_profession" maxlength="50" value="{{ old('teacher_profession', Auth::user()->teacher->teacher_profession) }}" onkeypress="return checkText(event)" required>
			</div>
		</div>
		<center>
		<button type="submit" class="btn-effie">{{ __('Actualizar') }}</button>
		</center>
	</form>
	<div class="space"></div>
	<h3 class="card-title">{{ __('Cambiar mi contraseña') }}</h3>
	<form method="POST" action="{{ route('changePassword') }}" role="form">
		@csrf
		<input type="hidden" name="email" value="{{ Auth::user()->username }}">
		<div class="fila">
			<div class="columna columna-3">
				<label>{{ __('Contraseña actual*') }}</label>
				<input type="password" name="current_password" maxlength="50" required>
			</div>
			<div class="columna columna-3">
				<label>{{ __('Nueva contraseña*') }}</label>
				<input type="password" name="new_password" maxlength="50" required>
			</div>
			<div class="columna columna-3">
				<label>{{ __('Confirmar contraseña*') }}</label>
				<input type="password" name="new_confirm_password" maxlength="50" required>
			</div>
		</div>
		<center>
		<button type="submit" class="btn-effie">{{ __('Actualizar') }}</button>
		</center>
	</form>
	<div class="space"></div>
	<p>
		<i class="fa fa-info-circle fa-icon" aria-hidden="true"></i>&nbsp;
		<b>{{ __('Importante') }}</b>
		<ul>
			<li>{{ __('(*) Campos obligatorios.') }}</li>
			<li>{{ __('El tamaño máximo del nombre, apellido, correo institucional y profesión/especialidad es cincuenta (50) caracteres.') }}</li>
			<li>{{ __('La nueva contraseña debe estar compuesta por entre ocho (8) y cincuenta (50) caracteres con, al menos, una letra y un dígito.') }}</li>
			<li>{{ __('La nueva contraseña debe ser diferente a tu correo electrónico.') }}</li>
		</ul>
	</p>
</div>
@endsection

@section('script')
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('js/tutor/profile.js') }}"></script>
@endsection