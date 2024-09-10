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
            $this->titre_foncier = $this->certificat->titreFoncier->numero_titre_foncier;
            $this->region_id = $this->certificat->titreFoncier->region_id;
            $this->division_id = $this->certificat->titreFoncier->division_id;
            $this->divisions = Division::all();
            // $this->conservations = Conservation::where('id',$this->division_id)->get();
            $this->conservations = Conservation::all();
            $this->nom = $this->certificat->users->last_name;
            $this->prenom = $this->certificat->users->first_name;
            $this->telephone = $this->certificat->requestor->primary_phone_number;
            $this->email = $this->certificat->users->email;
            $this->localisation = $this->certificat->users->lieu_dit;
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

    protected $rules = [
        'qualification' => 'required',
        'region_id' => 'required|exists:regions,id',
        'division_id' => 'required|exists:divisions,id',
        'conservation_id' => 'required|exists:conservations,id',
        'titre_foncier' => 'required|string|max:255',
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'profession' => 'nullable|string|max:255',
        'motifs' => 'nullable|string|max:255',
        'telephone' => 'nullable',
        'email' => 'nullable|email|max:255',
        'localisation' => 'nullable|string|max:255',
        'identifiant' => 'nullable|string|max:255',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        // dd($this->qualification);

        // Sauvegarde dans la base de données
        $certificat = FakeCertificate::create($validatedData);

        $this->certificat->saleable->sale->payment_status = "totally_paid";
        $this->certificat->status = "active";
        $this->certificat->saleable->sale->save();
        $this->certificat->save();

        session()->flash('message', 'Demande enregistrée avec succès.');

        return $this->generateReceiptPdf($certificat->id);

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
            'Content-Disposition' => 'inline; filename="Quittance_Taxe_Fonciere' . Str::random(10) . '.pdf"',
        ]);
    }


    public function render()
    {
        // dd('ok');
        return view('livewire.payment.impot.taxe-fonciere.pay')->layout('livewire.payment.impot.app');
    }
}
