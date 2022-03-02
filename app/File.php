<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    
    protected $fillable = [
        'filename', 'filedata', 'user_id'
    ];

    public function team()
    {
    	return $this->belongsTo(User::class);
    }
}
