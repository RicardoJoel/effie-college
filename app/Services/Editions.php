<?php

namespace App\Services;

use App\Edition;

class Editions
{
    public function get()
    {
        $editions = Edition::orderBy('name')->get();
        $array = [];
        foreach ($editions as $edition) {
            $array[$edition->id] = $edition->name;
        }
        return $array;
    }
}
