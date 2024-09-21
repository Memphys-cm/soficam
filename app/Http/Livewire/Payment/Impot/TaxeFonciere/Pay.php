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

    public $certificat;

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
            $this->amount = $this->certificat->price;

            // dd($this->certificat->saleable);
        }

        // dd($uuid);

        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
    }

    public function retrait()
    {
        $client = new PaymentOperation('adc879c6a571f814038489e5826ad47b17436297', 'd3cf0e9b-7514-42b3-9f06-475decb32884', 'd67d4d39-cb07-408e-8f26-cea63484de54');
        // MeSomb::setVerifySslCerts(false); if to want to disable ssl verification
        $client->makeCollect([
            'amount' => 100,
            'service' => 'MTN',
            'receiver' => '677550820',
            'nonce' => RandomGenerator::nonce(),
            'trxID' => '1'
        ]);
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

    public function store()
    {
        $this->validate([
            'conservation_id'=>'required'
        ]);
        if ($this->certificat) {
            $region = Region::where('id', $this->region_id)->first();
            $divisions = Division::where('id', $this->division_id)->first();
            $conservations = Conservation::where('id', $this->conservation_id)->first();
            $this->retrait();
            $data = [
                'qualification' => $this->qualification,
                'region' => $region->region_name_fr,
                'division' => $divisions->division_name_fr,
                'subDivision' => $conservations->conservation_name_fr,
                'titre_foncier' => $this->titre_foncier,
                'nom' => $this->nom ?? 'N/A',
                'prenom' => $this->prenom ?? 'N/A',
                'profession' => $this->profession ?? 'N/A',
                'motifs' => $this->motifs ?? 'N/A',
                'telephone' => $this->telephone ?? 'N/A',
                'email' => $this->email ?? 'N/A',
                'localisation' => $this->localisation ?? 'N/A',
                'identifiant' => $this->identifiant ?? 'N/A',
                'date' => now()->format('d/m/Y'),
            ];

            $pdf = Pdf::loadView('certificates.receipt', $data)
                ->setPaper('a4', 'portrait');


            $this->certificat->status_tax = "payer";
            $this->certificat->save();
            // Afficher le PDF dans une nouvelle fenêtre du navigateur
            return response()->stream(fn() => print($pdf->output()), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Quitance_Taxe_fonciere' . Str::random(10) . '.pdf"',
            ]);
        }

        session()->flash('message', 'Demande enregistrée avec succès.');

        // Réinitialiser le formulaire
        // $this->reset();
    }

    public function generateReceiptPdf($certificateId)
    {
        // Récupérer le certificat et ses relations
        $certificate = FakeCertificate::with(['region', 'division', 'conservation'])->findOrFail($certificateId);

        // Préparer les données à afficher dans le PDF
        $data = [
            'qualification' => $certificate->qualification,
            'region' => $certificate->region->region_name,
            'division' => $certificate->division->division_name,
            'subDivision' => $certificate->conservation->conservation_name,
            'titre_foncier' => $certificate->titre_foncier,
            'nom' => $certificate->nom ?? 'N/A',
            'prenom' => $certificate->prenom ?? 'N/A',
            'profession' => $certificate->profession ?? 'N/A',
            'motifs' => $certificate->motifs ?? 'N/A',
            'telephone' => $certificate->telephone ?? 'N/A',
            'email' => $certificate->email ?? 'N/A',
            'localisation' => $certificate->localisation ?? 'N/A',
            'identifiant' => $certificate->identifiant ?? 'N/A',
            'date' => now()->format('d/m/Y'),
        ];

        // dd($certificate);

        // Générer le PDF avec un design épuré et élégant
        $pdf = Pdf::loadView('certificates.receipt', $data)
            ->setPaper('a4', 'portrait');


        // Afficher le PDF dans une nouvelle fenêtre du navigateur
        return response()->stream(fn() => print($pdf->output()), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Quitance_Certificate_Propriate' . Str::random(10) . '.pdf"',
        ]);
    }

    public function render()
    {
        // dd('ok');
        return view('livewire.payment.impot.taxe-fonciere.pay')->layout('components.layouts.user.master');
    }
}
