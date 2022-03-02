<?php

namespace App\Services;

use App\Career;

class Careers
{
    public function get()
    {
        $careers = Career::orderBy('name')->get();
        $array = [];
        foreach ($careers as $career) {
            $array[$career->id] = $career->name;
        }
        return $array;
    }
}
