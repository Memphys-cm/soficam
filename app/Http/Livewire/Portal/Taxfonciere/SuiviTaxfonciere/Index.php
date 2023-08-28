<?php

namespace App\Http\Livewire\Portal\Taxfonciere\SuiviTaxfonciere;

use App\Models\User;
use App\Models\Region;
use Livewire\Component;
use App\Models\Division;
use App\Models\Sales\Sale;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    use WithDataTables;
    public $users, $titrefoncier;
    public ?string $query = null;

    public $selectedRegion=null;
    public $selectedDivision=null;
    public $selectedSubDivision=null;
    public $selectedStatus=null;
    public $startDate = null;
    public $endDate = null;
    public $selectedUsers=[];
    public $status_tax, $tax_amount, $price, $payment_method, $primary_phone_number;

    public function confirmOrder()
    {
        $request = new Collect('676922042', 1000, 'MTN', 'CM');

        $payment = $request->pay();

        if($payment->success){
            // Fire some event,Pay someone, Alert user
        } else {
            // fire some event, redirect to error page
        }

        // get Transactions details $payment->transactions
    }
    public function mount()
    {
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
        // $user = User::findOrFail(22);
        // dd($user->titrefoncier);
       $this->titrefoncier = TitreFoncier::all();
    }

    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->status_tax =  $titrefoncier->status_tax;
        $this->price =  $titrefoncier->price;
     
        
        $this->tax_amount = $this->price * 0.001;
       
    }
   
    public function update()
    {
        $this->validate(
            [
                'status_tax' => 'required',
                'tax_amount' => 'required|integer', 
               
            ]
        );
        if (!empty($this->titrefoncier)) {

            $this->titrefoncier->update([
                'status_tax' => $this->status_tax,
                'date_tax' => now(),
                'tax_amount' => $this->tax_amount,
           
            ]);
            $sale = Sale::create([
                'sales_amount' => $this->tax_amount,
                'sales_type' => 'tax_foncier',
                'payment_status' => 'totally_paid',
                'created_by' => auth()->user()->name,
            ]);
            dd($sale);
            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->tax_amount,
                'quantity' => 1,
                'saleable_id' => $this->titrefoncier->id,
                'saleable_type' => 'tax_foncier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        }


        $this->clearFields();

        $this->refresh(__('Tax Foncier successfully Updated'), 'paiement');

    }

    public function clearFields(){
        $this->payment_method = '';
        $this->tax_amount = '';
        $this->status_tax = '';
        $this->price = '';
        $this->primary_phone_number = '';
        
    }

    public function render()
    {

        $titrefonciers = TitreFoncier::search($this->query)->with('users')
        ->when($this->selectedRegion, function ($query, $regionId) {
            return $query->where('region_id', $regionId);
        })
        ->when($this->selectedDivision, function ($query, $divisionId) {
            return $query->where('division_id', $divisionId);
        })
        ->when($this->selectedSubDivision, function ($query, $subDivisionId) {
            return $query->where('sub_division_id', $subDivisionId);
        })
        ->when($this->startDate, function ($query) {
            return $query->whereDate('date_de_delivrance_du_TF', '>=', $this->startDate);
        })
        ->when($this->endDate, function ($query) {
            return $query->whereDate('date_de_delivrance_du_TF', '<=', $this->endDate);
        })
        ->when($this->selectedStatus, function ($query, $selectedStatus) {
            return $query->where('etat_TF', $selectedStatus);
        })
        ->orderBy($this->orderBy, $this->orderAsc)
        ->paginate($this->perPage);

        $titrefonciers_count = TitreFoncier::count();
        $titrefonciers_with_tax = TitreFoncier::whereNotNull('tax_amount')->count();
        $totalTaxAmount = TitreFoncier::sum('tax_amount');
        $tax_paid_percentage = TitreFoncier::whereNotNull('tax_amount')->count() / TitreFoncier::count() * 100;

        return view('livewire.portal.taxfonciere.suivi-taxfonciere.index',  [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
            'titrefonciers_with_tax' => $titrefonciers_with_tax,
            'totalTaxAmount' => $totalTaxAmount,
            'tax_paid_percentage' => $tax_paid_percentage,
        ]);
    }
}
