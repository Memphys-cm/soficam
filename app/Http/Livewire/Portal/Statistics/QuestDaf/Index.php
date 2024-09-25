<?php

namespace App\Http\Livewire\Portal\Statistics\QuestDaf;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;
use App\Models\Sales\Sale;

class Index extends Component
{

    public $startYear = 2019;
    public $endYear = 2024;

    public $start_year = 2017;
    public $end_year = 2024;
    public $gender = null;

    public $startcYear;
    public $endcYear;
    public $sales = [];
    public $totalSalesByYear = [];

    public function mount()
    {
        $this->startYear = 2019; // Année par défaut
        $this->endYear = date('Y'); // Année actuelle par défaut

        $this->startcYear = 2019; // Année par défaut
        $this->endcYear = date('Y'); // Année actuelle par défaut
        $this->fetchSales();
    }

    public function fetchSales()
    {
        // Initialiser le tableau des recettes par année
        $this->totalSalesByYear = [];

        // Récupérer les ventes dans la période sélectionnée
        $sales = Sale::whereYear('created_at', '>=', $this->startcYear)
                     ->whereYear('created_at', '<=', $this->endcYear)
                     ->get();

        // Calculer le montant total des ventes par année
        foreach ($sales as $sale) {
            $year = $sale->created_at->year;
            if (!isset($this->totalSalesByYear[$year])) {
                $this->totalSalesByYear[$year] = 0;
            }
            $this->totalSalesByYear[$year] += $sale->sales_amount;
        }
    }

    public function updated($propertyName)
    {
        // dd('ff');
        // Lorsque startYear ou endYear change, mettre à jour les ventes
        if ($propertyName === 'startcYear' || $propertyName === 'endcYear') {
            $this->fetchSales();
        }
    }

    public function render()
    {

        // Récupérer les titres fonciers filtrés par régions et divisions
        $titreFonciers = TitreFoncier::with('region', 'division', 'subDivision')
            ->whereBetween(DB::raw('YEAR(date_de_delivrance_du_TF)'), [$this->startYear, $this->endYear])
            ->when($this->gender, function ($query) {
                return $query->whereHas('users', function ($query) {
                    $query->where('sexe', $this->gender);
                });
            })
            ->get();

        // Organiser les données pour la vue de la table
        $tableData = $this->processTitreFonciers($titreFonciers);

        // Récupère toutes les données de la table immatriculation_directes
        $years = [2019, 2020, 2021, 2022, 2023];

        $data = ImmatriculationDirecte::with('users')
            ->whereIn(DB::raw('YEAR(date_delivrance)'), $years)
            ->get();

        return view('livewire.portal.statistics.quest-daf.index', [
            'tableData' => $tableData,
            'data' => $data,
            'years' => $years,
            'totalSalesByYear' => $this->totalSalesByYear,
        ]);
    }

    private function processTitreFonciers($titreFonciers)
    {
        $tableData = [];

        // Générer les années de startYear à endYear
        for ($year = $this->startYear; $year <= $this->endYear; $year++) {
            // Initialiser l'année avec des valeurs par défaut
            $tableData[$year] = [
                'ADAMAOUA' => 0,
                'Centre (Hors Yaoundé)' => 0,
                'Yaoundé' => 0,
                'EST' => 0,
                'EXTREME NORD' => 0,
                'Littoral (Hors Douala)' => 0,
                'Douala' => 0,
                'NORD' => 0,
                'NORD OUEST' => 0,
                'OUEST' => 0,
                'SUD' => 0,
                'SUD-OUEST' => 0,
            ];
        }

        // Parcourir les titres fonciers et les associer aux années correspondantes
        foreach ($titreFonciers as $titre) {
            // Convertir la date en objet Carbon (date_de_delivrance_du_TF est probablement une chaîne)
            $year = Carbon::parse($titre->date_de_delivrance_du_TF)->format('Y');

            // Obtenez le nom de la région et vérifiez les cas spéciaux pour Centre et Littoral
            $regionName = $this->getRegionName($titre->region->region_name_fr, $titre->division->division_name_fr);

            // Incrémenter le compte pour la région correspondante
            $tableData[$year][$regionName] = ($tableData[$year][$regionName] ?? 0) + 1;
        }

        return $tableData;
    }


    private function getRegionName($region, $division)
    {
        // Gestion spécifique des cas pour Centre et Littoral
        if ($region === 'CENTRE') {
            return $division === 'MFOUNDI' ? 'Yaoundé' : 'Centre (Hors Yaoundé)';
        }

        if ($region === 'LITTORAL') {
            return $division === 'WOURI' ? 'Douala' : 'Littoral (Hors Douala)';
        }

        // Retourner le nom de la région si aucune gestion spéciale n'est nécessaire
        return strtoupper($region);
    }
}
