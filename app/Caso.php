<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caso extends Model
{
    use SoftDeletes;

    protected $table = 'casos';
    
    protected $fillable = [
        'edition_id', 'brand_id', 'description', 'brief', 'audio', 'visual', 'whole'
    ];

    public function edition()
    {
    	return $this->belongsTo(Edition::class);
    }

    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function teams()
    {
    	return $this->hasMany(User::class);
    }
}
