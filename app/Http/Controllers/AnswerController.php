<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Answer;

class AnswerController extends Controller
{
    protected const SPAN_USER_DIF = 'No se puede editar las respuestas de un equipo al cual no perteneces.';
    protected const SPAN_USER_CMP = 'No se puede guardar/actualizar respuestas luego que la propuesta para la marca haya sido enviada.';
    protected const SPAN_ANSW_CRT = 'Lo sentimos, ocurrió un problema mientras se intentaba guardar tu respuesta.';
    protected const SPAN_ANSW_UPD = 'Lo sentimos, ocurrió un problema mientras se intentaba actualizar tu respuesta.';
    protected const SPAN_HIST_DIF = 'No se puede revisar el historial de cambios de un equipo al cual no perteneces.';
    protected const SPAN_INDX_OUT = 'La respuesta solicitada no ha sido encontrada.';

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
    public function create()
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
            'question_id' => 'required|int|min:1',
            'detail' => 'required|string',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::create([
            'question_id' => $request->question_id,
            'detail' => $request->detail,
            'user_id' => Auth::user()->id
        ]);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['answ_crt' => self::SPAN_ANSW_CRT]], 400);

        return $answer;
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
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'detail' => 'required|string',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_USER_DIF]], 400);
        
        $result = $answer->update([
            'question_id' => $request->question_id,
            'detail' => $request->detail,
            'user_id' => Auth::user()->id
        ]);

        if (!$result)
            return response()->json(['success' => 'false', 'errors' => ['answ_upd' => self::SPAN_ANSW_UPD]], 400);

        return $answer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function storeTitle(Request $request)
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'title' => 'required|string|max:100',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);
        
        $answer = Answer::create([
            'question_id' => $request->question_id,
            'detail' => $request->title,
            'user_id' => Auth::user()->id
        ]);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['answ_crt' => self::SPAN_ANSW_CRT]], 400);

        return $answer;
    }

    public function updateTitle(Request $request, $id)
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'title' => 'required|string|max:100',
        ], $this->validationErrorMessages());
        
        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_USER_DIF]], 400);
        
        $result = $answer->update([
            'question_id' => $request->question_id,
            'detail' => $request->title,
            'user_id' => Auth::user()->id
        ]);

        if (!$result)
            return response()->json(['success' => 'false', 'errors' => ['answ_upd' => self::SPAN_ANSW_UPD]], 400);

        return $answer;
    }
    
    public function history($id)
    {
        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);
   
        if (!Auth::user()->is_admin && Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_HIST_DIF]], 400);
        
        $changes = [];
        foreach ($answer->historyChanges() as $change) {
            $changes[] = [
                //'before' => json_decode($change['before_changes'])->detail,
                'after' => json_decode($change['after_changes'])->detail,
                'type' => $change['change_type'] === 'created' ? 'Creación' : 'Actualización',
                'time' => Carbon::parse($change['created_at'])->isoFormat('dddd D MMMM YYYY, HH:mm'),
                //'autor' => User::find($change['changer_id'])->username
            ];
        }
        return $changes;
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    public static function validationErrorMessages()
    {
        return [
            'question_id.required' => 'Debes ingresar obligatoriamente el ID de la pregunta.',
            'question_id.int' => 'El ID de la pregunta ingresada no tiene un formato válido.',
            'question_id.min' => 'El ID de la pregunta ingresada es inválido.',

            'detail.required' => 'Debes ingresar obligatoriamente el detalle de tu respuesta.',
            
            'title.required' => 'Debes ingresar obligatoriamente un título para tu propuesta.',
            'title.max' => 'El título de tu propuesta debe contener como máximo cien (100) caracteres.',
        ];
    }
}
