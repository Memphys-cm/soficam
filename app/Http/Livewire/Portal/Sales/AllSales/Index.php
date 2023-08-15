<?php

namespace App\Http\Livewire\Portal\Sales\AllSales;

use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\Sales\Saleable;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    use WithDataTables;
    public ?string $query = null;
    public $allsales, $allsalesId, $sales_amount, $sales_code, $payment_method, $payment_status, $commentaires;
    public $sales_type;

    public function initData($id)
    {
        $allsales = Sale::findOrFail($id);
        $this->allsales = $allsales;
        $this->allsalesId = $id;
        $this->sales_amount = $allsales->sales_amount;
        $this->sales_type = $allsales->sales_type;
        $this->sales_code = $allsales->sales_code;
        $this->payment_method = $allsales->payment_method;
        $this->payment_status = $allsales->payment_status;
        $this->commentaires = $allsales->commentaires;
    }

    public function mount(){
        $this->allsales = Sale::all();
    }

    public function update(){

        $this->validate([
            'payment_method' => 'nullable',
            'sales_amount' => 'required',
            'payment_status' => 'required',
            'sales_type' => 'required',
            

        ]);       
        DB::transaction(function () {
            $this->allsales->update([
                'payment_method' => $this->payment_method,
                'sales_amount' => $this->sales_amount,
                'sales_type' => $this->sales_type,
                'payment_status' => $this->payment_status,
            ]);

            if ($this->payment_status === 'totally_paid') {
                Saleable::where('sale_id', $this->allsales->id)
                    ->update(['saleable_type' => 'DISPONIBLE']);
            }
            // $this -> immobilier->update([
            //     'status' => $this->payment_status,
               
            // ]);

        });

        $this->refresh(__('Sales Updated Created!'), 'updateAllSalesModal');

        $this->clearFields();
    }

    public function clearFields()
    {
        $this->payment_method = '';
        $this->sales_amount = '';
        $this->sales_type = '';
        $this->payment_status = '';
    }

    public function delete()
    {
        if ($this->allsales) {
            $this->allsales->delete();
           
        }
        $this->refresh(__('Sale deleted successfully'), 'DeleteModal');

    }

    public function render()
    {

        $allsaless = Sale::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $allsales_count = Sale::count();
        return view('livewire..portal.sales.all-sales.index', ['allsaless'=>$allsaless, 'allsales_count'=>$allsales_count]);
    }
}
