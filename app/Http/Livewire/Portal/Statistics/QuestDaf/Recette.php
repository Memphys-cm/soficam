<?php

namespace App\Http\Livewire\Portal\Statistics\QuestDaf;

use Livewire\Component;
use App\Models\Sales\Sale;

class Recette extends Component
{

    public $startYear;
    public $endYear;
    public $totalSalesByYear = []; // Propriété pour stocker les recettes par année

    public function mount()
    {
        $this->startYear = 2019; // Année par défaut
        $this->endYear = date('Y'); // Année actuelle par défaut
        $this->fetchSales();
    }

    public function fetchSales()
    {
        // Initialiser le tableau des recettes par année
        $this->totalSalesByYear = [];

        // Récupérer les ventes dans la période sélectionnée
        $sales = Sale::whereYear('created_at', '>=', $this->startYear)
                     ->whereYear('created_at', '<=', $this->endYear)
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
        // Mettre à jour les recettes par année lors du changement de période
        if ($propertyName === 'startYear' || $propertyName === 'endYear') {
            $this->fetchSales();
        }
    }

    public function render()
    {
        // Créer un tableau d'années uniquement pour la plage sélectionnée
        $years = range($this->startYear, $this->endYear);

        return view('livewire.portal.statistics.quest-daf.recette', [
            'years' => $years,
            'totalSalesByYear' => $this->totalSalesByYear,
        ]);
    }
}
