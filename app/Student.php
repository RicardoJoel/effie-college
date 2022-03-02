<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'students';
    
    protected $fillable = [
        'student_name', 'student_lastname', 'student_email', 'student_document_type_id', 
        'student_document', 'student_mobile', 'student_college_id', 'student_career_id', 'student_cycle_id'
    ];

    public function documentType()
    {
    	return $this->belongsTo(DocumentType::class, 'student_document_type_id');
    }

    public function college()
    {
    	return $this->belongsTo(College::class, 'student_college_id');
    }

    public function career()
    {
    	return $this->belongsTo(Career::class, 'student_career_id');
    }

    public function cycle()
    {
    	return $this->belongsTo(Cycle::class, 'student_cycle_id');
    }

    public function teams()
    {
    	return $this->belongsToMany(User::class);
    }
}
