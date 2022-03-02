<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $table = 'sections';

    protected $fillable = [
        'code', 'title', 'description', 'edition_id'
    ];

    public function edition()
    {
    	return $this->belongsTo(Edition::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}