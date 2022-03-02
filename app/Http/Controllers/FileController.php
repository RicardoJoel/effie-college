<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as EXT;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\File;
use Auth;

class FileController extends Controller
{
    protected const SPAN_FILE_NOT = 'No se pudo encontrar el archivo seleccionado en su dispositivo.';
    protected const SPAN_FILE_NUM = 'Solo puedes adjuntar hasta tres (3) archivos por equipo.';
    protected const SPAN_FILE_CRT = 'Lo sentimos, ocurrió un problema mientras se intentaba agregar el archivo.';
    protected const SPAN_FILE_DLT = 'Lo sentimos, ocurrió un problema mientras se intentaba eliminar el archivo.';
    protected const SPAN_USER_DIF = 'No se puede eliminar los archivos de un equipo al cual no perteneces.';
    protected const SPAN_USER_CMP = 'No se puede agregar/eliminar archivos luego de haber enviado la propuesta para la marca.';
    protected const SPAN_FILE_DPI = 'La imagen que desea adjuntar no tiene el formato solicitado (jpg, jpeg o png) o no tiene resolución de 300 dpi.';
    protected const SPAN_FILE_PDF = 'El tamaño del archivo en formato PDF debe ser menor a 500KB.';
    protected const SPAN_INDX_OUT = 'El archivo solicitado no ha sido encontrado.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required|string|max:100',
            'filedata' => 'required|file|mimes:jpg,jpeg,png,ai,pdf,mp4,avi,mov'
        ], $this->validationErrorMessages());
        
        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        if (count(Auth::user()->files) >= 3)
            return response()->json(['success' => 'false', 'errors' => ['file_max' => self::SPAN_FILE_NUM]], 400);

        if (!$request->hasFile('filedata'))
            return response()->json(['success' => 'false', 'errors' => ['file_not' => self::SPAN_FILE_NOT]], 400);
        
        if (EXT::extension($_FILES['filedata']['name']) === 'pdf' && filesize($_FILES['filedata']['tmp_name'])/1000 > 500)
            return response()->json(['success' => 'false', 'errors' => ['file_pdf' => self::SPAN_FILE_PDF]], 400);

        /*if (in_array(EXT::extension($_FILES['filedata']['name']), ['jpg','png','jpeg']) && self::dpi($_FILES['filedata']['tmp_name']) !== 300)
            return response()->json(['success' => 'false', 'errors' => ['file_dpi' => self::SPAN_FILE_DPI]], 400);*/
        
        $filedata = Auth::user()->username.'-'.uniqid().'.'.EXT::extension($_FILES['filedata']['name']);
        $filectnt = file_get_contents($_FILES['filedata']['tmp_name']);
        Storage::put($filedata, $filectnt);
        
        $file = File::create([
            'filename' => $request->filename,
            'filedata' => $filedata,
            'user_id' => Auth::user()->id
        ]);

        if (!$file)
            return response()->json(['success' => 'false', 'errors' => ['file_crt' => self::SPAN_FILE_CRT]], 400);
        
        $files = [];
        foreach(Auth::user()->refresh()->files as $file) {
            $files[] = array(
                'id' => $file->id,
                'filename' => $file->filename,
                'filedata' => $file->filedata,
                'datetime' => Carbon::parse($file->created_at)->format('d/m/Y H:i')
            );
        }
        return json_encode($files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);
        
        $file = File::find($id);

        if (!$file)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (Auth::user()->id !== $file->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_USER_DIF]], 400);

        if (!$file->delete())
            return response()->json(['success' => 'false', 'errors' => ['file_dlt' => self::SPAN_FILE_DLT]], 400);

        $files = [];
        foreach(Auth::user()->refresh()->files as $file) {
            $files[] = array(
                'id' => $file->id,
                'filename' => $file->filename,
                'filedata' => $file->filedata,
                'datetime' => Carbon::parse($file->created_at)->format('d/m/Y H:i')
            );
        }
        return json_encode($files);
    }

    protected function dpi($imagen)
    {
        $archivo = fopen($imagen,'r');
        $cadena = fread($archivo, 50);
        fclose($archivo);
        $datos = bin2hex(substr($cadena,14,4));
        $dpi = substr($datos, 0, 4);
        return hexdec($dpi);
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'filename.required' => 'Debes ingresar obligatoriamente el nombre del archivo.',
            'filename.max' => 'El nombre del archivo debe contener como máximo cien (100) caracteres.',
            
            'filedata.required' => 'Debes seleccionar obligatoriamente un archivo.',
            'filedata.file' => 'El archivo seleccionado no tiene un formato válido.',
            'filedata.mimes' => 'Solo se permite cargar archivos con extensión jpg, jpeg, png, ai, pdf, mp4, avi o mov.',
        ];
    }
}