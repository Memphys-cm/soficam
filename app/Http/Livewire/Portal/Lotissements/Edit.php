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

    public Block $block;
    public Parcel $parcel;


    public function removeBlock($blockIndex)
    {
        if(!empty($this->blocks[$blockIndex]['parcels'])){
            $block = Block::findOrFail($this->blocks[$blockIndex]['id']);
            $block->delete();
            $block->parcels()->delete();
        }
        unset($this->blocks[$blockIndex]);
        $this->blocks = array_values($this->blocks);
    }

    public function removeLot($blockIndex, $lotIndex)
    {
        if (!empty($this->blocks[$blockIndex]['parcels'])){
            $parcel = Parcel::findOrFail($this->blocks[$blockIndex]['parcels'][$lotIndex]['id']);
            $parcel->delete();
        }
        unset($this->blocks[$blockIndex]['parcels'][$lotIndex]);
        $this->blocks[$blockIndex]['parcels'] = array_values($this->blocks[$blockIndex]['parcels']);
    }


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

        foreach ($this->blocks as $blockData) {
            
            if (!empty($blockData['id'])) {
                $this->block = Block::findOrFail($blockData['id']);
                $this->block->update([
                    'block_name' => $blockData['block_name']
                ]);
            } else {
                $this->block = Block::create([
                    'lotissement_id' => $this->lotissement->id,
                    'block_name' => $blockData['block_name']
                ]);
            }
            // Mise à jour des lots existants
            if (is_array($blockData) && isset($blockData['parcels'])) {
                // Mise à jour des lots existants
                foreach ($blockData['parcels'] as $lotData) {
                    if (!empty($lotData['id'])) {
                        $lot = Parcel::findOrFail($lotData['id']);
                        $lot->update($lotData);
                    } else {

                        if ($lotData['type'] != 'public') {
                            $lot_geometre = MembreDuCabinet::findOrFail($lotData['lot_geometre_id']);
                            $notaire = MembreDuCabinet::findOrFail($lotData['notaire_id']);
                            $lot = Parcel::create([
                                'lotissement_id' => $this->lotissement->id,
                                'titre_foncier_id' => $this->titre_foncier_id,
                                'block_id' => $this->block->id,
                                'numero_du_lot' => $lotData['numero_du_lot'],
                                'surperficie_du_lot' => $lotData['surperficie_du_lot'],
                                // 'statut_du_lot' => $lotData['statut_du_lot'],
                                'type' => 'normale',
                                'cabinet_notaire_id' => $notaire->cabinet->id,
                                'notaire_id' => $lotData['notaire_id'],
                                'lot_geometre_id' => $lotData['lot_geometre_id'],
                                'lot_geometre_cabinet_id' => $lot_geometre->cabinet->id,
                                'date_lotissement' => $lotData['date_lotissement'],
                            ]);
                        } else {
                            $lot = Parcel::create([
                                'lotissement_id' => $this->lotissement->id,
                                'titre_foncier_id' => $this->titre_foncier_id,
                                'block_id' => $this->block->id,
                                'numero_du_lot' => $lotData['numero_du_lot'],
                                'surperficie_du_lot' => $lotData['surperficie_du_lot'],
                                'type' => 'public',
                                'statut_du_lot' => 'non_batit',
                                'laffectation_du_lot' => $lotData['laffectation_du_lot'],
                                'date_lotissement' => $lotData['date_lotissement'],
                            ]);
                        }
                    }
                }
            }
        }

        session()->flash('message', __('Lotissement mis à jour avec Succès!'));
        return redirect()->route('portal.lotissements.index');
    }


    public function render()
    {
        return view('livewire.portal.lotissements.edit');
    }
}
