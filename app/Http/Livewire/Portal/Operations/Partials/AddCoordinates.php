<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use Livewire\Component;
use App\Models\Operation;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\Gate;

class AddCoordinates extends Component
{
    public ?Operation $operation;
    public $parcels = [] , $geometres = [];
    public $parce_id, $geometre_id;

    public $commentaires;

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
        $this->parcels = $operation->titreFoncier->parcels->where('type_de_venter', $operation_type);
        $this->geometre = MembreDuCabinet::geometre()->select('id', 'first_name', 'last_name')->get();
    }

    public function store()
    {
        if (!Gate::allows('mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'titre_foncier_id' => 'required',
            'requestor_id' => 'required',
            'etat_cession_id' => 'sometimes',
            'certificates_propriete_id' => 'required',
        ]);

        $this->mutation_total->update([
            'geometre_id' => $this->geometre_id,
            'numero_reference_plan' => $this->numero_reference_plan,
            'numero_reference_quittance_etat_cession' => $this->numero_reference_quittance_etat_cession,
            'commantaires_geometre' => $this->commantaires_geometre,
            'certificate_prioprietes_id' => $this->certificates_propriete_id,
            'etat_cession_id' => $this->etat_cession_id,
        ]);

        $this->clearFields();
        $this->refresh(__('Mutation Totale successfully Created'), 'CreateMutationTotaleModal');
    }

    public function clearFields()
    {
        return $this->reset([
            'titre_foncier_id',
            'requestor_id',
            'certificates_propriete_id',
            'etat_cession_id',
        ]);
    }
    public function render()
    {
        return view('livewire.portal.operations.partials.add-coordinates');
    }
}
