<?php

namespace App\Http\Livewire\Portal\Taxfonciere\SuiviTaxfonciere;

use App\Models\User;
use App\Models\Region;
use Livewire\Component;
use App\Models\Division;
use App\Models\Sales\Sale;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use App\Models\Sales\Saleable;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use Hachther\MeSomb\Operation\Payment\Collect;

class Index extends Component
{
    use WithDataTables;
    public $users, $titrefoncier;
    public ?string $query = null;

    public $selectedRegion = null;
    public $selectedDivision = null;
    public $selectedSubDivision = null;
    public $selectedStatus = null;
    public $startDate = null;
    public $endDate = null;
    public $createdDate = null;
    public $selectedUsers = [];
    public $paymentType = 'Cash';
    public $phoneNumber = '';
    public $status_tax, $taxFoncier_amount, $price, $payment_method;
    
    public $requestor_id, $requestors;
    public function mount()
    {
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();

        // $user = User::findOrFail(22);
        // dd($user->titrefoncier);
        $this->titrefoncier = TitreFoncier::all();
    }

    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->status_tax =  $titrefoncier->status_tax;
        $this->taxFoncier_amount =  $titrefoncier->taxFoncier_amount;
    }
    public function updatedPaymentType()
    {
    }

    public function confirmOrder()
    {
        $rules = [
            'paymentType' => 'required|in:MTN,ORANGE,Cash', // Add 'Cash' as a valid payment type
        ];

        if ($this->paymentType !== 'Cash') {
            // Validate the phone number for MTN and ORANGE payments
            if ($this->paymentType === 'MTN') {
                $rules['phoneNumber'] = [
                    'required',
                    'regex:/(:?^6(:?(:?7)(:?\d){7}$))|(:?^6(:?(:?5[0-4])(:?\d){6}$))|(:?^6(:?(:?8)(:?\d){7}$))/',
                ];
            } elseif ($this->paymentType === 'ORANGE') {
                $rules['phoneNumber'] = [
                    'required',
                    'regex:/(:?^6(:?(:?9)(:?\d){7}$))|(:?^6(:?(:?5[5-9])(:?\d){6}$))/',
                ];
            }

            $this->validate($rules);

            $request = new Collect($this->phoneNumber, $this->taxFoncier_amount, $this->paymentType, 'CM');
            $payment = $request->pay();

            if ($payment->success) {
                $this->update();
            } else {
                return redirect()->back()->with('error', 'Payment failed');
            }
        } else {
            $this->update();
        }
    }


    public function update()
    {
        $this->validate(
            [
                'status_tax' => 'required',
                'taxFoncier_amount' => 'required|numeric',

            ]
        );
        
        if (!empty($this->titrefoncier)) {

            $this->titrefoncier->update([
                'status_tax' => $this->status_tax,
                'date_tax' => now(),
                'taxFoncier_amount' => $this->taxFoncier_amount,

            ]);
            $sale = Sale::create([
                'sales_amount' => $this->taxFoncier_amount,
                'sales_type' => 'tax_foncier',
                'user_id' => $this->requestor_id,
                'payment_status' => 'totally_paid',
                'created_by' => auth()->user()->name,
            ]);
            // dd($sale);
            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->taxFoncier_amount,
                'quantity' => 1,
                'saleable_id' => $this->titrefoncier->id,
                'saleable_type' => 'App\Models\TitreFoncier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];


            DB::table('saleables')->insert($saleableData);
        }


        $this->clearFields();

        $this->refresh(__('Tax Foncier successfully Updated'), 'paiement');
    }

    public function clearFields()
    {
        $this->payment_method = '';
        $this->taxFoncier_amount = '';
        $this->status_tax = '';
        $this->price = '';
        $this->phoneNumber = '';
    }

    public function render()
    {

        $titrefonciers = TitreFoncier::search($this->query)->with('users')

            ->when($this->selectedSubDivision, function ($query, $subDivisionId) {
                return $query->where('sub_division_id', $subDivisionId);
            })
            ->when($this->createdDate, function ($query) {
                return $query->whereDate('date_tax', '>=', $this->createdDate);
            })

            ->when($this->selectedStatus, function ($query, $selectedStatus) {
                return $query->where('status_tax', $selectedStatus);
            })
            ->orderBy($this->orderBy, $this->orderAsc)
            ->paginate($this->perPage);

        $titrefonciers_count = TitreFoncier::count();
        $titrefonciers_with_tax = TitreFoncier::whereNotNull('taxFoncier_amount')->count();
        $totalTaxAmountPrediction = TitreFoncier::sum('taxFoncier_amount');
        $totalTaxAmountpaid = TitreFoncier::where('status_tax', 'payer')->sum('taxFoncier_amount');
        $totalTaxAmountPaid = TitreFoncier::where('status_tax', 'payer')->sum('taxFoncier_amount');
        $tax_paid_percentage = TitreFoncier::whereNotNull('taxFoncier_amount')->count();
        $percentagePaid = ($totalTaxAmountPaid / ($totalTaxAmountPrediction === 0 ? 1 : $totalTaxAmountPrediction) ) * 100;

        return view('livewire.portal.taxfonciere.suivi-taxfonciere.index',  [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
            'titrefonciers_with_tax' => $titrefonciers_with_tax,
            'totalTaxAmountPrediction' => $totalTaxAmountPrediction,
            'totalTaxAmountpaid' => $totalTaxAmountpaid,
            'tax_paid_percentage' => $tax_paid_percentage,
            'percentagePaid' => $percentagePaid,
        ]);
    }
}
