<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RapportsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $rapports;

    public function __construct($rapports)
    {
        $this->rapports = $rapports;
    }

    public function collection()
    {
        return $this->rapports;
    }
    public function headings(): array
    {
        return [
            'Numero deprospect',
            'Nom Agent',
            'Nom Client',
            'Adresse Client',
            'Date',
            'Heure debut',
            'Heure fin',
            'Duree', 
            'Produit',
            'Observations Client',    
            'Conclue?',
        ];
    }
}
