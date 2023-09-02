<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use App\Http\Livewire\Traits\WithDataTables;
use Livewire\Component;
use App\Models\Operation;
use Livewire\WithFileUploads;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\Gate;
use App\Models\Lotissements\Parcel;

class AddCoordinates extends Component
{
    use WithDataTables;

    public ?Operation $operation;
    public $parcels = [] , $geometres = [];
    public $parcel_id, $geometre_id;
    public $operation_type, $numero_ccp, $numero_reference_plan;

    public $commentaires;
    public $attachments;

    public $coordinates = ['', ''];
    public $coordonnees = [];

    public function addCoordinate()
    {
        $this->coordinates[] = [];
    }

    public function removeCoordinate($coordinateIndex)
    {
        unset($this->coordinates[$coordinateIndex]);
        $this->coordinates = array_values($this->coordinates);
    }

    public function mount($operation_id,$operation_type)
    {
        $operation = Operation::findOrFail($operation_id);
        $this->operation = $operation;
        $this->operation_type = $operation_type;

        // dd($operation_type );
        
        $this->parcels = $operation->titreFoncier->parcels->where('type_de_venter', $operation_type == 'morcellement_normale' ? 'simple' : $operation_type);
        $this->geometres = MembreDuCabinet::geometre()->select('id', 'first_name', 'last_name')->get();
    }

    public function store()
    {
        if (!Gate::allows('operation.mutation_totale.create') || !Gate::allows('operation.retrait_indivision.create') || !Gate::allows('operation.morcellement.create') ) {
            return abort(401);
        }

        $this->validate([
            'parcel_id' => 'required',
            'geometre_id' => 'required',
            'numero_ccp' =>' required',
            'numero_reference_plan' => 'required',
            'attachments' => 'required|max:150'
        ]);

        if(!empty($this->operation)){

            $this->operation->update([
                'geometre_id' => $this->geometre_id,
                'numero_reference_plan' => $this->numero_reference_plan,
                'commantaires_geometre' => $this->commentaires,
                'statut_geometre' => 'ongoing'
            ]);
    
            if (!empty($this->parcel_id)) {
                $lot = Parcel::findOrFail($this->parcel_id);
                $geometre = MembreDuCabinet::findOrFail($this->geometre_id);
    
                $lot->update([
                    'commentaire_du_geometre'=> $this->commentaires,
                    'coordonnees_du_lot' => json_encode(getCoords($this->coordonnees)),
                    'numero_ccp' => $this->numero_ccp,
                    'lot_geometre_id' => $this->geometre_id,
                    'lot_geometre_cabinet_id' => $geometre->cabinet->id,
                    'date_renseignement_coordonnees' => now()
                ]);

                $this->operation->parcels()->sync($lot->id);
            }
    
            if (!empty($this->attachments)) {
                foreach ($this->attachments as $attachment) {
                    $this->operation->addMedia($attachment->getRealPath())
                        ->usingName('Plan+CCP')
                        ->toMediaCollection($this->operation_type);
                }
                
                $this->operation->update([ 'statut_geometre' => 'completed']);
            }
    
            $this->clearFields();
            
            $this->emitUp('flow_updated');

            $this->refresh(__('Operation successfully Created'), 'CreateAddCoordinatesModal');
        }
    }

    public function clearFields()
    {
        return $this->reset([
            'geometre_id',
            'numero_reference_plan',
            'commentaires',
            'numero_ccp',
            'coordinates',
            'parcel_id'
        ]);
    }
    public function render()
    {
        return view('livewire.portal.operations.partials.add-coordinates');
    }
}
