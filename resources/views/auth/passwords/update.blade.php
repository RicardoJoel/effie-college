@extends('layouts.app')
@section('content')
<div class="card-introduccion">
    <div class="card-introduccion__container">
        <h1 class="card-title">{{ __('Bienvenido, ') }} {{ Auth::user()->school }}</h1>
        <p class="cuerpo-gracias__contenido">{{ __('Por seguridad de la información recibida por parte de los equipos participantes, te recomendamos actualizar tu contraseña.') }}</p>
    </div>
</div>
<div class="ficha">
    <h3 class="card-title">{{ __('Actualización de contraseña') }}</h3>
	<div class="formulario-inscripcion">
		<form method="POST" action="{{ route('updatePassword') }}" role="form">
			@csrf
			<input type="hidden" name="email" value="{{ Auth::user()->username }}">

			<div class="fila">
				<div class="columna columna-3">
					<label>{{ __('Contraseña actual*') }}</label>
					<input type="password" name="current_password" id="current_password" maxlength="50" required>
				</div>
				<div class="columna columna-3">
					<label>{{ __('Nueva contraseña*') }}</label>
					<input type="password" name="new_password" id="new_password" maxlength="50" required>
				</div>
				<div class="columna columna-3">
					<label>{{ __('Confirmar contraseña*') }}</label>
					<input type="password" name="new_confirm_password" id="new_confirm_password" maxlength="50" required>
				</div>
			</div>
			<div class="fila">
				<div class="columna columna-1">
					<div class="space"></div>
				</div>
			</div>	
			<div class="fila">
				<div class="columna columna-1">
					<p>
						<i class="fa fa-info-circle fa-icon" aria-hidden="true"></i>&nbsp;
						<b>{{ __('Importante') }}</b>
						<ul>
							<li>{{ __('(*) Campos obligatorios.') }}</li>
							<li>{{ __('La nueva contraseña debe tener entre ocho (8) y cincuenta (50) caracteres.') }}</li>
							<li>{{ __('La nueva contraseña debe ser diferente a su correo electrónico.') }}</li>
						</ul>
					</p>
				</div>
			</div>
			<div class="fila">
				<div class="space"></div>
				<div class="columna columna-1">
					<center>
					<button type="submit" class="btn-effie"><i class="fa fa-save"></i>&nbsp;{{ __('Guardar') }}</button>
					<a href="{{ route('home') }}" class="btn-effie-inv"><i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a>	
					</center>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection