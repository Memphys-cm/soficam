<?php

namespace App\Http\Livewire\Portal\Lotissements;

use App\Models\Cabinet;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Block;
use App\Models\Lotissements\Parcel;
use Illuminate\Support\Facades\Gate;
use App\Models\Lotissements\Lotissement;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Livewire\Portal\Lotissements\WithLotissementTrait;

class Create extends Component
{
    use WithLotissementTrait;
    
    public ?Lotissement $lotissement;
   

    public function updatedTitreFoncierID($id)
    {
        $tf = TitreFoncier::findOrFail($id);

        $this->tf_total_surface_area = $tf->superficie_du_TF_mere;
        $this->tf_total_surface_area_sold = $tf->superficie_vendue_du_TF_mere;
        $this->tf_total_surface_area_remaining = $tf->superficie_restant_du_TF_mere;
      
    }
    public function updatedCabinetGeometreId($id)
    {
        $this->geometres = MembreDuCabinet::whereCabinetId($id)->get();
    }
    public function updatedCabinetLotGeomtreID($id)
    {
        $this->lot_geometres = MembreDuCabinet::whereCabinetId($id)->get();
    }
 
    public function updatedCabinetNotaireID($id)
    {
        $this->notaires = MembreDuCabinet::whereCabinetId($id)->get();
    }
    
    public function mount()
    {
        $this->lotissement = new Lotissement();
        $this->titre_fonciers = TitreFoncier::all();
        $this->notaires = MembreDuCabinet::notaire()->get();
        $this->cabinet_geometres = Cabinet::geometre()->get();
        $this->lot_geometres = MembreDuCabinet::geometre()->get();
    }

  
     public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'geometre_id' => 'required',
            'blocks' => 'required|array',
            // 'parcels' => 'required|array',
        ]);

        $geometre = MembreDuCabinet::findOrFail($this->geometre_id);
        
       $lotissement = Lotissement::create([
        'code' => Str::upper(Str::random(7)) . "" . now()->format('msu'),
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

        if ($this->state == 0) {
            foreach ($this->blocks as $key => $blockData) {
                $block = Block::create([
                    'lotissement_id' => $lotissement->id,
                    'block_name' => $blockData['block_name']
                ]);

                foreach ($blockData['parcels'] as $lotData) {
                    // Créer un nouveau lot avec les données du tableau
                    
                    if ($lotData['type'] != 'public') {

                        $lot_geometre = MembreDuCabinet::findOrFail($lotData['lot_geometre_id']);
                        $notaire = MembreDuCabinet::findOrFail($lotData['notaire_id']);

                        $lot = Parcel::create([
                            'lotissement_id' => $lotissement->id,
                            'titre_foncier_id' => $this->titre_foncier_id,
                            'block_id' => $block->id,
                            'numero_du_lot' => $lotData['numero_du_lot'],
                            'surperficie_du_lot' => $lotData['surperficie_du_lot'],
                            'statut_du_lot' => $lotData['statut_du_lot'],
                            'type' => 'normale',
                            'cabinet_notaire_id' => $notaire->cabinet->id,
                            'notaire_id' => $lotData['notaire_id'],
                            'lot_geometre_id' => $lotData['lot_geometre_id'],
                            'lot_geometre_cabinet_id' => $lot_geometre->cabinet->id,
                            'date_lotissement' => $lotData['date_lotissement'],
                        ]);
                    } else {
                        $lot = Parcel::create([
                            'lotissement_id' => $lotissement->id,
                            'titre_foncier_id' => $this->titre_foncier_id,
                            'block_id' => $block->id,
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
        } else {
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
        }

        session()->flash('message', __('Lotissement crée avec Succès!'));
        return redirect()->route('portal.lotissements.index');
    }

    public function render()
    {
        return view('livewire.portal.lotissements.create');
    }
}
