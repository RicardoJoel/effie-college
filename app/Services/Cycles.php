<?php

namespace App\Services;

use App\Cycle;

class Cycles
{
    public function get()
    {
        $cycles = Cycle::orderBy('code')->get();
        $array = [];
        foreach ($cycles as $cycle) {
            $array[$cycle->id] = $cycle->name;
        }
        return $array;
    }
}