<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use App\Models\User;
use Livewire\Component;
use App\Models\Operation;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Parcel;
use App\Http\Livewire\Traits\WithDataTables;

class DetailsMut extends Component
{
   
    use WithDataTables;
    public $parcel, $notaires, $users, $operation, $geometres, $membres;
    public $user_ids = [];


    public function mount($operation_id)
    {
        $this->parcel = Parcel::findOrFail($operation_id);
        $this->membres = MembreDuCabinet::all('id', 'first_name', 'last_name', 'type_membre');
        // $this->geometres = MembreDuCabinet::geometre()->select('id', 'first_name', 'last_name')->get();
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();

    }
    public function initData($id)  
    {
        $operation = Operation::findOrFail($id);
        $this->operation = $operation;
    }

    public function render()
    {
        $parcels = Parcel::orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $parcels_count = Parcel::count();
        $membress = MembreDuCabinet::all();
        return view('livewire.portal.operations.partials.details-mut',[
        'parcels' => $parcels,
        'parcels_count' => $parcels_count,
        'membress' => $membress,
    ]);
    }
}
