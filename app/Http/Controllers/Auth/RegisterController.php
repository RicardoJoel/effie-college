<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use App\DocumentType;
use App\Teacher;
use App\Student;
use App\Edition;
use App\Career;
use App\Cycle;
use App\Caso;
use App\User;

class RegisterController extends Controller
{
    protected const MAIL_NEW_ACCT = '[Effie® College 2021] Aviso de activación de cuenta';
    protected const MAIL_NEW_TEAM = '[Effie® College 2021] Nuevo equipo agregado';
    protected const MAIL_CCO_CUST = 'claudia.vega@effie-peru.com';
    protected const CANT_ALUM_MIN = 3;
    protected const CANT_ALUM_MAX = 5;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'confirm';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $students = session('students', []);
        $data['student_quantity'] = count($students);

        foreach ($students as $student) {
            if (!strcasecmp($data['teacher_email'], $student['student_email']))
                $data['student_dif_email'] = false;
            if (!strcasecmp($data['teacher_document'], $student['student_document']))
                $data['student_dif_document'] = false;
        }

        if ($curCase = Caso::find($data['caso_id'])) {
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
                                    $data['student_brand_student'] = false;
                                if (!strcasecmp($student['student_document'], $competitor['student_document']))
                                    $data['student_brand_student'] = false;
                            }
                            foreach ($teachers as $teacher) {
                                if (!strcasecmp($student['student_email'], $teacher['teacher_email']))
                                    $data['student_brand_teacher'] = false;
                                if (!strcasecmp($student['student_document'], $teacher['teacher_document']))
                                    $data['student_brand_teacher'] = false;
                            }
                        }
                        foreach ($competitors as $competitor) {
                            if (!strcasecmp($data['teacher_email'], $competitor['student_email']))
                                $data['teacher_brand_student'] = false;
                            if (!strcasecmp($data['teacher_document'], $competitor['student_document']))
                                $data['teacher_brand_student'] = false;
                        }
                        foreach ($teachers as $teacher) {
                            if (!strcasecmp($data['teacher_email'], $teacher['teacher_email']))
                                $data['teacher_brand_teacher'] = false;
                            if (!strcasecmp($data['teacher_document'], $teacher['teacher_document']))
                                $data['teacher_brand_teacher'] = false;
                        }
                    }
                }
            }
        }

        return Validator::make($data, [
            'caso_id' => 'required|int|min:1',
            'college_id' => 'required|int|min:1',
            'school' => 'required|string|max:50',
            'teacher_name' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'teacher_lastname' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
            'teacher_email' => 'required|email:rfc|max:50',
            'teacher_document_type_id' => 'required|int|min:1',
            'teacher_document' => 'required|string|regex:/'.$data['teacher_pattern'].'/',
            'teacher_mobile' => 'required|string|regex:/9[0-9]{2} [0-9]{3} [0-9]{3}/',
            'teacher_profession' => 'required|string|max:50',
            'student_quantity' => 'required|int|between:'.self::CANT_ALUM_MIN.','.self::CANT_ALUM_MAX,
            'student_dif_email' => 'nullable|bool|in:true',
            'student_dif_document' => 'nullable|bool|in:true',
            'student_brand_student' => 'nullable|bool|in:true',
            'student_brand_teacher' => 'nullable|bool|in:true',
            'teacher_brand_student' => 'nullable|bool|in:true',
            'teacher_brand_teacher' => 'nullable|bool|in:true',
        ], UserController::validationErrorMessages());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Búsqueda y actualización de los datos del tutor
        $email = $data['teacher_email'];
        $document = $data['teacher_document'];
        $teacher = Teacher::where(function ($query) use ($email, $document) {
                    $query->where('teacher_email',$email)
                        ->orWhere('teacher_document',$document);
                    })->get()->first();
        if ($teacher === null) {
            $teacher = Teacher::create([
                'teacher_name' => $data['teacher_name'],
                'teacher_lastname' => $data['teacher_lastname'],
                'teacher_email' => $data['teacher_email'],
                'teacher_document_type_id' => $data['teacher_document_type_id'],
                'teacher_document' => $data['teacher_document'],
                'teacher_mobile' => $data['teacher_mobile'],
                'teacher_profession' => $data['teacher_profession'],
                'teacher_college_id' => $data['college_id']
            ]);
        }
        else {
            $teacher->update([
                'teacher_name' => $data['teacher_name'],
                'teacher_lastname' => $data['teacher_lastname'],
                'teacher_email' => $data['teacher_email'],
                'teacher_document_type_id' => $data['teacher_document_type_id'],
                'teacher_document' => $data['teacher_document'],
                'teacher_mobile' => $data['teacher_mobile'],
                'teacher_profession' => $data['teacher_profession'],
                'teacher_college_id' => $data['college_id']
            ]);
        }
        
        // Creación del equipo
        $user = User::create([
            'college_id' => $data['college_id'],
            'school' => $data['school'],
            'caso_id' => $data['caso_id'],
            'situation' => 'PARTICIPANTE',
            'teacher_id' => $teacher->id
        ]);

        // Búsqueda y actualización de los datos de los alumnos
        $students = session('students', []);
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
                    'student_college_id' => $data['college_id']
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
                    'student_college_id' => $data['college_id']
                ]);
            }
            $user->students()->attach($alumno);
        }
        session()->forget('students');

        /* Creación de la cuenta del tutor */
        $tutor = User::where('username', $teacher->teacher_email)->get()->first();
        if ($tutor === null) {
            $tutor = User::create([
                'situation' => 'TUTOR',
                'teacher_id' => $teacher->id
            ]);
            self::sendEmail($tutor, $user->username, 'emails.teacher', self::MAIL_NEW_ACCT);
        }
        else {
            self::sendEmail($tutor, $user->username, 'emails.newteam', self::MAIL_NEW_TEAM);
        }
        return $user;
    }

    protected function sendEmail($tutor, $team, $template, $subject)
    {
        $email = $tutor->teacher->teacher_email;
        $name = $tutor->teacher->teacher_name;
        $code = $tutor->confirmation_code;
        $data = array('email' => $email, 'name' => $name, 'team' => $team, 'code' => $code);

        Mail::send($template, $data, function($message) use ($email, $subject) {
            $message->to($email)->bcc(self::MAIL_CCO_CUST)->subject($subject);
        });
    }
}