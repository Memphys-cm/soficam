<?php

namespace App\Exports;

use App\Models\TitreFoncier;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaxeFonciere implements FromQuery, WithMapping, WithHeadings
{
    use \Maatwebsite\Excel\Concerns\Exportable;

    protected $status;
    protected $region_id;
    protected $division_id;
    protected $subdivision_id;
    protected $inter_start;
    protected $inter_end;
    protected $orderBy;
    protected $orderAsc;

    public function __construct($status, $region_id, $division_id, $subdivision_id, $inter_start, $inter_end, $orderBy = 'id', $orderAsc = true)
    {
        $this->status = $status;
        $this->region_id = $region_id;
        $this->division_id = $division_id;
        $this->subdivision_id = $subdivision_id;
        $this->inter_start = $inter_start;
        $this->inter_end = $inter_end;
        $this->orderBy = $orderBy;
        $this->orderAsc = $orderAsc;
    }

    /**
     * Construction de la requête pour l'export.
     */
    public function query()
    {
        return TitreFoncier::query()
            ->when($this->status && in_array($this->status, ['payer', 'non_payer']), function ($query) {
                return $query->where('status_tax', $this->status);
            })
            ->when($this->region_id && $this->region_id != "all", function ($query) {
                return $query->where('region_id',  $this->region_id);
            })
            ->when($this->division_id && $this->division_id != "all", function ($query) {
                return $query->where('division_id',  $this->division_id);
            })
            ->when($this->subdivision_id && $this->subdivision_id != "all", function ($query) {
                return $query->where('sub_division_id',  $this->subdivision_id);
            })
            ->when($this->inter_start && $this->inter_end, function ($query) {
                return $query->whereBetween(DB::raw('DATE(created_at)'), [
                    Carbon::parse($this->inter_start),
                    Carbon::parse($this->inter_end)
                ]);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');
    }

    /**
     * Définit les en-têtes du fichier Excel.
     */
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

    /**
     * Mapping des données pour chaque ligne de l'export.
     */
    public function map($titrefoncier): array
    {
        return [
            $titrefoncier->numero_titre_foncier,
            $titrefoncier->users->pluck('first_name')->join(', '),  // Concatène les noms des utilisateurs associés
            $titrefoncier->users->pluck('primary_phone_number')->join(', '),  // Concatène les numéros de téléphone
            $titrefoncier->taxFoncier_amount,
            $titrefoncier->status_tax
        ];
    }
}
