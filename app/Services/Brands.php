<?php

namespace App\Services;

use App\Brand;

class Brands
{
    public function get()
    {
        $brands = Brand::orderBy('name')->get();
        $array = [];
        foreach ($brands as $brand) {
            $array[$brand->id] = $brand->name;
        }
        return $array;
    }
}
