<?php

namespace App\Http\Livewire\User\Request\CertificatPropriate;

use Livewire\Component;
use App\Models\TitreFoncier;
use App\Models\CertificatePropriete;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Sales\Sale;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Sales\Saleable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class Index extends Component
{

    use WithDataTables;

    public $titre_foncier_id, $titre_fonciers, $titre_foncier;
    public $phone_number, $certificate_proprietes_type, $price, $certificate_propriete_reason;
    public $request_type;
    public $identity_card;
    public $certificatepropriete;
    public $requestor_id, $validity, $certificate_proprietes_number, $status;
    public $payment_method;

    public function mount()
    {
        $this->titre_fonciers =  TitreFoncier::all();
    }

    public function updatedRequestType()
    {
        if ($this->request_type == 'standard') {
            $this->price = 10000; // Exemple de prix pour la demande standard
        } elseif ($this->request_type == 'express') {
            $this->price = 20000; // Exemple de prix pour la demande express
        }
    }

    public function store()
    {

        // dd($this->titre_foncier_id);

        $this->validate([
            'titre_foncier_id' => 'required|exists:titre_fonciers,id',
            'payment_method' => 'required|string',
            'phone_number' => 'required|string',
            'price' => 'required|numeric',
            'certificate_proprietes_type' => 'required|in:personne_physique,personne_morale',
            'certificate_propriete_reason' => 'required|string',
            'request_type' => 'required|in:express,standard',
            'identity_card' => 'required|image|max:10048',
        ]);

        $identityCardPath = $this->identity_card->store('identity_cards', 'public');

        $status = $this->request_type === 'express' ? 'active' : 'pending_extraction';

        $certificatepropriete =  CertificatePropriete::create([
            // 'uuid' => (string) \Str::uuid(),
            'titre_foncier_id' => $this->titre_foncier_id,
            'certificate_proprietes_number' => $this->CPCode(),
            'requestor_id' => Auth::id(),
            'price' => $this->price,
            'certificate_proprietes_type' => $this->certificate_proprietes_type,
            'certificate_propriete_reason' => $this->certificate_propriete_reason,
            'status' => $status,
            'validity' => Carbon::now()->addMonths(3),
            'identity_card' => $identityCardPath,
            'recorded_by' => auth()->user()->name,
        ]);

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'sales_amount' => $this->price,
            'sales_type' => 'certificate_propriete',
            'payment_status' => "totally_paid",
            'created_by' => auth()->user()->name,
        ]);

        // Create the Saleable item using only the specified information
        Saleable::create([
            'sale_id' => $sale->id,
            'price' => $this->price,
            'quantity' => 1,
            'saleable_id' => $certificatepropriete->id,
            'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ]);

        if ($this->request_type === "standard") {
            $this->refresh(__('Certificat de propriété Supprimé avec succès'), 'DeleteModal');
            $this->clearFields();
        } else {
            $this->printPdf($certificatepropriete->id);
        }
    }

    function CPCode()
    {
        $dernierEnregistrement = CertificatePropriete::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique = "CP" . $numeroFormate;

        return $codeUnique;
    }


    public function  printPdf($id)
    {
        $this->certificatepropriete = CertificatePropriete::findOrFail($id);
        $this->titre_foncier = TitreFoncier::findOrFail($this->certificatepropriete->titre_foncier_id);
        // $url = route('document.verify.cf', ['numero_cf' => $this->certificatepropriete->uuid]); // Génère l'URL pour la route nommée 'qr_code'

        // $qrcode = Qrcode::encoding("UTF-8")
        // ->color(8, 114, 145)
        // ->backgroundColor(245, 234, 62)
        // ->size(300)
        // ->generate($url);

        $data = [
            'element' => $this->certificatepropriete,
            'titrefoncier' => $this->titre_foncier,
            // 'qrcode' => $qrcode
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.user.request.certificat-propriate.print', $data)->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Cp-') . Str::random('10') . ".pdf"
        );
    }

    // public function printPdf($id)
    // {
    //     $this->certificatepropriete = CertificatePropriete::findOrFail($id);
    //     $this->titre_foncier = TitreFoncier::findOrFail($this->certificatepropriete->titre_foncier_id);


    //     $url = route('document.verify.cf', ['numero_cf' => $this->certificatepropriete->uuid]); // Génère l'URL pour la route nommée 'qr_code'

    //     $qrcode = Qrcode::encoding("UTF-8")

    //     ->color(8, 114, 145)
    //     ->backgroundColor(245, 234, 62)
    //     ->size(300)
    //     ->generate($url);

    //     $data = [
    //         'element' => $this->certificatepropriete,
    //         'titrefoncier' => $this->titre_foncier,
    //         'qrcode' => $qrcode
    //         // Autres données que vous souhaitez afficher dans la vue
    //     ];

    //     $html = view('livewire.user.request.certificat-propriate.print', $data)->render();

    //     $mpdf = new Mpdf();
    //     $mpdf->WriteHTML($html);

    //     return response()->streamDownload(
    //         fn() => print($mpdf->Output('', 'S')),
    //         __('Report-') . Str::random('10') . ".pdf"
    //     );
    // }

    public function clearFields()
    {
        $this->titre_foncier_id = '';
        $this->certificate_proprietes_type = '';
        $this->certificate_propriete_reason = '';
        $this->requestor_id = '';
        $this->price = '';
        $this->validity = '';
        $this->certificate_proprietes_number = '';
        $this->status = '';
    }

    public function render()
    {
        $certificats = CertificatePropriete::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $certificateproprietes_count = CertificatePropriete::count();

        $resultCount = 0;



        return view(
            'livewire.user.request.certificat-propriate.index',
            [
                'certificats' => $certificats,
                'resultCount' => $resultCount,
                'certificateproprietes_count' => $certificateproprietes_count
            ]
        )->layout('components.layouts.user.master');
    }
}
