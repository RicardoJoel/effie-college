<?php

namespace App\Services;

use App\DocumentType;

class DocumentTypes
{
    public function get()
    {
        $documentTypes = DocumentType::orderBy('code')->get();
        $array = [];
        foreach ($documentTypes as $documentType) {
            $array[$documentType->id] = $documentType->name;
        }
        return $array;
    }
}