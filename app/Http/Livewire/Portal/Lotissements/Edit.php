<?php

namespace App\Http\Livewire\Portal\Lotissements;

use App\Models\Cabinet;
use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Block;
use App\Models\Lotissements\Parcel;
use Illuminate\Support\Facades\Gate;
use App\Models\Lotissements\Lotissement;

class Edit extends Component
{
    use WithLotissementTrait;
 
    public function mount($lotissement_id)
    {
        $this->lotissement = Lotissement::findOrFail($lotissement_id);
        $this->blocks = $this->lotissement->blocks()->with('parcels')->get()->toArray();

        // dd($this->blocks);

         $this->titre_foncier_id = $this->lotissement->titre_foncier_id;
         $this->geometre_id = $this->lotissement->geometre_id;
         $this->cabinet_geometre_id = $this->lotissement->geometre_cabinet_id;
         $this->maeture = $this->lotissement->maeture;
         $this->promo_imo = $this->lotissement->promoteur_immobiliere;
         $this->lotisseur = $this->lotissement->lotisseur;
         $this->agent_imo = $this->lotissement->agent_immobiliere;
         $this->urbaniste = $this->lotissement->urbaniste;
         $this->controlleur = $this->lotissement->controlleur;

        $this->geometres = MembreDuCabinet::geometre()->whereCabinetId($this->cabinet_geometre_id)->get();

        $tf = TitreFoncier::findOrFail($this->titre_foncier_id);

        $this->tf_total_surface_area = $tf->superficie_du_TF_mere;
        $this->tf_total_surface_area_sold = $tf->superficie_vendue_du_TF_mere;
        $this->tf_total_surface_area_remaining = $tf->superficie_restant_du_TF_mere;

        $this->titre_fonciers = TitreFoncier::all();
        $this->notaires = MembreDuCabinet::notaire()->get();
        $this->cabinet_geometres = Cabinet::geometre()->get();
        $this->lot_geometres = MembreDuCabinet::geometre()->get();
    }

    public function update()
    {
        if (!Gate::allows('lotissement.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'geometre_id' => 'required',
            'blocks' => 'required|array',
            // 'parcels' => 'required|array',
        ]);

        $geometre = MembreDuCabinet::findOrFail($this->geometre_id);

        $this->lotissement->update([
            'titre_foncier_id' => $this->titre_foncier_id,
            'geometre_id' => $this->geometre_id,
            'geometre_cabinet_id' => $geometre->cabinet->id,
            'maeture' => $this->maeture,
            'promoteur_immobiliere' => $this->promo_imo,
            'lotisseur' => $this->lotisseur,
            'agent_immobiliere' => $this->agent_imo,
            'urbaniste' => $this->urbaniste,
            'controlleur' => $this->controlleur,
        ]);

        // if ($this->state == 0) {
        //     foreach ($this->blocks as $key => $blockData) {
        //         $block = Block::create([
        //             'lotissement_id' => $lotissement->id,
        //             'block_name' => $blockData['block_name']
        //         ]);

        //         foreach ($blockData['parcels'] as $lotData) {
        //             // Créer un nouveau lot avec les données du tableau
        //             $lot_geometre = MembreDuCabinet::findOrFail($lotData['lot_geometre_id']);
        //             $notaire = MembreDuCabinet::findOrFail($lotData['notaire_id']);

        //             if ($lotData['type'] != 'public') {
        //                 $lot = Parcel::create([
        //                     'lotissement_id' => $lotissement->id,
        //                     'titre_foncier_id' => $this->titre_foncier_id,
        //                     'block_id' => $block->id,
        //                     'numero_du_lot' => $lotData['numero_du_lot'],
        //                     'surperficie_du_lot' => $lotData['surperficie_du_lot'],
        //                     'statut_du_lot' => $lotData['statut_du_lot'],
        //                     'type' => 'normale',
        //                     'cabinet_notaire_id' => $lotData['cabinet_notaire_id'],
        //                     'notaire_id' => $notaire->cabinet->id,
        //                     'geometre_id' => $lotData['lot_geometre_id'],
        //                     'geometre_cabinet_id' => $lot_geometre->cabinet->id,
        //                     'date_lotissement' => $lotData['date_lotissement'],
        //                 ]);
        //             } else {
        //                 $lot = Parcel::create([
        //                     'lotissement_id' => $lotissement->id,
        //                     'titre_foncier_id' => $this->titre_foncier_id,
        //                     'block_id' => $block->id,
        //                     'numero_du_lot' => $lotData['numero_du_lot'],
        //                     'surperficie_du_lot' => $lotData['surperficie_du_lot'],
        //                     'type' => 'public',
        //                     'statut_du_lot' => 'non_batit',
        //                     'laffectation_du_lot' => $lotData['laffectation_du_lot'],
        //                     'date_lotissement' => $lotData['date_lotissement'],
        //                 ]);
        //             }
        //         }
        //     }
        // } else {
            foreach ($this->blocks as $blockData) {
                $block = Block::findOrFail($blockData['id']);
                $block->update([
                    'block_name' => $blockData['block_name']
                ]);
                // Mise à jour des lots existants
                if (is_array($blockData) && isset($blockData['parcels'])) {
                    // Mise à jour des lots existants
                    foreach ($blockData['parcels'] as $lotData) {
                        $lot = Parcel::findOrFail($lotData['id']);
                        $lot->update($lotData);
                    }
                }
            }
        // }

        session()->flash(__('Lotissement successfully updated!'));
        return redirect()->route('portal.lotissements.index');
    }


    public function render()
    {
        return view('livewire.portal.lotissements.edit');
    }
}
