<?php

namespace App\Http\Livewire\Portal\Lotissement;

use App\Models\Cabinet;
use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\Lotissements\Lotissement;
use App\Models\MembreDuCabinet;

class Create extends Component
{
    public ?Lotissement $lotissement;
    public $titre_fonciers, $titre_foncier_id, $area, $usable_area, $area_solde, $remaning_area;
    public $geometres= [];
    public $notaires = [];
    public $cabinet_notaires = [];
    public $state = 0;
    public $blocks = [], $blocks_delete;
    public $newBlockName = '';
    public $newLot = [
        'type' => '',
        'laffectation_du_lot' => '',
        'numero_du_lot' => '',
        'surperficie_du_lot' => '', 
        'condition_lot' => '',
        'statut_du_lot' => '', 
        'notaire_id' => '', 
        'geometre_id' => ''
    ];
    public $countBlock = 0;

    public function mount()
    {
        $this->lotissement = new Lotissement();
        $this->titre_fonciers = TitreFoncier::all();
        $this->geometres = MembreDuCabinet::geometre()->get();
        $this->notaires = MembreDuCabinet::notaire()->get();
        $this->cabinet_notaires = Cabinet::notaires()->get();
    }

    public function addBlock()
    {
        $this->blocks[] = [
            'titre_foncier_id' =>  $this->titre_foncier_id,
            'block_name' => $this->newBlockName,
            'parcels' => [],
        ];

        $this->newBlockName = '';
    }

    public function addLot($blockIndex)
    {
        $this->newLot = [
            'type' => '',
            'laffectation_du_lot' => '',
            'numero_du_lot' => '',
            'surperficie_du_lot' => '', 
            'cabinet_id' => '',
            'statut_du_lot' => '', 
            'notaire_id' => '', 
            'geometre_id' => ''
        ];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function addLotPublic($blockIndex)
    {
        $this->newLot = [
            'type' => '',
            'laffectation_du_lot' => '',
            'numero_du_lot' => '',
            'surperficie_du_lot' => '', 
            'cabinet_id' => '',
            'statut_du_lot' => '', 
            'notaire_id' => '', 
            'geometre_id' => ''
        ];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function removeBlock($blockIndex)
    {
        unset($this->blocks[$blockIndex]);
        $this->blocks = array_values($this->blocks);
    }

    public function removeLot($blockIndex, $lotIndex)
    {
        unset($this->blocks[$blockIndex]['parcels'][$lotIndex]);
        $this->blocks[$blockIndex]['parcels'] = array_values($this->blocks[$blockIndex]['parcels']);
    }

    protected array $rules = [
        'blocks.*.block_name' => 'required',

    ];
     public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        // Récupérer l'année en cours au format 'yy'
        $year = date('y');

        // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
        $counter = Lotissement::count() + 1;

        // Générer le code unique
        $code = $this->generateUniqueCode($year, $counter);

        $this->validate();
    }

    public function render()
    {
        return view('livewire.portal.lotissement.create');
    }
}
