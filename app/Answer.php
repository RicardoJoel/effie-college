<?php

namespace App;

use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes, HasChangesHistory;

    protected $table = 'answers';

    protected $fillable = [
        'detail', 'user_id', 'question_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
}