<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use Livewire\Component;
use App\Models\Operation;
use App\Models\MembreDuCabinet;

class AddSalesData extends Component
{
    public ?Operation $operation;
    public $parcels = [], $notaires = [];
    public $parce_id, $notaire_id;

    public function mount($operation_id, $operation_type)
    {
        $operation = Operation::findOrFail($operation_id);
        $this->operation = $operation;
        $this->parcels = $operation->titreFoncier->parcels->where('type_de_venter', $operation_type);
        $this->notaires = MembreDuCabinet::notaire()->select('id', 'first_name', 'last_name')->get();
    }

    public function render()
    {
        return view('livewire.portal.operations.partials.add-sales-data');
    }
}
