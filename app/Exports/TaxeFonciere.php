<?php

namespace App\Exports;

use App\Models\TitreFoncier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class TaxeFonciere implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $element;
    protected $selector;

    public function __construct($element, $selector)
    {
        $this->element = $element;
        $this->selector = $selector;
    }



    public function headings(): array
    {
        return [
            'Numero Titre Foncier',
            'Propriétaire(s)',
            'Numero',
            'Prix de la Taxe',
            'Statut de la Taxe'
        ];
    }

    public function query()
    {
        $query = TitreFoncier::query();

        // Appliquer le filtre en fonction de la sélection
        if ($this->element === 'region' && $this->selector) {
            $query->where('region_id', $this->selector);
        } elseif ($this->element === 'departement' && $this->selector) {
            $query->where('division_id', $this->selector);
        } elseif ($this->element === 'arrondissement' && $this->selector) {
            $query->where('sub_division_id', $this->selector);
        } elseif ($this->element === 'statut' && $this->selector) {
            $query->where('statut', $this->selector);
        }

        return $query;
    }

    /**
     * @var Quarter $quarter
     */
    public function map($patient): array
    {
        return [
            $patient->numero_titre_foncier,
            $patient->users->pluck('first_name')->join(', '),  // Récupère et concatène tous les noms d'utilisateurs
            $patient->users->pluck('primary_phone_number')->join(', '),
            $patient->taxFoncier_amount,
            $patient->status_tax
        ];
    }
}
