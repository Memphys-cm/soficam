<?php

namespace App\Http\Livewire\Portal\Taxfonciere\SuiviTaxfonciere;

use App\Exports\TaxeFonciere;
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
use Carbon\Carbon;
use Hachther\MeSomb\Operation\Payment\Collect;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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
    public $status_tax, $taxFoncier_amount, $price, $payment_method, $regions, $element, $subdivisions, $divisions, $selector, $status, $region_id, $division_id, $subdivision_id;

    public $requestor_id, $requestors, $inter_start, $inter_end;
    public function mount()
    {
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();

        // $user = User::findOrFail(22);
        // dd($user->titrefoncier);
        $this->titrefoncier = TitreFoncier::all();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        $this->divisions = Division::select('division_name_en', 'division_name_fr', 'id')->get();
        $this->subdivisions = SubDivision::select('sub_division_name_en', 'sub_division_name_fr', 'id')->get();
    }
    public function export()
    {
        auditLog(
            auth()->user(),
            'sales_report_exported',
            'web',
            __('Exported excel file for Sales')
        );
        return (new \App\Exports\TaxeFonciere(
            $this->status,
            $this->region_id,
            $this->division_id,
            $this->subdivision_id,
            $this->inter_start,
            $this->inter_end,
            $this->orderBy,
            $this->orderAsc
        ))->download('taxes_foncieres.xlsx');
        
       
    }
    public function BuildingQuery()
    {
        return TitreFoncier::query() // Utiliser query() pour une meilleure compatibilité
            ->when($this->status && in_array($this->status, ['payer', 'non_payer']), function ($query) {
                return $query->where('status_tax', $this->status);
            })
            ->when($this->region_id && $this->region_id != "all", function ($query) {
                return $query->where('region_id',  $this->region_id);
            })
            ->when($this->division_id && $this->division_id != "all", function ($query) {
                return $query->where('division_id',  $this->division_id);
            })
            ->when($this->subdivision_id && $this->subdivision_id != "all", function ($query) {
                return $query->where('sub_division_id',  $this->subdivision_id);
            })
            ->when($this->inter_start && $this->inter_end, function ($query) {
                return $query->whereBetween(DB::raw('DATE(created_at)'), [
                    Carbon::parse($this->inter_start),
                    Carbon::parse($this->inter_end)
                ]);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc'); // Gérer le tri dynamique
    }

    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->status_tax =  $titrefoncier->status_tax;
        $this->taxFoncier_amount =  $titrefoncier->taxFoncier_amount;
    }
    public function updatedPaymentType() {}

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

        $this->refresh(__('Taxe Foncière mise à jour avec succès'), 'paiement');
    }

    public function clearFields()
    {
        $this->payment_method = '';
        $this->taxFoncier_amount = '';
        $this->status_tax = '';
        $this->price = '';
        $this->phoneNumber = '';
    }

    public function sms($id)
    {

        $receivers = TitreFoncier::where('id', $id)->get();

        $sms = '';
        $userNames = '';
        $mobiles = "";

        foreach ($receivers as $user) {
            if ($user) {
                $userNames .= $user->first_name . ',';
                $mobiles .= "$user->primary_phone_number,";
            }
        }

        //retirer la virgule en fin de chaine
        $userNames = rtrim($userNames, ',');
        $mobiles = rtrim($mobiles, ',');
        $sms = "Mr/Mme. $userNames, vous devez payer votre taxe foncière.
        Cliquez sur le lien ci dessous pour vous connecter à la plateforme: http://127.0.0.1:8001/";


        if (!empty($sms)) {
            $senderid = 'SOFICAM';
            $mobiles = $mobiles;
            $api_key = 'wplL0f9wq1moi1NrsjpsBgfBzun4';
            $url = 'https://api.queensms.net/v1/sms.php';

            $sms_body = array(
                'api_key' => $api_key,
                'senderid' => $senderid,
                'sms' => $sms,
                'mobiles' => $mobiles
            );

            $send_data = http_build_query($sms_body);
            $gateway_url = $url . "?" . $send_data;

            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $gateway_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPGET, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $output = curl_exec($ch);

                if (curl_errno($ch)) {
                    $output = curl_error($ch);
                    $arr = ['echec'];
                    return ($arr);
                } else {
                    return ($output);
                }
                curl_close($ch);
            } catch (Exception $exception) {
                //echo $exception->getMessage();
                $arr = ['echec'];
                return ($arr);
            }
        }
    }

    public function render()
    {

        $titrefonciers = $this->BuildingQuery()->paginate($this->perPage);
        $titrefonciers_count = TitreFoncier::count();
        $titrefonciers_with_tax = TitreFoncier::whereNotNull('taxFoncier_amount')->count();
        $totalTaxAmountPrediction = TitreFoncier::sum('taxFoncier_amount');
        $totalTaxAmountpaid = TitreFoncier::where('status_tax', 'payer')->sum('taxFoncier_amount');
        $totalTaxAmountPaid = TitreFoncier::where('status_tax', 'payer')->sum('taxFoncier_amount');
        $tax_paid_percentage = TitreFoncier::whereNotNull('taxFoncier_amount')->count();
        //  Check if $totalTaxAmountPrediction is not zero or null before calculating the percentage
        $percentagePaid = ($totalTaxAmountPrediction != 0) ? ($totalTaxAmountPaid / $totalTaxAmountPrediction) * 100 : 0;
        // $percentagePaid = ($totalTaxAmountPaid / $totalTaxAmountPrediction) * 100;

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
