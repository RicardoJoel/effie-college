<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $table = 'teachers';
    
    protected $fillable = [
        'teacher_name', 'teacher_lastname', 'teacher_email', 'teacher_document_type_id', 
        'teacher_document', 'teacher_mobile', 'teacher_profession', 'teacher_college_id'
    ];

    public function documentType()
    {
    	return $this->belongsTo(DocumentType::class, 'teacher_document_type_id');
    }

    public function college()
    {
    	return $this->belongsTo(College::class, 'teacher_college_id');
    }

    public function teams()
    {
    	return $this->hasMany(User::class)->where('situation', '!=', 'TUTOR');
    }
}
