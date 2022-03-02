<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes;

    protected $table = 'document_types';
    
    protected $fillable = [
        'name', 'code', 'length', 'is_number', 'is_exact'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function teachers()
    {
    	return $this->hasMany(Teacher::class);
    }
}
