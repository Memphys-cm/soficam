<?php

namespace App\Http\Livewire\Portal\Lotissements;

use App\Models\User;
use Livewire\Component;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Block;
use App\Models\Lotissements\Parcel;
use App\Models\Lotissements\Lotissement;
use App\Http\Livewire\Traits\WithDataTables;

class Sale extends Component
{
    use WithDataTables;

    public Block $block;
    public ?Parcel $parcel;
    public $payment_type;

    public $users, $notares, $surface_for_sale, $price_per_m², $sale_amount, $payment_method, $notary, $service_id;
    public $superficie_du_TF_mere, $notaires, $lotissement, $surperficie_du_lot, $notaire_id;
    public $user_ids = [];
    public $montant_versee, $montant_restant, $type_de_versement, $commentaire_du_notaire;
    public $superficie_a_vendre;
    public $superficie_vendu = null;
    public $superficie_restant = null;


    public function mount($lotissement_id)
    {
        $this->lotissement = Lotissement::findOrFail($lotissement_id);
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();

        $this->calculateSaleAmount();
        $this->calculateSuperficieRestant();

    }

    public function initLotData($id)
    {
        $this->parcel = Parcel::findOrFail($id);
        $this->superficie_du_TF_mere = $this->parcel->surperficie_du_lot;
    }

    public function calculateSuperficieRestant()
{
    if ($this->superficie_a_vendre === 'partielle' && !is_null($this->superficie_vendu)) {
        if ($this->superficie_vendu <= $this->superficie_du_TF_mere) {
            $this->superficie_restant = $this->superficie_du_TF_mere - $this->superficie_vendu;
        } else {
            // Display an error message
            $this->addError('superficie_vendu', 'The value entered is more than Total Area.');
            $this->superficie_restant = null;
        }
    } else {
        $this->superficie_restant = null;
    }
}



    

    public function calculateSaleAmount()
{
    if (!empty($this->superficie_du_TF_mere) && !empty($this->price_per_m²)) {
        if ($this->superficie_a_vendre === 'total') {
            $this->sale_amount = $this->superficie_du_TF_mere * $this->price_per_m²;
            // Calculate the sale amount based on superficie_vendu and price_per_m²
        } elseif ($this->superficie_a_vendre === 'partielle') {
            // Calculate the sale amount based on superficie_du_TF_mere and price_per_m²
            $this->sale_amount = $this->superficie_vendu * $this->price_per_m²;

        }

        if ($this->type_de_versement === 'tranche') {
            if ($this->montant_versee !== null) {
                $this->montant_restant = $this->sale_amount - $this->montant_versee;
            } else {
                $this->montant_versee = 0;
                $this->montant_restant = 0;
            }
        } else {
            $this->type_de_versement = 0;
            $this->montant_versee = 0;
            $this->montant_restant = 0;
        }

        // Calculate superficie_restant based on selected superficie_a_vendre value
        if ($this->superficie_a_vendre === 'partielle') {
            $this->superficie_restant = $this->superficie_du_TF_mere - $this->superficie_vendu;
        } else {
            $this->superficie_restant = null;
        }
    } else {
        $this->sale_amount = null;
        $this->montant_restant = null;
        $this->superficie_restant = null;
    }
}

    public function updatedSuperficieAVendre()
{
    // Call the new method to recalculate superficie_restant
    $this->calculateSuperficieRestant();
}

    public function updatedSuperficieVendu()
    {
        // Call the new method to recalculate superficie_restant
        $this->calculateSuperficieRestant();
    }


    public function updateSuperficieVendu()
    {
        $this->superficie_restant = $this->superficie_du_TF_mere - $this->superficie_vendu;
    }


    public function updatedSurfaceForSale()
    {
        $this->calculateSaleAmount();
    }

    public function updatedPricePerM²()
    {
        $this->calculateSaleAmount();
    }
    public function updatedMontantVersee()
    {
        // Recalculate the montant_restant based on the updated montant_versee
        $this->montant_restant = $this->sale_amount - $this->montant_versee;
    }

    public function updated($changedProperty)
    {
        // Recalculate based on changed property
        if (
            $changedProperty === 'superficie_du_TF_mere' ||
            $changedProperty === 'price_per_m²' ||
            $changedProperty === 'superficie_a_vendre' ||
            $changedProperty === 'superficie_vendu' ||
            $changedProperty === 'montant_versee' ||
            $changedProperty === 'type_de_versement' ||
            $changedProperty === 'superficie_restant'
          
        ) {
            $this->calculateSaleAmount();
        }
    }
    

    public function update()
    {

        $this->validate([
            'superficie_a_vendre' => 'required',
            
        ]);
        if ($this->type_de_versement === 'cash') {
            $defaultMontantVersee = 0;
            $defaultMontantRestant = 0;
        } else {
            $defaultMontantVersee = $this->montant_versee ?? 0;
            $defaultMontantRestant = $this->montant_restant ?? 0;
        }
        $notaire = MembreDuCabinet::findOrFail($this->notaire_id);

        $this->parcel->update([
            'surperficie_du_lot' =>  $this->superficie_du_TF_mere,
            'superficie_a_vendre' =>  $this->superficie_a_vendre,
            'superficie_vendu' =>  $this->superficie_vendu,
            'type' => 'normale',
            'cabinet_notaire_id' => $notaire->cabinet->id,
            'notaire_id' => $notaire->id,
            'type_de_venter' => 'simple',
            'type_de_versement' => $this->payment_method,
            'prix_du_m2' =>  $this->price_per_m²,
            'superficie_restant' =>  $this->price_per_m²,
            'montant_de_la_vente' =>  $this->sale_amount,
            'montant_versee' =>  $this->montant_versee,
            'montant_restant' => $this->montant_restant,
            'commentaire_du_notaire' => $this->commentaire_du_notaire,
            'date_de_vente' => empty($this->date_de_vente) ? now() : $this->date_de_vente,
        ]);


        $this->clearFields();
        $this->refresh(__('Block Sold successfully'), 'CreateLotSaleModal');
    }


    public function clearFields()
    {
        $this->reset(
            [
                'superficie_du_TF_mere',
                'superficie_a_vendre',
                'superficie_vendu',
                'notaire_id',
                'type_de_versement',
                'price_per_m²',
                'superficie_restant',
                'montant_versee',
                'montant_restant',
                'commentaire_du_notaire',
                
                'user_ids',
            ]
        );

        $this->user_ids = [];
    }

    public function render()
    {
        return view('livewire.portal.lotissements.sale');
    }
}
