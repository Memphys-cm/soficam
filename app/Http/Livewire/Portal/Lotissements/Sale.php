<?php

namespace App\Http\Livewire\Portal\Lotissements;

use App\Models\User;
use Livewire\Component;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Block;
use App\Models\Lotissements\Parcel;
use App\Models\Lotissements\Lotissement;

class Sale extends Component
{

    public Block $block;
    public ?Parcel $parcel;

    public $users, $notares, $surface_for_sale, $price_per_m², $sale_amount, $payment_method, $notary, $service_id;
    public $superficie_du_TF_mere, $notaires, $lotissement, $surperficie_du_lot, $notaire_id;
    public $user_ids = [];


    public function mount($lotissement_id)
    {
        $this->lotissement = Lotissement::findOrFail($lotissement_id);
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }

    public function initLotData($id)
    {
        $this->parcel = Parcel::findOrFail($id);
        $this->superficie_du_TF_mere = $this->parcel->surperficie_du_lot;

    }

    public function calculateSaleAmount()
    {
        // Check if both total surface for sale (superficie_du_TF_mere) and unit price per m² are set
        if (!empty($this->superficie_du_TF_mere) && !empty($this->price_per_m²)) {
            // Calculate the sale amount by multiplying superficie_du_TF_mere and price per m²
            $this->sale_amount = $this->superficie_du_TF_mere * $this->price_per_m²;

            // Calculate the remaining_amount as the difference between sale_amount and advanced_amount
           
        } else {
            // If any of the inputs is not set, set the sale amount to null or 0, depending on your preference
          
        }
    }
    public function updatedSurfaceForSale()
    {
        $this->calculateSaleAmount();
    }

    public function updatedPricePerM²()
    {
        $this->calculateSaleAmount();
    }

    public function update()
    {
        
        $this->validate([
            'titre_foncier_id' => 'required',
            'geometre_id' => 'required',
            'blocks' => 'required|array',
            // 'parcels' => 'required|array',
        ]);

        $notaire = MembreDuCabinet::findOrFail($this->notaire_id);

         $this->parcel->update([
            'surperficie_du_lot' =>  $this->superficie_du_TF_mere,
            'superficie_a_vendre' =>  'totale',
            'superficie_vendu' =>  $this->superficie_du_TF_mere,
            'statut_du_lot' =>  $this->etat_terrain,
            'type' => 'normale',
            'cabinet_notaire_id' => $notaire->cabinet->id,
            'notaire_id' => $notaire->id,
            'type_de_venter' => 'simple',
            'type_de_versement' => $this->payment_method,
            'prix_du_m2' =>  $this->price_per_m²,
            'superficie_restant' =>  $this->price_per_m²,
            'prix_du_m2' =>  $this->price_per_m²,
            'montant_de_la_vente' =>  $this->sale_amount,
            'montant_versee' =>  $this->sale_amount,
            'montant_restant' =>  0,
            'commentaire_du_notaire' => $this->commentaires,
            'date_de_vente' => empty($this->date_de_vente) ? now() : $this->date_de_vente,
         ]);

        // foreach ($this->blocks as $blockData) {
            
        //     if (!empty($blockData['id'])) {
        //         $this->block = Block::findOrFail($blockData['id']);
        //         $this->block->update([
        //             'block_name' => $blockData['block_name']
        //         ]);
        //     } else {
        //         $this->block = Block::create([
        //             'lotissement_id' => $this->lotissement->id,
        //             'block_name' => $blockData['block_name']
        //         ]);
        //     }
        //     // Mise à jour des lots existants
        //     if (is_array($blockData) && isset($blockData['parcels'])) {
        //         // Mise à jour des lots existants
        //         foreach ($blockData['parcels'] as $lotData) {
        //             if (!empty($lotData['id'])) {
        //                 $lot = Parcel::findOrFail($lotData['id']);
        //                 $lot->update($lotData);
        //             } else {

                    
        //             }
        //         }
        //     }
        // }

        $this->clearFields();
        $this->refresh(__('Block Sold successfully'), 'CreateLotSaleModal');
    }

    public function render()
    {
        return view('livewire.portal.lotissements.sale');
    }
}
