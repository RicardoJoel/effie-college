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
                                        <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px"><b>Estimado participante:</b></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta en Effie<sup>®</sup> College.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">De no haberlo solicitado, omite el mensaje; de lo contrario, ingresa <a href="{{ url('/password/reset/'.$code ) }}" style="color:#cbb27c;">aquí</a>.</p>
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Este enlace de restablecimiento caducará en sesenta (60) minutos.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Atentamente,</p>
                        <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px"><b>El equipo de Effie<sup>®</sup> College Perú</b></p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                        <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Si estás teniendo problemas para hacer clic en el enlace, copia y pega la siguiente dirección en tu buscador web: <a href="{{ url('/password/reset/'.$code) }}">{{ url('/password/reset/'.$code) }}</a></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</body>