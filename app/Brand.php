<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = 'brands';
    
    protected $fillable = [
        'name', 'image'
    ];

    public function cases()
    {
    	return $this->hasMany(Caso::class);
    }
}
