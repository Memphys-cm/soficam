<?php 

namespace App\Http\Livewire\Portal\Lotissements;


trait WithLotissementTrait 
{

    public $titre_fonciers, $titre_foncier_id, $area, $usable_area, $area_solde, $remaning_area;
    public $state = 0;
    public $tf_total_surface_area, $tf_total_surface_area_sold, $tf_total_surface_area_remaining;
    public $geometres = [], $lot_geometres = [], $notaires, $cabinet_geometres, $cabinet_notaires;
    public $geometre_id, $cabinet_geometre_id;
    public $lot_geometre_id, $cabinet_lot_geometre_id;
    public String $promo_imo, $maeture, $lotisseur,  $agent_imo, $controlleur, $urbaniste;
    public $blocks = [], $blocks_delete;
    public $newBlockName = '';
    public $newLot = [
        'id'=> '',
        'type' => '',
        'laffectation_du_lot' => '',
        'numero_du_lot' => '',
        'surperficie_du_lot' => '',
        'condition_lot' => '',
        'statut_du_lot' => '',
        'cabinet_notaire_id' => '',
        'notaire_id' => '',
        'lot_geometre_id' => '',
        'cabinet_lot_geometre_id' => ''
    ];
    public $countBlock = 0;


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
            'id' => '',
            'type' => '',
            'laffectation_du_lot' => '',
            'numero_du_lot' => '',
            'surperficie_du_lot' => '',
            'cabinet_id' => '',
            'statut_du_lot' => '',
            'cabinet_notaire_id' => '',
            'notaire_id' => '',
            'lot_geometre_id' => '',
            'cabinet_lot_geometre_id' => '',
            'date_lotissement' => now()->format('d/m/y'),
        ];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function addLotPublic($blockIndex)
    {
        $this->newLot = [
            'id'=>'',
            'numero_du_lot' => '',
            'surperficie_du_lot' => '',
            'type' => 'public',
            'laffectation_du_lot' => '',
            'statut_du_lot'=> 'non_batit',
            'date_lotissement' => now()->format('d/m/y'),
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

}