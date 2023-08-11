<?php

namespace App\Http\Livewire\Portal\Lotissement;

use App\Models\Cabinet;
use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\Gate;
use App\Models\Lotissements\Lotissement;
use Illuminate\Database\Eloquent\Collection;

class Create extends Component
{
    public ?Lotissement $lotissement;
    public $titre_fonciers, $titre_foncier_id, $area, $usable_area, $area_solde, $remaning_area;
    public $state = 0;
    public $tf_total_surface_area, $tf_total_surface_area_sold, $tf_total_surface_area_remaining;
    public Collection $geometres, $notaires ,$cabinet_geometre, $cabinet_notaires;
    public $geometre_id, $cabinet_geometre_id;
    public $lot_geometre_id, $cabinet_lot_geometre_id;
    public String $promo_imo, $maeture, $lotisseur,  $agent_immo, $controlleur, $urbaniste; 
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
        'lot_geometre_id' => ''
    ];
    public $countBlock = 0;

    public function updatedTitreFoncierID($id)
    {
        $tf = TitreFoncier::findOrFail($id);

        $this->tf_total_surface_area = $tf->superficie_du_TF_mere;
        $this->tf_total_surface_area_sold = $tf->superficie_vendue_du_TF_mere;
        $this->tf_total_surface_area_remaining = $tf->superficie_restant_du_TF_mere;
      
    }
    public function updatedCabinetGeomtreID($id)
    {
        $this->geometres = MembreDuCabinet::whereCabinetId($id);
    }
    public function updatedCabinetLotGeomtreID($id)
    {
        $this->lot_geometres = MembreDuCabinet::whereCabinetId($id);
    }
 
    public function updatedCabinetNotaireID($id)
    {
        $this->notaires = MembreDuCabinet::whereCabinetId($id);
    }
    
    public function mount()
    {
        $this->lotissement = new Lotissement();
        $this->titre_fonciers = TitreFoncier::all();
        $this->geometres = MembreDuCabinet::geometre()->get();
        $this->lot_geometres = MembreDuCabinet::geometre()->get();
        $this->notaires = MembreDuCabinet::notaire()->get();
        $this->cabinet_notaires = Cabinet::notaires()->get();
        $this->cabinet_geometres = Cabinet::geometre()->get();
        $this->cabinet_lot_geometres = Cabinet::geometre()->get();
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
            'lot_geometre_id' => ''
        ];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function addLotPublic($blockIndex)
    {
        $this->newLot = [
            'numero_du_lot' => '',
            'surperficie_du_lot' => '', 
            'type' => 'public',
            'laffectation_du_lot' => ''
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

    protected $rules = [
        'blocks.*.block_name' => 'required|array',

    ];
     public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        $this->validate();
    }

    public function render()
    {
        return view('livewire.portal.lotissement.create');
    }
}
