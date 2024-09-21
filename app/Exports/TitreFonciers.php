<?php

namespace App\Exports;


use App\Models\TitreFoncier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class TitreFonciers implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $region_id;
    protected $division_id;
    protected $subdivision_id;
    protected $inter_start;
    protected $inter_end;
    protected $orderBy;
    protected $orderAsc;

    public function __construct($region_id, $division_id, $subdivision_id, $inter_start, $inter_end, $orderBy = 'id', $orderAsc = true)
    {
        $this->region_id = $region_id;
        $this->division_id = $division_id;
        $this->subdivision_id = $subdivision_id;
        $this->inter_start = $inter_start;
        $this->inter_end = $inter_end;
        $this->orderBy = $orderBy;
        $this->orderAsc = $orderAsc;
    }



    public function headings(): array
    {
        return [
            'Numero Titre Foncier',
            'Propriétaire(s)',
            'Numero',
            'Statut',
            'Date de Creation'
        ];
    }

    public function query()
    {
        return TitreFoncier::query()
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
     * @var Quarter $quarter
     */
    public function map($patient): array
    {
        return [
            $patient->numero_titre_foncier,
            $patient->users->pluck('first_name')->join(', '),  // Récupère et concatène tous les noms d'utilisateurs
            $patient->users->pluck('primary_phone_number')->join(', '),
            $patient->etat_TF,
            $patient->created_at,
        ];
    }
}
