<?php

namespace App\Services;

use App\Answer;

class Answers
{
    public function get($code, $username)
    {
        return Answer::leftJoin('questions','questions.id','answers.question_id')
                    ->leftJoin('users','users.id','answers.user_id')
                    ->where('users.username',$username)
                    ->where('questions.code',$code)
                    ->get('answers.*')
                    ->first();
    }
}