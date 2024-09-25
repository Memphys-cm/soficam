<?php

namespace App\Http\Livewire\Portal\Sales\AllSales;

use App\Models\User;
use App\Models\Receipt;
use Livewire\Component;
use App\Models\Operation;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\Sales\Saleable;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;
use Hachther\MeSomb\Operation\Payment\Collect;
use Malico\MeSomb\Payment;
use MeSomb\Operation\PaymentOperation;
use MeSomb\Util\RandomGenerator;

class Index extends Component
{
    use WithDataTables;
    public ?Sale $sale;
    public  $saleable;
    public $allsales, $allsale, $allsalesId, $sales_amount, $sales_code, $payment_status, $commentaires;
    public $sales_type, $payment_number, $requestor_id, $requestors;
    public $selectedStatus = 'pending_payment';
    public $user_id;
    public $payment_method = 'cash';

    public $tresorPay_Reference;

    public $manualTresor = false, $codeTresorPay;

    public function confirmOrder() {

    }

    public function retrait()
    {
        $client = new PaymentOperation('adc879c6a571f814038489e5826ad47b17436297', 'd3cf0e9b-7514-42b3-9f06-475decb32884', 'd67d4d39-cb07-408e-8f26-cea63484de54');
        // MeSomb::setVerifySslCerts(false); if to want to disable ssl verification
        $client->makeDeposit([
            'amount' => 900,
            'service' => 'MTN',
            'receiver' => '651897233',
            'nonce' => RandomGenerator::nonce(),
            'trxID' => '1'
        ]);
    }

    public function initData($id)
    {
        $sale = Sale::findOrFail($id);
        $this->sale = $sale;
        $this->saleable = $sale->saleables()->first();
        $this->sales_type =  $sale->sales_type;
        $this->user_id =  $sale->user_id;
        $this->sales_amount = number_format($sale->sales_amount);
        // dd($this->user_id);
    }

    public function updatedPaymentMethod($type)
    {
        if ($this->sale && $this->sale->user) {
            if ($type !== 'cash') {
                $this->payment_number = $this->sale->user->primary_phone_number;
            } else {
                $this->payment_number = null;
            }
        }
    }

    public function mount()
    {
        $this->allsales = Sale::all();
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }

    public function payment()
    {

        $this->validate([
            'payment_method' => 'required',
            'sales_amount' => 'required',
            'requestor_id' => 'nullable',
            'payment_number' => 'required_if:payment_method,mtn_mobile_money,orange_money'
        ]);

        DB::transaction(function () {

            $saleable_item =  Saleable::findOrFail($this->saleable->id);
            $immatriculationDirecte = ImmatriculationDirecte::whereId($saleable_item->saleable_id)->first();

            match ($saleable_item->saleable_type) {
                'App\Models\EtatCession'  => optional(EtatCession::whereId($saleable_item->saleable_id))->update(['status' => 'paid']),
                'App\Models\CertificatePropriete'  => optional(CertificatePropriete::whereId($saleable_item->saleable_id))->update(['status' => 'active']),
                'App\Models\Operation'  => optional(Operation::whereId($saleable_item->saleable_id))->update(['statut_conservateur' => 'ongoing']),
                'App\Models\ReleveImmobilier'  => optional(ReleveImmobilier::whereId($saleable_item->saleable_id))->update(['status' => 'active']),
                default => ''
            };

            if ($immatriculationDirecte && $immatriculationDirecte->statut === 'Ordre de Versement en Attente de Paiement') {
                $immatriculationDirecte->update([
                    'status_ordre_versement' => 'done',
                    'statut' => 'Ordre de Versement Payé',
                    'next_step' => 'Preparation Avis Au publique',
                ]);
            }
            // Deuxième condition
            elseif ($immatriculationDirecte && $immatriculationDirecte->statut === 'Etat de Cession en Attente de Paiement') {
                $immatriculationDirecte->update([
                    'statut' => 'Etat de cession payé',
                    'next_step' => 'Mise en forme du dossier technique',
                ]);
            }

            elseif ($immatriculationDirecte && $immatriculationDirecte->statut === 'Redevance foncière en attente de paiement') {
                $immatriculationDirecte->update([
                    'statut' => 'Redevance foncière payé',
                    'next_step' => 'finalisation et cloture du dossier',
                ]);
            }

            if (in_array($this->payment_method, ['ORANGE', 'MTN'])) {
                try {
                    $client = new PaymentOperation('adc879c6a571f814038489e5826ad47b17436297', 'd3cf0e9b-7514-42b3-9f06-475decb32884', 'd67d4d39-cb07-408e-8f26-cea63484de54');
                    // MeSomb::setVerifySslCerts(false); if to want to disable ssl verification
                    $client->makeCollect([
                        'amount' => $this->sale->sales_amount,
                        'service' => $this->payment_method,
                        'payer' => $this->payment_number,
                        'nonce' => RandomGenerator::nonce(),
                        'trxID' => '1'
                    ]);
                    $application = $client->getTransactions(['trxID']);
                    print_r($application->getStatus());
                } catch (\Throwable $e) {
                    report($e);
                    session()->flash('error', __('Something went wrong please try again later'));
                    abort(500, __('Something went wrong with payment'));
                }
            }
            if($this->codeTresorPay == null){
                $saleable_item->sale->sales_code = '24STATE00002';
                $this->sms($saleable_item->sale->certificat_id);
            }
            else{
                $saleable_item->sale->sales_code = $this->codeTresorPay;
                $this->sms($saleable_item->sale->certificat_id);
            }
            $saleable_item->sale->payment_status = 'totally_paid';
            $saleable_item->sale->payment_method = $this->payment_method;
            $saleable_item->sale->save();
            // dd($saleable_item->sale);

        });

        $this->refresh(__('Ventes mises à jour créées !'), 'updatePaySaleModal');

        $this->clearFields();
    }
    
    public function sms($id)
    {
        
        $certificatepropriete = CertificatePropriete::findOrFail($id);
        
        $receiver = $certificatepropriete->requestor->first_name;
       
        $sms = "Mr/Mme. $receiver votre Certificat de Propriété est disponible et désormais fonctionnel";
        $senderid = 'SOFICAM';
        $mobiles = $certificatepropriete->requestor->primary_phone_number;
        //dd($mobiles);
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

        }
        catch (Exception $exception){
            //echo $exception->getMessage();
            $arr = ['echec'];
            return ($arr);
        }
    }

    public function clearFields()
    {
        $this->payment_method = '';
        $this->sales_amount = '';
        $this->sales_type = '';
        $this->payment_status = '';
        $this->sale = null;
        $this->saleable = null;
    }

    public function delete()
    {
        if ($this->allsale) {
            $this->allsale->delete();
        }
        $this->refresh(__('Vente supprimée avec succès'), 'DeleteModal');
    }

    public function render()
    {

        if (auth()->user()->service == 'SDAAF') {
            # code...
            $allsaless = Sale::search($this->query)->where('sales_type', 'dossier_vise_enregistre')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        } else {
            # code...
            $allsaless = Sale::search($this->query)->when($this->selectedStatus, function ($query, $selectedStatus) {
                return $query->where('payment_status', $selectedStatus);
            })->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        }


        $allsales_count = Sale::count();
        return view('livewire.portal.sales.all-sales.index', ['allsaless' => $allsaless, 'allsales_count' => $allsales_count]);
    }
}
