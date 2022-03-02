<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    protected const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected const EMAIL_ACT_ACCNT = 'Bienvenido a Effie® College 2021';
    protected const EMAIL_PSW_RESET = '[Effie® College 2021] Notificación de restablecimiento de contraseña';
    protected const LONGITUD_CODIGO = 60;
    protected const LONGITUD_PSSWRD = 8;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'school', 'situation', 'caso_id', 'college_id', 'teacher_id', 'is_completed', 'is_finished'
    ];

    /**
     * Default values for attributes
     * @var array an array with attribute as key and default as value
     */
    protected $attributes = [
        'is_admin' => false, 'is_viewed' => false, 'is_completed' => false, 'is_finished' => false
    ];

    /**
     * Protected attributes that CANNOT be mass assigned.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'is_admin', 'is_viewed', 'username'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'is_admin', 'password', 'confirmation_code', 'remember_token'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
    
    public function caso()
    {
    	return $this->belongsTo(Caso::class);
    }

    public function college()
    {
    	return $this->belongsTo(College::class);
    }
    
    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
    	return $this->belongsToMany(Student::class)
                ->wherePivotNull('deleted_at')
                ->withTimestamps();
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function files()
    {
    	return $this->hasMany(File::class);
    }

    public function reviewsLikeTeam()
    {
    	return $this->hasMany(Review::class);
    }

    public function reviewsLikeJury()
    {
    	return $this->hasMany(Review::class);
    }

    public function reviewsByAuth()
    {
    	return $this->hasMany(Review::class)->where('jury_id',Auth::user()->id);
    }

    /**
     * Boot function for using with User Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        
        self::creating(function(User $user) {
            if ($user->situation === 'TUTOR') {
                $user->username = $user->teacher->teacher_email;
            }
            else {
                $code = User::where('username','like','E'.date('Y').'%')->max(\DB::raw('substr(username,6,3)'));
                $user->username = 'E'.date('Y').str_pad(++$code,3,'0',STR_PAD_LEFT);
            }
            $user->generateConfirmationCode();
            return true;
        });
    }

    /**
     * Generates the value for the User::confirmation_code field. Used to 
     * activate the user's account.
     * @return bool 
     */
    protected function generateConfirmationCode()
    {
        $length = strlen(self::PERMITTED_CHARS);
        $rndStr = '';

        for ($i=0; $i<self::LONGITUD_CODIGO; $i++) {
            $rndChr = self::PERMITTED_CHARS[mt_rand(0, $length - 1)];
            $rndStr .= $rndChr;
        }
        $this->attributes['confirmation_code'] = $rndStr;

        return !is_null($this->attributes['confirmation_code']);
    }

    public function sendEmailVerificationNotification()
    {
        $teacher = self::teacher()->get()->first();
        self::sendEmail($teacher->teacher_email, $teacher->teacher_name, $this->confirmation_code, 'emails.verify', self::EMAIL_ACT_ACCNT);

        $students = self::students()->get();
        foreach ($students as $student)
            self::sendEmail($student->student_email, $student->student_name, $this->confirmation_code, 'emails.verify', self::EMAIL_ACT_ACCNT);
    }

    public function sendPasswordResetNotification($token)
    {
        self::sendEmail($this->email, NULL, $token, 'emails.reset', self::EMAIL_PSW_RESET);
    }

    protected function sendEmail($email, $name, $code, $template, $subject)
    {
        $data = array('name' => $name, 'username' => $this->username, 'code' => $code);

        Mail::send($template, $data, function($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}