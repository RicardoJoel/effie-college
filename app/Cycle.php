<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycle extends Model
{
    use SoftDeletes;

    protected $table = 'cycles';

    protected $fillable = [
        'name', 'code'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}