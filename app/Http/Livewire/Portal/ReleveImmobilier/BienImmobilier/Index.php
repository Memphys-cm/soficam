<?php

namespace App\Http\Livewire\Portal\ReleveImmobilier\BienImmobilier;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Sales\Saleable;

class Index extends Component
{
    use WithDataTables;

    public $status = 'pending_payment';
    public $type = 'bien_immobilier';
    public $price, $releve_number, $releves_type, $validity, $releve_reason;
    public $real_estate, $real_estate_id, $requestor_id;

    public function mount()
    {
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }
    public function cul(){
        dd('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
    }

    public function initData($id)
    {
        $real_estate = ReleveImmobilier::findOrFail($id);

        $this->real_estate = $real_estate;

        $this->real_estate_id = $real_estate->id;
        $this->releve_number =  $real_estate->releve_number;
        $this->releves_type =  $real_estate->releves_type;
        $this->releve_reason =  $real_estate->releve_reason;
        $this->price =  $real_estate->price;
        $this->validity =  $real_estate->validity;
        $this->status =  $real_estate->status;
        $this->requestor_id =  $real_estate->requestor_id;

    }

    public function store() {

        $this->validate([
            'releve_number' => 'required',
            'releve_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',

        ]);

        DB::transaction(function () {
    
            $real_estate = ReleveImmobilier::create([
                'releves_type' => $this->releves_type,
                'releve_reason' => $this->releve_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'type' => $this->type,
                'validity' => Carbon::now()->addMonths(3),
                'releve_number' => $this->releve_number,
                'status' => $this->status,
                'recorded_by' => auth()->user()->name,
            ]);

            $sale = Sale::create([
                'user_id' => $this->requestor_id,
                'sales_amount' => $this->price,
                'sales_type' => 'bien_immobilier',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            Saleable::create([
                'sale_id' => $sale->id,
                'price' => $this->price,
                'quantity' => 1,
                'saleable_id' => $real_estate->id,
                'saleable_type' => 'bien_immobilier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ]);
        });

        $this->clearFields();
        $this->refresh(__('Real Estate successfully Created!'), 'CreateEstateModal');
    }

    public function clearFields()
    {
        $this->type = '';
        $this->releves_type = '';
        $this->releve_reason = '';
        $this->requestor_id = '';
        $this->price = '';
        $this->validity = '';
        $this->releve_number = '';
        $this->status = '';
    }

    public function update()
    {
        $this->validate([
            'releve_number' => 'required',
            'releve_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
        ]);

       
        DB::transaction(function () {
            $this->real_estate->update([
                'releve_number' => $this->releve_number,
                'certificate_proprietes_type' => $this->certificate_proprietes_type,
                'releve_reason' => $this->releve_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
            ]);
        });

        $this->refresh(__('Real Estate Is Updated!'), 'EditEstateModal');

        $this->clearFields();
    }

    public function delete()
    {
        if ($real_estate) {
            $real_estate->delete();
            $this->refresh(__('Real Estate successfully Created!'), 'DeleteModal');
        }
    }

    public function render()
    {
        $real_estates = ReleveImmobilier::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $real_estates_count = ReleveImmobilier::count();

        return view('livewire..portal.releve-immobilier.bien-immobilier.index',[
            'real_estates' => $real_estates,
            'real_estates_count' => $real_estates_count
        ]);
    }
}
