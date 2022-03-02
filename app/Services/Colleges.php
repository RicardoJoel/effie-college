<?php

namespace App\Services;

use App\College;

class Colleges
{
    public function get()
    {
        $colleges = College::orderBy('name')->get();
        $array = [];
        foreach ($colleges as $college) {
            $array[$college->id] = $college->name;
        }
        return $array;
    }
}
