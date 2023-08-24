<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use App\Models\User;
use Livewire\Component;
use App\Models\Operation;
use App\Models\Sales\Sale;
use Illuminate\Support\Str;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class AddPaymentData extends Component
{
    use WithDataTables;
    public ?Operation $operation;
    public $operation_type_id = [], $users = [];
    public $prix, $commentaires;

    public function mount($operation_id, $operation_type)
    {
        $operation = Operation::findOrFail($operation_id);
        $this->operation = $operation;
        $this->operation_type = $operation_type;
        $this->conservateur = User::select('id', 'first_name', 'last_name')->get();

    }


    public function store()
    {
        if (!Gate::allows('mutation_totale.create')) {
            return abort(401);
        }

        $this->validate([
            'operation_type_id' => 'required',
            'prix' => 'required|integer',
        ]);

        if (!empty($this->operation)) {

          
            DB::transaction(function () {

                $this->operation->update([

                    'prix' => $this->prix,
                    'conservateur_id' => auth()->user()->id,
                    'commantaires_conservateur' => $this->commentaires,
                    'statut_conservateur' => 'pending_payment'
                ]);

                $sale = Sale::create([
                    'sales_code' => Str::upper(Str::random(6)) . "SLS" . now()->format('msu'),
                    'user_id' => $this->operation->requestor_id,
                    'sales_amount' => $this->operation->prix,
                    'sales_type' => $this->operation_type,
                    'created_by' => auth()->user()->name,
                ]);

                // Create the Saleable item using only the specified information
                $saleableData = [
                    'sale_id' => $sale->id,
                    'price' => $this->operation->prix,
                    'quantity' => 1,
                    'saleable_id' => $this->operation->id,
                    'saleable_type' => 'App\Models\Operation', // Adjust the namespace if different
                    'created_by' => auth()->user()->name,
                ];

                DB::table('saleables')->insert($saleableData);
            });

            $this->emitUp('flow_updated');

            $this->clearFields();
            $this->refresh(__('Operation successfully Created'), 'CreateAddPaymentDataModal');
        }
    }

    public function clearFields()
    {
        return $this->reset([
            'prix',
            'operation_type_id',
            'commentaires',
        ]);
    }
    
    public function render()
    {
        return view('livewire.portal.operations.partials.add-payment-data');
    }
}
