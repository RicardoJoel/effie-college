<?php

namespace App;

use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes, HasChangesHistory;

    protected $table = 'reviews';

    protected $fillable = [
        'score1', 'score2', 'score3', 'score4', 'feedback', 'user_id', 'jury_id'
    ];

    public function team()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function jury()
    {
    	return $this->belongsTo(User::class, 'jury_id');
    }
}