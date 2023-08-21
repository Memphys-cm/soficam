<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use App\Http\Livewire\Traits\WithDataTables;
use Livewire\Component;
use App\Models\Operation;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\Gate;

class AddSalesData extends Component
{
    use WithDataTables;

    public ?Operation $operation;
    public $notaires = [];
    public $notaire_id, $operation_type, $numero_reference_acte_expidition,$commentaires, $attachments;

    public function mount($operation_id, $operation_type)
    {
        $operation = Operation::findOrFail($operation_id);
        $this->operation = $operation;
        $this->operation_type = $operation_type;
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
    }

    public function store()
    {
        if (!Gate::allows('mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'notaire_id' => 'required',
            'numero_reference_acte_expidition' => 'required',
            'commentaires' => 'required',
            'attachments' => 'required|max:150'
        ]);

        if (!empty($this->operation)) {

            $this->operation->update([
                'notaire_id' => $this->notaire_id,
                'numero_reference_acte_expidition' => $this->numero_reference_acte_expidition,
                'commantaires_notaire' => $this->commentaires,
                'statut_notaire' => 'ongoing'
            ]);

            if (!empty($this->attachments)) {
                foreach ($this->attachments as $attachment) {
                    $this->operation->addMedia($attachment->getRealPath())
                        ->usingName('Acte Expidition')
                        ->toMediaCollection($this->operation_type);
                }

                $this->operation->update(['statut_notaire' => 'completed']);
            }

            $this->emitUp('flow_updated');
            
            $this->clearFields();
            $this->refresh(__('Operation successfully Created'), 'CreateAddSalesDataModal');
        }
    }

    public function clearFields()
    {
        return $this->reset([
            'notaire_id',
            'numero_reference_acte_expidition',
            'commentaires',
        ]);
    }


    public function render()
    {
        return view('livewire.portal.operations.partials.add-sales-data');
    }
}
