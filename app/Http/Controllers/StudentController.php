<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentType;
use App\Edition;
use App\Student;
use App\Career;
use App\Cycle;

class StudentController extends Controller
{
    protected const SPAN_MIEM_NUM = 'El equipo debe estar conformado por entre tres (3) y cinco (5) alumnos.';
    protected const SPAN_DUPL_EQP = 'El input value ya se encuentra registrado para un alumno miembro del equipo.';
    protected const SPAN_DUPL_EDC = 'El input value ya se encuentra registrado para un alumno participante en esta edición.';    
    protected const SPAN_DUPL_TUT = 'El input value ya se encuentra registrado para un tutor participante en esta edición.';    
    protected const SPAN_INDX_OUT = 'El índice ingresado es inválido.';
    protected const CANT_ALUM_MIN = 3;
    protected const CANT_ALUM_MAX = 5;

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
            'student_name' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'student_lastname' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'student_email' => 'required|email:rfc|max:50',
            'student_document_type_id' => 'required|int|min:1',
            'student_document' => 'required|string|regex:/'.$request->student_pattern.'/',
            'student_mobile' => 'required|string|regex:/9[0-9]{2} [0-9]{3} [0-9]{3}/',
            'student_career_id' => 'required|int|min:1',
            'student_cycle_id' => 'required|int|min:1'
        ], $this->validationErrorMessages());

        $students = session('students', []);
        
        if (count($students) >= self::CANT_ALUM_MAX)
            return response()->json(['success' => 'false', 'errors' => ['index_out' => self::SPAN_MIEM_NUM]], 400);

        foreach ($students as $student) {
            if (!strcasecmp($request->student_email, $student['student_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_team' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_EQP))]], 400);
            if (!strcasecmp($request->student_document, $student['student_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_team' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_EQP))]], 400);
        }

        $edition = Edition::where('name',date('Y'))->get()->first();
        $teachers = [];
        $competitors = [];

        foreach ($edition->cases as $case) {
            foreach ($case->teams as $team) {
                foreach ($team->students as $student) {
                    $competitors[] = $student;
                }
                $teachers[] = $team->teacher;
            }
        }

        foreach ($competitors as $competitor) {
            if (!strcasecmp($request->student_email, $competitor['student_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_student' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_EDC))]], 400);
            if (!strcasecmp($request->student_document, $competitor['student_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_student' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_EDC))]], 400);
        }

        foreach ($teachers as $teacher) {
            if (!strcasecmp($request->student_email, $teacher['teacher_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_tutor' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_TUT))]], 400);
            if (!strcasecmp($request->student_document, $teacher['teacher_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_tutor' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_TUT))]], 400);
        }

        $students[] = array(
            'id' => '',
            'student_name' => $request->student_name ?? '',
            'student_lastname' => $request->student_lastname ?? '',
            'student_email' => $request->student_email ?? '',
            'student_document_type' => DocumentType::find($request->student_document_type_id)->name,
            'student_document' => $request->student_document ?? '',
            'student_mobile' => $request->student_mobile ?? '',
            'student_career' => Career::find($request->student_career_id)->name,
            'student_cycle' => Cycle::find($request->student_cycle_id)->name
        );
        session(['students' => $students]);
        return json_encode($students);
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
        $students = session('students', []);

        if ($id < 0 || count($students) <= $id)
            return response()->json(['success' => 'false', 'errors' => self::SPAN_INDX_OUT], 400);
        
        $item = $students[$id];
        $student = array(
            'id' => $item['id'],
            'student_name' => $item['student_name'],
            'student_lastname' => $item['student_lastname'],
            'student_email' => $item['student_email'],
            'student_document_type_id' => DocumentType::where('name',$item['student_document_type'])->get()->first()->id,
            'student_document' => $item['student_document'],
            'student_mobile' => $item['student_mobile'],
            'student_career_id' => Career::where('name',$item['student_career'])->get()->first()->id,
            'student_cycle_id' => Cycle::where('name',$item['student_cycle'])->get()->first()->id
        );
        return json_encode($student);
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
            'student_name' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'student_lastname' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'student_email' => 'required|email:rfc|max:50',
            'student_document_type_id' => 'required|int|min:1',
            'student_document' => 'required|string|regex:/'.$request->student_pattern.'/',
            'student_mobile' => 'required|string|regex:/9[0-9]{2} [0-9]{3} [0-9]{3}/',
            'student_career_id' => 'required|int|min:1',
            'student_cycle_id' => 'required|int|min:1'
        ], $this->validationErrorMessages());

        $students = session('students', []);
        
        if ($id < 0 || count($students) <= $id)
            return response()->json(['success' => 'false', 'errors' => ['index_out' => self::SPAN_INDX_OUT]], 400);

        foreach ($students as $index => $student) {
            if ($index != $id && !strcasecmp($request->student_email, $student['student_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_team' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_EQP))]], 400);
            if ($index != $id && !strcasecmp($request->student_document, $student['student_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_team' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_EQP))]], 400);
        }

        $edition = Edition::where('name',date('Y'))->get()->first();
        $teachers = [];
        $competitors = [];

        foreach ($edition->cases as $case) {
            foreach ($case->teams as $team) {
                foreach ($team->students as $student) {
                    $competitors[] = $student;
                }
                $teachers[] = $team->teacher;
            }
        }

        foreach ($competitors as $competitor) {
            if ($request->id != $competitor->id && !strcasecmp($request->student_email, $competitor['student_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_student' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_EDC))]], 400);
            if ($request->id != $competitor->id && !strcasecmp($request->student_document, $competitor['student_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_student' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_EDC))]], 400);
        }

        foreach ($teachers as $teacher) {
            if (!strcasecmp($request->student_email, $teacher['teacher_email']))
                return response()->json(['success' => 'false', 'errors' => ['dup_tutor' => str_replace('input', 'correo', str_replace('value', $request->student_email, self::SPAN_DUPL_TUT))]], 400);
            if (!strcasecmp($request->student_document, $teacher['teacher_document']))
                return response()->json(['success' => 'false', 'errors' => ['dup_tutor' => str_replace('input', 'N° Documento', str_replace('value', $request->student_document, self::SPAN_DUPL_TUT))]], 400);
        }

        $students[$id] = array(
            'id' => $request->id ?? '',
            'student_name' => $request->student_name ?? '',
            'student_lastname' => $request->student_lastname ?? '',
            'student_email' => $request->student_email ?? '',
            'student_document_type' => DocumentType::find($request->student_document_type_id)->name,
            'student_document' => $request->student_document ?? '',
            'student_mobile' => $request->student_mobile ?? '',
            'student_career' => Career::find($request->student_career_id)->name,
            'student_cycle' => Cycle::find($request->student_cycle_id)->name
        );
        session(['students' => $students]);
        return json_encode($students);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = session('students', []);

        if ($id < 0 || count($students) <= $id)
            return response()->json(['success' => 'false', 'errors' => self::SPAN_INDX_OUT], 400);
        
        unset($students[$id]);
        $students = array_values($students);
        session(['students' => $students]);
        return json_encode($students);
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'student_name.required' => 'Debes ingresar obligatoriamente el nombre del alumno.',
            'student_name.max' => 'El nombre del alumno debe contener como máximo cincuenta (50) caracteres.',
            'student_name.regex' => 'El nombre del alumno ingresado no tiene un formato válido.',
            
            'student_lastname.required' => 'Debes ingresar obligatoriamente el apellido del alumno.',
            'student_lastname.max' => 'El apellido del alumno debe contener como máximo cincuenta (50) caracteres.',
            'student_lastname.regex' => 'El apellido del alumno ingresado no tiene un formato válido.',
            
            'student_email.required' => 'Debes ingresar obligatoriamente el correo institucional del alumno.',
            'student_email.email' => 'El correo institucional del alumno ingresado no tiene un formato válido.',
            'student_email.max' => 'El correo institucional del alumno debe contener como máximo cincuenta (50) caracteres.',

            'student_document_type_id.required' => 'Debes seleccionar obligatoriamente el tipo de documento del alumno.',
            'student_document_type_id.int' => 'El ID del tipo de documento del alumno ingresado no tiene un formato válido.',
            'student_document_type_id.min' => 'El ID del tipo de documento del alumno ingresado es inválido.',

            'student_document.required' => 'Debes ingresar obligatoriamente un N° Documento del alumno.',
            'student_document.regex' => 'El N° Documento del alumno ingresado no corresponde al tipo de documento seleccionado.',

            'student_mobile.required' => 'Debes ingresar obligatoriamente el número celular del alumno.',
            'student_mobile.regex' => 'El número celular del alumno debe estar compuesto por un nueve (9) seguido de ocho (8) dígitos.', 

            'student_career_id.required' => 'Debes seleccionar obligatoriamente el tipo de carrera del alumno.',
            'student_career_id.int' => 'El ID del tipo de carrera del alumno ingresado no tiene un formato válido.',
            'student_career_id.min' => 'El ID del tipo de carrera del alumno ingresado es inválido.',

            'student_cycle_id.required' => 'Debes seleccionar obligatoriamente el ciclo del alumno.',
            'student_cycle_id.int' => 'El ID del ciclo del alumno ingresado no tiene un formato válido.',
            'student_cycle_id.min' => 'El ID del ciclo del alumno ingresado es inválido.',
        ];
    }
}