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
            <label>{{ $qst5a->remark }}</label>
            @if(!$user->is_completed)
            <form method="POST" action="{{ route('files.store') }}" role="form" id="frm-file" class="dato">
                @csrf
                <div class="files">
                    <div class="columna columna-2">
                        <input type="file" name="filedata" id="filedata" required>
                    </div>
                    <div class="columna columna-3">
                        <input type="text" name="filename" id="filename" maxlength="100" placeholder="Nombre del archivo" required>
                    </div>
                    <div class="columna columna-4">
                        <center><button type="submit" class="btn-effie">{{ __('Agregar') }}</button></center>
                    </div>
                </div>
                <div class="span-done" id="ans5a-done-div"><span id="ans5a-done-msg"></span></div>
                <div class="span-fail" id="ans5a-fail-div"><span id="ans5a-fail-msg"></span></div>
            </form>
            @endif
            <h3 class="card-subtitle">{{ __('Archivos cargados') }}</h3>
            <table id="tbl-files" class="tablealumno">
                <thead>
                    <th width="40%">{{ __('Archivo') }}</th>
                    <th width="40%">{{ __('Nombre (alias)') }}</th>
                    <th width="10%">{{ __('Fecha y hora de carga') }}</th>
                    @if (!$user->is_completed)
                    <th width="10%">{{ __('Eliminar') }}</th>
                    @endif
                </thead>
                <tbody>
                    @foreach ($user->files as $file)
                    <tr>
                        <td><i class="fa fa-file-o"></i>&nbsp;{{ $file->filedata }}</td>
                        <td>{{ $file->filename }}</td>
                        <td><center>{{ Carbon\Carbon::parse($file->created_at)->format('d/m/Y H:i') }}</center></td>
                        @if (!$user->is_completed)
                        <td><center><a onclick="removeFile({{ $file->id }})"><i class="fa fa-trash"></i></a></center></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($user->is_completed)
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
                <source src="{{ '../storage/app/'.$video }}" type="video/mp4">
                {{ __('Your browser does not support the video tag.') }}
            </video>
            @else
            <div class="text-inscripcion">
                <p>{{ __('El equipo no ha enviado video.') }}</p>
            </div>
            @endif
            </center>
            <div class="space"></div>
            @else
            <form method="POST" action="{{ route('sendProposal') }}" role="form" id="frm-send">
                @csrf
                <center><button type="submit" onclick="return confirm('Estás a punto de enviar tu propuesta para la marca elegida por tu equipo. Pasado este punto, no podrás editar tus respuestas. ¿Deseas continuar?')" class="btn-effie">{{ __('Enviar') }}</button></center>
            </form>
            @endif
            <div class="space"></div>
        </div>
    </div>
</div>