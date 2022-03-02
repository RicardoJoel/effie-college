<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\DocumentType;
use App\Question;
use App\Teacher;
use App\Student;
use App\Edition;
use App\Review;
use App\Career;
use App\Cycle;
use App\Caso;
use App\User;
use Carbon\Carbon;
use ZipArchive;
use Redirect;
use Auth;
use DB;
/* Export data */
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    protected const ARRAY_SITUATI = ['PARTICIPANTE','NO VALIDADO','DESCALIFICADO','FINALISTA','GANADOR'/*,'PRUEBA'*/];
    protected const SPAN_INDX_OUT = 'El equipo solicitado no ha sido encontrado.';
    protected const SPAN_SEND_EXT = 'Tu propuesta ha sido enviada a la marca de manera exitosa.';
    protected const SPAN_SEND_ERR = 'Lo sentimos, ocurrió un problema mientras se intentaba enviar tu propuesta.';
    protected const SPAN_ANSW_IMC = 'Estimado participante, asegúrate de haber completado todas las preguntas de cada sección del formulario así como de haber subido todos los archivos solicitados en la sección final.';
    protected const SPAN_USER_CMP = 'No se pudo enviar tu propuesta debido a que esta ya fue enviada a la marca anteriormente.';
    protected const SPAN_PROF_TUT = 'Los datos del tutor no han sido encontrados.';
    protected const SPAN_PROF_EXT = 'Tus datos se actualizaron satisfactoriamente.';
    protected const SPAN_PROF_ERR = 'Lo sentimos, ocurrió un problema mientras se intentaba actualizar tus datos.';
    protected const SPAN_EDIT_PAS = 'No puedes editar la información de equipos de ediciones pasadas.';
    protected const SPAN_PERM_NEG = 'No puedes puedes acceder a la información de equipos que no tengas a cargo.';
    protected const SPAN_USER_INC = 'El equipo solicitado aún no ha enviado su propuesta.';
    protected const SPAN_USER_NOQ = 'El equipo solicitado aún no ha sido calificado.';
    protected const SPAN_REVW_SCS = 'Las notas asignadas al equipo se guardaron de manera exitosa.';
    protected const SPAN_REVW_ERR = 'Lo sentimos, ocurrió un problema mientras se intentaba guardar las notas.';
    protected const SPAN_FBCK_SCS = 'Tu comentario ha sido enviado al equipo de manera exitosa.';
    protected const SPAN_FBCK_ERR = 'Lo sentimos, ocurrió un problema mientras se intentaba enviar tu comentario.';
    protected const SPAN_NOTA_SCS = 'Las notas de los equipos que enviaron su propuesta se cerraron de manera exitosa.';
    protected const SPAN_NOTA_ERR = 'Lo sentimos, ocurrió un problema mientras se intentaba cerrar las notas.';
    protected const SPAN_NOTA_SIN = 'Existen equipos que enviaron su propuesta y aún no han sido calificados.';
    protected const SPAN_AUTH_BLK = 'Usted ya ha cerrado las notas de los equipos cuya marca le fue asignada.';
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
    public function create()
    {
        if (session()->has('errors')) {
            $students = session('students', []);
        }
        else {
            $students = [];
            session(['students' => $students]);
        }
        return view('users.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        if (!Auth::user()->is_admin && Auth::user()->teacher->id !== $user->teacher->id)
            return Redirect::route('home')->with('error', self::SPAN_PERM_NEG);

        if (!$user->is_viewed) {
            $user->is_viewed = true;
            $user->save();
        }
        return view(Auth::user()->is_admin ? 'users.show' : 'teams.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        if (!Auth::user()->is_admin && $user->caso->edition->name !== date('Y'))
            return Redirect::route('users.show', $id)->with('error', self::SPAN_EDIT_PAS);

        if (!$user->is_viewed) {
            $user->is_viewed = true;
            $user->save();
        }

        if (session()->has('errors')) {
            $students = session('students', []);
        }
        else {
            $students = [];
            foreach ($user->students as $student) {
                $students[] = array(
                    'id' => $student->id ?? '',
                    'student_name' => $student->student_name ?? '',
                    'student_lastname' => $student->student_lastname ?? '',
                    'student_email' => $student->student_email ?? '',
                    'student_document_type' => DocumentType::find($student->student_document_type_id)->name,
                    'student_document' => $student->student_document ?? '',
                    'student_mobile' => $student->student_mobile ?? '',
                    'student_career' => Career::find($student->student_career_id)->name,
                    'student_cycle' => Cycle::find($student->student_cycle_id)->name
                );
            }
            session(['students' => $students]);
        }
        return view(Auth::user()->is_admin ? 'users.edit' : 'teams.edit', compact('user','students'));
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
        $user = User::find($id);

        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        if (!Auth::user()->is_admin && $user->caso->edition->name !== date('Y'))
            return Redirect::route('users.show', $id)->with('error', self::SPAN_EDIT_PAS);

        $students = session('students', []);
        $request['student_quantity'] = count($students);

        if (Auth::user()->is_admin) {
            foreach ($students as $student) {
                if (!strcasecmp($request['teacher_email'], $student['student_email']))
                    $request['student_dif_email'] = false;
                if (!strcasecmp($request['teacher_document'], $student['student_document']))
                    $request['student_dif_document'] = false;
            }
        }
        else {
            foreach ($students as $student) {
                if (!strcasecmp(Auth::user()->teacher->teacher_email, $student['student_email']))
                    $request['student_dif_email'] = false;
                if (!strcasecmp(Auth::user()->teacher->teacher_document, $student['student_document']))
                    $request['student_dif_document'] = false;
            }
        }
        if ($curCase = Caso::find($request['caso_id'])) {
            if ($edition = Edition::where('name',$curCase->edition->name-1)->get()->first()) {
                if ($antCase = Caso::where('edition_id',$edition->id)->where('brand_id',$curCase->brand_id)->get()->first()) {
                    if ($teams = User::where('caso_id',$antCase->id)->whereIn('situation',array('FINALISTA','GANADOR'))->get()) {
                        $teachers = [];
                        $competitors = [];
                        foreach ($teams as $team) {
                            foreach ($team->students as $student) {
                                $competitors[] = $student;
                            }
                            $teachers[] = $team->teacher;
                        }
                        foreach ($students as $student) {
                            foreach ($competitors as $competitor) {
                                if (!strcasecmp($student['student_email'], $competitor['student_email']))
                                    $request['student_brand_student'] = false;
                                if (!strcasecmp($student['student_document'], $competitor['student_document']))
                                    $request['student_brand_student'] = false;
                            }
                            foreach ($teachers as $teacher) {
                                if (!strcasecmp($student['student_email'], $teacher['teacher_email']))
                                    $request['student_brand_teacher'] = false;
                                if (!strcasecmp($student['student_document'], $teacher['teacher_document']))
                                    $request['student_brand_teacher'] = false;
                            }
                        }
                        if (Auth::user()->is_admin) {
                            foreach ($competitors as $competitor) {
                                if (!strcasecmp($request['teacher_email'], $competitor['student_email']))
                                    $request['teacher_brand_student'] = false;
                                if (!strcasecmp($request['teacher_document'], $competitor['student_document']))
                                    $request['teacher_brand_student'] = false;
                            }
                            foreach ($teachers as $teacher) {
                                if (!strcasecmp($request['teacher_email'], $teacher['teacher_email']))
                                    $request['teacher_brand_teacher'] = false;
                                if (!strcasecmp($request['teacher_document'], $teacher['teacher_document']))
                                    $request['teacher_brand_teacher'] = false;
                            }
                        }
                    }
                }
            }
        }

        if (Auth::user()->is_admin) {
            $this->validate($request, [
                'college_id' => 'required|int|min:1',
                'school' => 'required|string|max:50',
                'caso_id' => 'required|int|min:1',
                'situation' => 'required|string|in:'.implode(',',self::ARRAY_SITUATI),
                'teacher_name' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
                'teacher_lastname' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
                'teacher_email' => 'required|email:rfc|max:50',
                'teacher_document_type_id' => 'required|int|min:1',
                'teacher_document' => 'required|string|regex:/'.$request->teacher_pattern.'/',
                'teacher_mobile' => 'required|string|regex:/9[0-9]{2} [0-9]{3} [0-9]{3}/',
                'teacher_profession' => 'required|string|max:50',
                'student_quantity' => 'required|int|between:'.self::CANT_ALUM_MIN.','.self::CANT_ALUM_MAX,
                'student_dif_email' => 'nullable|bool|in:true',
                'student_dif_document' => 'nullable|bool|in:true',
                'student_brand_student' => 'nullable|bool|in:true',
                'student_brand_teacher' => 'nullable|bool|in:true',
                'teacher_brand_student' => 'nullable|bool|in:true',
                'teacher_brand_teacher' => 'nullable|bool|in:true'
            ], $this->validationErrorMessages());

            // Búsqueda y actualización de datos del tutor
            $email = $request['teacher_email'];
            $document = $request['teacher_document'];
            $teacher = Teacher::where(function ($query) use ($email, $document) {
                        $query->where('teacher_email',$email)
                            ->orWhere('teacher_document',$document);
                        })->get()->first();
            if ($teacher === null) {
                $teacher = Teacher::create([
                    'teacher_name' => $request['teacher_name'],
                    'teacher_lastname' => $request['teacher_lastname'],
                    'teacher_email' => $request['teacher_email'],
                    'teacher_document_type_id' => $request['teacher_document_type_id'],
                    'teacher_document' => $request['teacher_document'],
                    'teacher_mobile' => $request['teacher_mobile'],
                    'teacher_profession' => $request['teacher_profession'],
                    'teacher_college_id' => $request['college_id']
                ]);
            }
            else {
                $teacher->update([
                    'teacher_name' => $request['teacher_name'],
                    'teacher_lastname' => $request['teacher_lastname'],
                    'teacher_email' => $request['teacher_email'],
                    'teacher_document_type_id' => $request['teacher_document_type_id'],
                    'teacher_document' => $request['teacher_document'],
                    'teacher_mobile' => $request['teacher_mobile'],
                    'teacher_profession' => $request['teacher_profession'],
                    'teacher_college_id' => $request['college_id']
                ]);
            }
            // Actualización del equipo
            $user->update([
                'college_id' => $request['college_id'],
                'school' => $request['school'],
                'caso_id' => $request['caso_id'],
                'situation' => $request['situation'],
                'teacher_id' => $teacher->id
            ]);
        }
        else {
            $this->validate($request, [
                'student_quantity' => 'required|int|between:'.self::CANT_ALUM_MIN.','.self::CANT_ALUM_MAX,
                'student_dif_email' => 'nullable|bool|in:true',
                'student_dif_document' => 'nullable|bool|in:true',
                'student_brand_student' => 'nullable|bool|in:true',
                'student_brand_teacher' => 'nullable|bool|in:true',
                'teacher_brand_student' => 'nullable|bool|in:true',
                'teacher_brand_teacher' => 'nullable|bool|in:true'
            ], $this->validationErrorMessages());
        }

        // Búsqueda y actualización de datos de los alumnos
        $user->students()->detach();
        foreach ($students as $student) {
            $email = $student['student_email'];
            $document = $student['student_document'];
            $alumno = Student::where(function ($query) use ($email, $document) {
                        $query->where('student_email',$email)
                            ->orWhere('student_document',$document);
                        })->get()->first();
            if ($alumno === null) {
                $alumno = Student::create([
                    'student_name' => $student['student_name'],
                    'student_lastname' => $student['student_lastname'],
                    'student_email' => $student['student_email'],
                    'student_document_type_id' => DocumentType::where('name',$student['student_document_type'])->get()->first()->id,
                    'student_document' => $student['student_document'],
                    'student_mobile' => $student['student_mobile'],
                    'student_career_id' => Career::where('name',$student['student_career'])->get()->first()->id,
                    'student_cycle_id' => Cycle::where('name',$student['student_cycle'])->get()->first()->id,
                    'student_college_id' => $user->college_id
                ]);
            }
            else {
                $alumno->update([
                    'student_name' => $student['student_name'],
                    'student_lastname' => $student['student_lastname'],
                    'student_email' => $student['student_email'],
                    'student_document_type_id' => DocumentType::where('name',$student['student_document_type'])->get()->first()->id,
                    'student_document' => $student['student_document'],
                    'student_mobile' => $student['student_mobile'],
                    'student_career_id' => Career::where('name',$student['student_career'])->get()->first()->id,
                    'student_cycle_id' => Cycle::where('name',$student['student_cycle'])->get()->first()->id,
                    'student_college_id' => $user->college_id
                ]);
            }
            $user->students()->attach($alumno);
        }
        session()->forget('students'); 
        return Redirect::route('users.show', $id)->with('success','Equipo actualizado satisfactoriamente.');
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
    
    public function activate($code)
    {
        $users = User::where('confirmation_code',$code);
        $exist = $users->count();
        $user = $users->first();
        if ($exist == 1 and $user->email_verified_at == NULL) {
            $id = $user->id;
            return view('auth.date_complete',compact('id'));
        }
        else {
            return Redirect::to('login');
        }
    }

    public function complete(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->email_verified_at = now();
        $user->save();
        return Redirect::to('login');
    }

    public function getByEdition($id)
    {
        $teams = User::leftJoin('casos','casos.id','users.caso_id')
                    ->where('casos.edition_id',$id)
                    ->whereIn('users.situation',self::ARRAY_SITUATI)
                    ->orderBy('users.username')
                    ->get('users.*');
        $array = [];
        foreach ($teams as $team) {
            $score = 0;
            $reviews = $team->reviewsLikeTeam;

            foreach($reviews as $review)
                $score += ($review->score1 + $review->score2 + $review->score3 + $review->score4)*0.25;

            $array[] = array(
                'id' => $team->id,
                'username' => $team->username,
                'college' => $team->college->name,
                'brand' => $team->caso->brand->name,
                'situation' => $team->situation,
                //'created_at' => Carbon::parse($team->created_at)->format('d/m/Y H:i:s'),
                'is_completed' => $team->is_completed,
                'is_viewed' => $team->is_viewed,
                'score' => $reviews->count() ? $score/$reviews->count() : ''
            );
        }
        return json_encode($array);
    }

    public function getDocumentType($id)
    {
        return DocumentType::find($id);
    }

    public function proposal()
    {
        return view('proposal');
    }

    public function advance($id)
    {
        $user = User::find($id);

        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::back()->with('error', self::SPAN_INDX_OUT);

        return view('advance', compact('user'));
    }

    public function myAdvance()
    {
        $user = Auth::user();
        return view('advance', compact('user'));
    }

    public function sendProposal(Request $request)
    { 
        $user = Auth::user();

        if ($user->is_completed)
            return Redirect::route('proposal')->with('error', self::SPAN_USER_CMP);
    
        $numQst = Question::where('code','like','Q'.$user->caso->edition->name.'%')->count();
        
        if ($user->answers->count() < $numQst - 1 || !$user->files->count())
            return Redirect::route('myAdvance')->with('error', self::SPAN_ANSW_IMC);
        
        if (!$user->update(['is_completed' => true]))
            return Redirect::route('proposal')->with('error', self::SPAN_SEND_ERR);

        return Redirect::route('myAdvance')->with('success', self::SPAN_SEND_EXT);
    }

    public function updateAccount(Request $request)
    {
        $this->validate($request, [
            'teacher_name' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'teacher_lastname' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'teacher_document_type_id' => 'required|int|min:1',
            'teacher_document' => 'required|string|regex:/'.$request->teacher_pattern.'/',
            'teacher_mobile' => 'required|string|regex:/9[0-9]{2} [0-9]{3} [0-9]{3}/',
            'teacher_profession' => 'required|string|max:50'
        ], $this->validationErrorMessages());
        
        $teacher = Auth::user()->teacher;

        if (!$teacher)
            return Redirect::back()->with('error', self::SPAN_PROF_TUT);

        if ($teacher->update($request->all()))
            return Redirect::back()->with('success', self::SPAN_PROF_EXT);
        else
            return Redirect::back()->with('error', self::SPAN_PROF_ERR);
    }

    public function download()
    {   
        $students = Student::select([
            DB::raw('brands.name as MARCA'),
            DB::raw('colleges.name as INSTITUCION'),
            DB::raw('users.school as ESCUELA'),
            DB::raw('users.username as EQUIPO'),
            DB::raw('students.student_lastname as APELLIDOS'),
            DB::raw('students.student_name as NOMBRES'),
            DB::raw('document_types.name as TIPO_DOCUMENTO'),
            DB::raw('students.student_document as DOCUMENTO'),
            DB::raw('students.student_email as EMAIL'),
            DB::raw('students.student_mobile as CELULAR'),
            DB::raw('careers.name as CARRERA'),
            DB::raw('cycles.name as CICLO'),
            DB::raw('"Alumno" as PERFIL'),
            DB::raw('users.created_at as FECHA_INSCRIPCION'),
            DB::raw('users.situation as SITUACION'),
            DB::raw('if(users.is_completed,"Enviada","No enviada") as PROPUESTA'),
        ])
        ->leftJoin('student_user','student_user.student_id','students.id')
        ->leftJoin('users','users.id','student_user.user_id')
        ->leftJoin('casos','casos.id','users.caso_id')
        ->leftJoin('brands','brands.id','casos.brand_id')
        ->leftJoin('colleges','colleges.id','users.college_id')
        ->leftJoin('document_types','document_types.id','students.student_document_type_id')
        ->leftJoin('careers','careers.id','students.student_career_id')
        ->leftJoin('cycles','cycles.id','students.student_cycle_id')
        ->whereIn('users.situation',self::ARRAY_SITUATI)
        ->where('users.username','like','E2021%');

        $teachers = Teacher::select([
            DB::raw('brands.name as MARCA'),
            DB::raw('colleges.name as INSTITUCION'),
            DB::raw('users.school as ESCUELA'),
            DB::raw('users.username as EQUIPO'),
            DB::raw('teachers.teacher_lastname as APELLIDOS'),
            DB::raw('teachers.teacher_name as NOMBRES'),
            DB::raw('document_types.name as TIPO_DOCUMENTO'),
            DB::raw('teachers.teacher_document as DOCUMENTO'),
            DB::raw('teachers.teacher_email as EMAIL'),
            DB::raw('teachers.teacher_mobile as CELULAR'),
            DB::raw('teachers.teacher_profession as CARRERA'),
            DB::raw('"" as CICLO'),
            DB::raw('"Tutor" as PERFIL'),
            DB::raw('users.created_at as FECHA_INSCRIPCION'),
            DB::raw('users.situation as SITUACION'),
            DB::raw('if(users.is_completed,"Enviada","No enviada") as PROPUESTA'),
        ])
        ->leftJoin('users','users.teacher_id','teachers.id')
        ->leftJoin('casos','casos.id','users.caso_id')
        ->leftJoin('brands','brands.id','casos.brand_id')
        ->leftJoin('colleges','colleges.id','users.college_id')
        ->leftJoin('document_types','document_types.id','teachers.teacher_document_type_id')
        ->whereIn('users.situation',self::ARRAY_SITUATI)
        ->where('users.username','like','E2021%')
        ->union($students)->get();

        $teams = User::whereIn('situation',self::ARRAY_SITUATI)
                     ->where('username','like','E2021%')
                     ->get();

        $notas = [];
        foreach ($teams as $team) {
            $score = 0;
            $reviews = $team->reviewsLikeTeam;
            
            foreach($reviews as $rvw)
                $score += ($rvw->score1 + $rvw->score2 + $rvw->score3 + $rvw->score4)*0.25;
            
            $notas[] = [
                'username' => $team->username,
                'score' => $reviews->count() ? number_format($score/$reviews->count(), 2, '.', '') : ''
            ];
        }
        $members = collect($notas);
        $teachers->transform(function ($item) use ($members) {
            $member = $members->where('username',$item['EQUIPO'])->first();
            return collect($item)->merge(['PUNTAJE' => $member['score']]);
        });

        $comentarios = [];
        foreach ($teams as $team) {
            $item = ['username' => $team->username];         
            foreach ($team->reviewsLikeTeam as $rvw)
                if ($rvw->feedback)
                    $item[] = $rvw->feedback;
            $comentarios[] = $item;
        }
        $members = collect($comentarios);
        $teachers->transform(function ($item) use ($members) {
            $member = $members->where('username',$item['EQUIPO'])->first();
            return collect($item)->merge(array_diff_key($member,array_flip(['username'])));
        });

        $export = new InvoicesExport($teachers->sortBy('EQUIPO')->toArray());
        return Excel::download($export, 'Consolidado_equipos_'.Carbon::now()->format('d-m-Y').'.xlsx');
    }

    public function evaluation($id)
    {
        $user = User::find($id);
        
        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);
        
        if (Auth::user()->situation === 'JURADO' && !$user->is_completed)
            return Redirect::route('home')->with('error', self::SPAN_USER_INC);

        return view('evaluation.proposal', compact('user'));
    }

    public function sendScore(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        if (Auth::user()->is_finished) 
            return Redirect::route('home')->with('error', self::SPAN_AUTH_BLK); 

        $this->validate($request, [
            'score1' => 'required|int|between:1,10',
            'score2' => 'required|int|between:1,10',
            'score3' => 'required|int|between:1,10',
            'score4' => 'required|int|between:1,10',
        ], $this->validationErrorMessages());
    
        $review = $user->reviewsByAuth->first();      
        
        if ($review)
            $result = $review->update([
                'score1' => $request->score1,
                'score2' => $request->score2,
                'score3' => $request->score3,
                'score4' => $request->score4
            ]);
        else
            $result = Review::create([
                'score1' => $request->score1,
                'score2' => $request->score2,
                'score3' => $request->score3,
                'score4' => $request->score4,
                'user_id' => $id,
                'jury_id' => Auth::user()->id
            ]);

        if ($result)
            return Redirect::route('viewScore',$id)->with('success', self::SPAN_REVW_SCS);
        else
            return Redirect::back()->with('error', self::SPAN_REVW_ERR);
    }

    public function viewScore($id)
    {
        $user = User::find($id);
        
        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        $review = $user->reviewsByAuth->first();
        
        if (!$review)
            return Redirect::route('home')->with('error', self::SPAN_USER_NOQ);

        return view('score', compact('user','review'));
    }

    public function viewScoreAdmin($user_id, $jury_id)
    {
        $user = User::find($user_id);
        
        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);
            
        $review = $user->reviewsLikeTeam->where('jury_id',$jury_id)->first();
        
        if (!$review)
            return Redirect::route('home')->with('error', self::SPAN_USER_NOQ);

        return view('score', compact('user','review'));
    }

    public function sendFeedback(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        $this->validate($request, [
            'feedback' => 'required|string|max:500'
        ], $this->validationErrorMessages());
    
        $review = $user->reviewsByAuth->first();

        if ($review->update(['feedback' => $request->feedback]))
            return Redirect::route('home',$id)->with('success', self::SPAN_FBCK_SCS);
        else
            return Redirect::back()->with('error', self::SPAN_FBCK_ERR);
    }

    public function blockScore(Request $request)
    {
        if (Auth::user()->is_finished) 
            return Redirect::back()->with('error', self::SPAN_AUTH_BLK); 

        foreach(Auth::user()->caso->teams as $team)
            if ($team->situation === 'PARTICIPANTE' && $team->is_completed && !$team->reviewsByAuth->first())
                return Redirect::back()->with('error', self::SPAN_NOTA_SIN);
        
        if (!Auth::user()->update(['is_finished' => true]))
            return Redirect::back()->with('error', self::SPAN_NOTA_ERR);
        else
            return Redirect::back()->with('success', self::SPAN_NOTA_SCS);
    }

    public function reviews($id)
    {
        $user = User::find($id);
        
        if (!$user || in_array($user->situation,['ADMINISTRADOR','TUTOR','JURADO'])) 
            return Redirect::route('home')->with('error', self::SPAN_INDX_OUT);

        return view('reviews', compact('user'));
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    public static function validationErrorMessages()
    {
        return [
            'college_id.required' => 'Debes seleccionar obligatoriamente una institución educativa.',
            'college_id.int' => 'El ID de la institución educativa seleccionada no tiene un formato válido.',
            'college_id.min' => 'El ID de la institución educativa seleccionada es inválido.',

            'school.required' => 'Debes ingresar obligatoriamente una escuela o facultad.',
            'school.max' => 'La escuela o facultad debe contener como máximo cincuenta (50) caracteres.',
            
            'caso_id.required' => 'Debes seleccionar obligatoriamente una marca.',
            'caso_id.int' => 'El ID de la marca seleccionada no tiene un formato válido.',
            'caso_id.min' => 'El ID de la marca seleccionada es inválido.',
            
            'situation.required' => 'Debes seleccionar obligatoriamente una situación.',
            'situation.in' => 'La situación ingresada no es válida.',

            'teacher_name.required' => 'Debes ingresar obligatoriamente el nombre del tutor.',
            'teacher_name.regex' => 'El nombre del tutor debe incluir únicamente letras y espacios en blanco entre palabras.',
            'teacher_name.max' => 'El nombre del tutor debe contener como máximo cincuenta (50) caracteres.',

            'teacher_lastname.required' => 'Debes ingresar obligatoriamente el apellido del tutor.',
            'teacher_lastname.regex' => 'El apellido del tutor debe incluir únicamente letras y espacios en blanco entre palabras.',
            'teacher_lastname.max' => 'El apellido del tutor debe contener como máximo cincuenta (50) caracteres.',
            
            'teacher_email.required' => 'Debes ingresar obligatoriamente el correo institucional del tutor.',
            'teacher_email.email' => 'El correo institucional del tutor ingresado no tiene un formato válido.',
            'teacher_email.max' => 'El correo institucional del tutor debe contener como máximo cincuenta (50) caracteres.',
            
            'teacher_document_type_id.required' => 'Debes seleccionar obligatoriamente el tipo de documento del tutor.',
            'teacher_document_type_id.int' => 'El ID del tipo de documento del tutor seleccionado no tiene un formato válido.',
            'teacher_document_type_id.min' => 'El ID del tipo de documento del tutor seleccionado es inválido.',

            'teacher_document.required' => 'Debes ingresar obligatoriamente el N° Documento del tutor.',
            'teacher_document.regex' => 'El N° Documento del tutor ingresado no corresponde al tipo de documento seleccionado.',

            'teacher_mobile.required' => 'Debes ingresar obligatoriamente el número celular del tutor.',
            'teacher_mobile.regex' => 'El número celular del tutor debe estar compuesto por un nueve (9) seguido de ocho (8) dígitos.',            

            'teacher_profession.required' => 'Debes ingresar obligatoriamente la profesión del tutor.',
            'teacher_profession.max' => 'La profesión del tutor debe contener como máximo cincuenta (50) caracteres.',
            
            'student_quantity.between' => 'El equipo debe estar conformado por entre tres (3) y cinco (5) alumnos.',
            'student_dif_email.in' => 'No puedes ingresar el mismo correo institucional para un alumno y el tutor del equipo.',
            'student_dif_document.in' => 'No puedes ingresar el mismo N° Documento para un alumno y el tutor del equipo.',
            'student_brand_student.in' => 'Los alumnos ingresados no pueden participar con la misma marca con la cual quedaron como alumno finalista o ganador en la edición pasada.',
            'student_brand_teacher.in' => 'Los alumnos ingresados no pueden participar con la misma marca con la cual quedaron como tutor finalista o ganador en la edición pasada.',
            'teacher_brand_student.in' => 'El tutor ingresado no puede participar con la misma marca con la cual quedó como alumno finalista o ganador en la edición pasada.',
            'teacher_brand_teacher.in' => 'El tutor ingresado no puede participar con la misma marca con la cual quedó como tutor finalista o ganador en la edición pasada.',
        
            'score1.required' => 'Debes ingresar obligatoriamente el puntaje de la Sección 1.',
            'score1.int' => 'El puntaje ingresado para la Sección 1 no tiene un formato válido.',
            'score1.between' => 'El puntaje de la Sección 1 debe estar entre uno (1) y diez (10).',

            'score2.required' => 'Debes ingresar obligatoriamente el puntaje de la Sección 2.',
            'score2.int' => 'El puntaje ingresado para la Sección 2 no tiene un formato válido.',
            'score2.between' => 'El puntaje de la Sección 2 debe estar entre uno (1) y diez (10).',

            'score3.required' => 'Debes ingresar obligatoriamente el puntaje de la Sección 3.',
            'score3.int' => 'El puntaje ingresado para la Sección 3 no tiene un formato válido.',
            'score3.between' => 'El puntaje de la Sección 3 debe estar entre uno (1) y diez (10).',

            'score4.required' => 'Debes ingresar obligatoriamente el puntaje de la Sección 4.',
            'score4.int' => 'El puntaje ingresado para la Sección 4 no tiene un formato válido.',
            'score4.between' => 'El puntaje de la Sección 4 debe estar entre uno (1) y diez (10).',

            'feedback.required' => 'No has ingresado un comentario para el equipo.',
            'feedback.max' => 'El comentario debe contener como máximo quinientos (500) caracteres.',
        ];
    }
}