@extends('layouts.notice')
@section('content')
<h1 class="cuerpo-gracias__title">¡Gracias por inscribirte<br>en {{ config('app.name', 'Laravel') }}!</h1>
<p class="cuerpo-gracias__contenido">El formulario de participación estará habilitado desde<br>
									 el jueves 15 de abril para Mibanco y Tottus, y desde el viernes 16 de abril para Entel.</p>
<p class="cuerpo-gracias__contenido"><b>Mientras tanto, recuerda estas próximas fechas importantes:</b></p>
<p class="cuerpo-gracias__contenido">Presentación del brief del cliente:</p>
<ul class="cuerpo-gracias__lista">
	<li><b>miércoles 14 de abril para Mibanco y Tottus</b></li>
	<li><b>jueves 15 de abril para Entel.</b></li>
</ul>
<p class="cuerpo-gracias__contenido">Fecha de cierre de formulario de participación:</p>
<ul class="cuerpo-gracias__lista">
	<li><b>jueves 13 de mayo para Mibanco y Tottus</b></li>
	<li><b>viernes 14 de mayo para Entel.</b></li>
</ul>
@endsection