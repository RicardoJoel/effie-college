<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
</head>
<body style="font-family:'Poppins',sans-serif;font-weight:200;color:#777;line-height:1.3em;">
<main>
    <div style="content:'';width:70%;background-image:url('http://preciso.online/effie-college/public/images/fondo.svg');background-repeat:no-repeat;background-position-x:right;background-position-y:bottom;opacity:0.5;position:absolute;top:0;bottom:0;right:0;z-index:-1"></div>
    <div style="width:100%;min-height:100vh;padding:15px;">
        <header style="display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1199px;margin:0 auto 20px;">
            <center><img src="{{ asset('images/effei2.png') }}" style="width:150px;padding:0 30px;"></center>
        </header>
        <table>
            <tbody>
                <tr>
                    <td style="padding-left:20px;padding-right:20px">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px"><b>Hola, {{ $name }}</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px"><b>Tienes un nuevo equipo agregado.</b></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Como tutor del Equipo {{ $team }}, puedes hacer hasta dos (2) cambios en los integrantes de tu equipo hasta el cierre de inscripciones (martes 13 de abril a las 11:59 p.m.).</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Si necesitaras hacer uso de esta funcionalidad, puedes hacerlo accediendo a tu cuenta desde la plataforma de Effie<sup>??</sup> College con tu <b>correo electr??nico {{ $email }} como usuario</b>.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">En caso a??n no hayas activado tu cuenta y creado tu contrase??a, puedes hacerlo ingresando <a href="{{ url('/activate/'.$code ) }}" style="color:#cbb27c;">aqu??</a>.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Recuerda que esta cuenta tiene ??nicamente esta funci??n. Toda la informaci??n del caso debe ser registrada con el usuario y contrase??a del equipo.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px"><b>??Buena suerte!</b></p>
                        <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px"><b>El equipo de Effie<sup>??</sup> College Per??</b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</body>