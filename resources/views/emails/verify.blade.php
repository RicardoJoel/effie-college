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
                                        <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px"><b>Hola, Equipo {{ $username }}:</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px"><b>¡Bienvenidos al Effie<sup>®</sup> College 2021!</b></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Gracias por formar parte de la nueva edición del concurso que pone a prueba las habilidades de los próximos profesionales del marketing, publicidad y comunicaciones.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Para completar tu inscripción, debes ingresar a la plataforma de Effie<sup>®</sup> College, activar tu cuenta y crear tu contraseña.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">El usuario asociado a tu equipo es {{ $username }} y puedes activar tu cuenta ingresando <a href="{{ url('/activate/'.$code ) }}" style="color:#cbb27c;">aquí</a>.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Te deseamos mucha suerte.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Atentamente,</p>
                        <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px"><b>El equipo de Effie<sup>®</sup> College Perú</b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</body>