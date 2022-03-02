@extends('layouts.notice')
@section('content')
<h1 class="cuerpo-gracias__title">¡Gracias por participar<br>en {{ config('app.name', 'Laravel') }}!</h1>
<p class="cuerpo-gracias__contenido">El formulario de participación estuvo habilitado<br>
									 hasta las 8:00 a.m. del jueves 20 de mayo.</p>
<p class="cuerpo-gracias__contenido"><b>Si lograste enviar tu propuesta, recuerda estas próximas fechas importantes:</b></p>
<ul class="cuerpo-gracias__lista">
	<li><b>Jurado de selección: </b>jueves 27 de mayo</li>
	<li><b>Jurado de finalistas: </b>martes 8 de junio</li>
	<li><b>Ceremonia de premiación: </b>miércoles 16 de junio</li>
</ul>
@endsection