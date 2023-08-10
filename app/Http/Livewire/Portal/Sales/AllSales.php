<?php

namespace App\Http\Livewire\Portal\Sales;

use App\Models\User;
use App\Models\Notary;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Service;

class AllSales extends Component
{
    use WithDataTables;
    public $notaries, $notary, $services, $service, $receveurs,$receveur, $status;

    public function mount(){
        $this->notaries = Notary::select('id', 'name')->get();
        $this->services = Service::all();
        $this->receveurs = User::role('admin_user')->select('id', 'first_name', 'last_name')->get();


    }
    public function render()
    {
        $allsales = Sale::orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $allsales_count = Sale::count();
        return view('livewire..portal.sales.all-sales', [
            'allsales' => $allsales,
            'allsales_count' => $allsales_count,
        ]);
    }
}
