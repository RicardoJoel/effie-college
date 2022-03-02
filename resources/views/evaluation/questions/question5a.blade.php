<div id="qst5a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $qst5a->code }}</label>
            <ul>
                <li>Los equipos tendrán la posibilidad de contar con un video para presentar el desarrollo de su caso, el cual deberá subirse en formato 1080px, comprimido en H.264 (mp4), con una duración máxima de cuatro (4) minutos. También puede enviarse por Quicktime, en alta resolución, con la misma duración y comprimido en H.264. <b>Nombrar el archivo como:</b> <i>Marca_nombreusuario(video).mp4</i></li>
                <li>Además, deberás subir una foto del equipo en formato JPEG a 300 dpi. <b>Nombrar el archivo como:</b> <i>Marca_nombreusuario(foto).jpeg</i></li>
                <li>Asegúrate de subir el <b>Formulario y Declaración de Autorización</b> (<a href="documentos/bases-effie-college-peru.pdf" alt="Descargar documento" target="_blank" style="color: #cbb27c;font-style: italic;">descárgalo aquí</a>) que acredita que ni el tutor académico ni los alumnos tienen vínculo alguno con la marca, su competencia y/o alguna de sus agencias. Este formulario debe explicitar que el tutor académico labora en la institución donde se forman los alumnos miembros del equipo.</li>
                <li>Para subir un nuevo archivo deberás seleccionarlo de tu carpeta (presiona el botón “Seleccionar archivo”), darle un nombre y presionar el botón “Agregar”.</li>
            </ul>
            <h3 class="card-subtitle">{{ __('Video cargado') }}</h3>
            @php($video = '')
            @foreach($user->files as $file)
                @if(Illuminate\Support\Facades\File::extension($file->filedata) === 'mp4')
                    @php($video = $file->filedata)
                @endif
            @endforeach
            <center>
            @if($video)
            <video width="600" controls>
                <source src="{{ (in_array(Auth::user()->situation,['ADMINISTRADOR','TUTOR','JURADO']) ? '../' : '').'../../storage/app/'.$video }}" type="video/mp4">
                {{ __('Your browser does not support the video tag.') }}
            </video>
            @else
            <div class="text-inscripcion">
                <p>{{ __('El equipo aún no ha cargado su video.') }}</p>
            </div>
            @endif
            </center>
            <div class="space"></div>
        </div>
    </div>
</div>