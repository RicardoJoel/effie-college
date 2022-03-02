<?php

namespace App\Exports;

use Carbon\Carbon;
/* From array */
use Maatwebsite\Excel\Concerns\FromArray;
/* Heading */
use Maatwebsite\Excel\Concerns\WithHeadings;
/* Value binders */
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
/* Auto size column */
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
/* Styling */
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoicesExport extends DefaultValueBinder implements FromArray, WithHeadings, WithCustomValueBinder, ShouldAutoSize, WithStyles
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function array(): array
    {
        return $this->invoices;
    }

    public function headings(): array
    {
        return ['MARCA','INSTITUCION','ESCUELA','EQUIPO','APELLIDOS','NOMBRES',
                'TIPO DOCUMENTO','DOCUMENTO','CORREO ELECTRÓNICO','CELULAR',
                'CARRERA','CICLO','PERFIL','FECHA INSCRIPCION','SITUACION',
                'PROPUESTA','PUNTAJE','COMENTARIOS'];
    }

    /*public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);
            return true;
        }
        // else return default behavior
        return parent::bindValue($cell, $value);
    }*/

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
        ];
    }
}