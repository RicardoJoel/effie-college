@extends('layouts.notice')
@section('content')
<h1 class="cuerpo-gracias__title">¡Gracias por tu interés en participar<br>en {{ config('app.name', 'Laravel') }}!</h1>
<p class="cuerpo-gracias__contenido">Para completar tu inscripción, hemos enviado a tu correo los datos necesarios</p>
<p class="cuerpo-gracias__contenido">para activar tu cuenta y crear tu contraseña. <b>¡Estás a solo un paso!</b></p>
@endsection