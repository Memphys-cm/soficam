<?php

namespace App\Http\Livewire\Portal\Sales\SalesReport;

use Livewire\Component;
use App\Models\User;
use App\Models\Sales\Sale;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\MembreDuCabinet;
use App\Models\Service;


class Index extends Component
{
    use WithDataTables;

    public $notaries, $notary, $services, $service_id, $receveurs, $receveur_id, $payment_method;
    public $sales_type, $payment_status, $startdate, $enddate, $sales;
    public $search = '';
    public $currentFilter = 'all';


    public function mount()
    {
        $this->notaries = MembreDuCabinet::select('id', 'first_name', 'last_name')->get();
        $this->services = Service::all();
        $this->receveurs = User::role('admin_user')->select('id', 'first_name', 'last_name')->get();
    }
    public function updatedSalesType($value)
    {
        $this->currentFilter = $value;
    }

    public function updatedPaymentStatus($value)
    {
        $this->currentFilter = $value;
    }

    public function updatedNotary($value)
    {
        $this->currentFilter = $value;
    }
    

    public function render()
    {
        $query = Sale::query();
    
        $allsales = Sale::search($this->query)->when($this->sales_type, function($query)
        {
            return  $query->where('sales_type', $this->sales_type);
        })
        ->when($this->payment_method, function($query){
            return  $query->where('payment_method', $this->payment_method);
        })
        ->when($this->payment_status, function($query){
            return  $query->where('payment_status', $this->payment_status);
        })
        ->when($this->service_id, function($query){
            return  $query->where('service_id', $this->service_id);
        })
        ->when($this->startdate, function ($query) {
            return $query->whereDate('created_at', '>=', $this->startdate);
        })
        ->when($this->enddate, function ($query) {
            return $query->whereDate('created_at', '<=', $this->enddate);
        })
        ->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $allsales_count = Sale::count();
        

        return view('livewire.portal.sales.sales-report.index', [
            'allsales' => $allsales,
            'allsales_count' => $allsales_count,
        ]);
    }
}    
