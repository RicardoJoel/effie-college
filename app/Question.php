<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'questions';

    protected $fillable = [
        'code', 'title', 'detail', 'remark', 'maxwrd', 'maxgrp', 'section_id'
    ];

    public function section()
    {
    	return $this->belongsTo(Section::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }
}