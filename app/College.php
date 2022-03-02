<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;

    protected $table = 'colleges';
    
    protected $fillable = [
        'name', 'businessname', 'ruc', 'address', 'phone'
    ];
    
    public function teams()
    {
    	return $this->hasMany(User::class);
    }

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}
