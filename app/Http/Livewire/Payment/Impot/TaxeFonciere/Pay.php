<?php

namespace App\Http\Livewire\Payment\Impot\TaxeFonciere;

use App\Models\CertificatePropriete;
use App\Models\Region;
use Livewire\Component;
use App\Models\Division;
use App\Models\SubDivision;
use App\Models\Conservation;
use App\Models\FakeCertificate;
use App\Models\TitreFoncier;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use MeSomb\Operation\PaymentOperation;
use MeSomb\Util\RandomGenerator;

class Pay extends Component
{


    public $regions;
    public $divisions = [];
    public $sub_divisions = [];
    public $region_id;
    public $division_id;
    public $sub_division_id;

    public $conservation_id, $conservations = [];


    public $region_code, $division_code;

    public $qualification;

    public $titre_foncier, $nom, $prenom, $profession, $motifs, $telephone, $email, $localisation, $identifiant;

    public $certificat, $operator;

    public $amount = 50000;

    public function mount($uuid = null)
    {
        if ($uuid != null) {
            $this->certificat = TitreFoncier::where('uuid', $uuid)->first();
            $this->titre_foncier = $this->certificat->numero_titre_foncier;
            $this->region_id = $this->certificat->region_id;
            $this->division_id = $this->certificat->division_id;
            $this->divisions = Division::all();
            // $this->conservations = Conservation::where('id',$this->division_id)->get();
            $this->conservations = Conservation::all();
            if ($this->certificat->users->isNotEmpty()) {
                $firstUser = $this->certificat->users->first();  // Sélectionne le premier utilisateur
                $this->nom = $firstUser->first_name;
                $this->prenom = $firstUser->last_name;
                $this->telephone = $firstUser->primary_phone_number;
                $this->email = $firstUser->email;
            }
            $this->localisation = $this->certificat->lieu_dit;
            $this->amount = $this->certificat->taxFoncier_amount;

            // dd($this->certificat->saleable);
        }

        // dd($uuid);

        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
    }


    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
            $this->region_code = Region::whereId($region_id)->first()->code;

            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
    }
    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->conservations = Conservation::whereDivisionId($division_id)->get();
            $this->division_code = Division::whereId($division_id)->first()->code;
            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
    }

    public function retrait($telephone, $operator)
    {
        $client = new PaymentOperation('adc879c6a571f814038489e5826ad47b17436297', 'd3cf0e9b-7514-42b3-9f06-475decb32884', 'd67d4d39-cb07-408e-8f26-cea63484de54');
        // MeSomb::setVerifySslCerts(false); if to want to disable ssl verification
        $response = $client->makeCollect([
            'amount' => 100,
            'service' => $operator,
            'payer' => $telephone,
            'nonce' => RandomGenerator::nonce(),
            'trxID' => '1',
            'mode' => 'asynchronous'
        ]);

        sleep(30);

        $transactions = $client->getTransactions([$response->transaction->pk]);

        return $transactions;
    }

    public function store()
    {
        $this->validate([
            'conservation_id' => 'required'
        ]);
        if ($this->certificat) {
            $region = Region::where('id', $this->region_id)->first();
            $divisions = Division::where('id', $this->division_id)->first();
            $conservations = Conservation::where('id', $this->conservation_id)->first();

            $response = $this->retrait($this->telephone, $this->operator);
            $transaction = $response[0];
            if ($transaction->status == "SUCCESS" || $transaction->status == "PENDING") {
                // Retourner true si l'opération est réussie



                $this->certificat->status_tax = "payer";
                $this->certificat->save();
                // Afficher le PDF dans une nouvelle fenêtre du navigateur


                session()->flash('message', 'Demande enregistrée avec succès.');

                return redirect()->route('portal.taxfonciere.suivi.index');
            } else {
                return redirect()->back();

                session()->flash('message', 'Demande a échoué.');
            }
        }

        // Réinitialiser le formulaire
        // $this->reset();
    }

    public function retraits()
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



    public function render()
    {
        // dd('ok');
        return view('livewire.payment.impot.taxe-fonciere.pay')->layout('components.layouts.user.master');
    }
}
