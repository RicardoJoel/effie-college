<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use SoftDeletes;

    protected $table = 'careers';

    protected $fillable = [
        'name'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}
