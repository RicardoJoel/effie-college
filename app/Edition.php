<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use SoftDeletes;

    protected $table = 'editions';

    protected $fillable = [
        'name'
    ];

    public function cases()
    {
    	return $this->hasMany(Caso::class);
    }

    public function sections()
    {
    	return $this->hasMany(Section::class);
    }
}
