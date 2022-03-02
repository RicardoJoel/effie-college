<?php

namespace App\Services;

use App\Section;

class Sections
{
    public function get($code)
    {
        return Section::where('code',$code)->get()->first();
    }
}