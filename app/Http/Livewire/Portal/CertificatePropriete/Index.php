<?php

namespace App\Http\Livewire\Portal\CertificatePropriete;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Sales\Saleable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;


class Index extends Component
{
    use WithDataTables;

    public $status = 'pending_payment';
    public $validity, $certificate_proprietes_type, $certificate_propriete_reason, $certificatepropriete;
    public $titre_foncier_id, $requestor_id, $price, $requestors;
    public $certificate_propriete_id, $certificate_proprietes_number, $titre_fonciers;

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

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier', 'region_id', 'division_id', 'sub_division_id', 'lieu_dit')->get();
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();
        $this->certificate_proprietes_number =  $this->CPCode();
    }

    public function store()
    {

        $this->validate([
            'titre_foncier_id' => 'required',
            'certificate_proprietes_type' => 'required',
            'certificate_propriete_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'certificate_proprietes_number' => 'required',
            //'status' => 'required',

        ]);

        DB::transaction(function () {
            $certificatepropriete = CertificatePropriete::create([
                'titre_foncier_id' => $this->titre_foncier_id,
                'certificate_proprietes_type' => $this->certificate_proprietes_type,
                'certificate_propriete_reason' => $this->certificate_propriete_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => $this->certificate_proprietes_number,
                // 'status' => $this->status,
                'recorded_by' => auth()->user()->name,
            ]);

            $sale = Sale::create([
                'user_id' => $this->requestor_id,
                'sales_amount' => $this->price,
                'sales_type' => 'certificate_propriete',
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
        });

        $this->clearFields();
        $this->refresh(__('Certificat Propriete créé avec succès!'), 'CreatecertificateproprieteModal');
    }

    public function initData($id)
    {
        $certificatepropriete = CertificatePropriete::findOrFail($id);

        $this->certificatepropriete = $certificatepropriete;

        $this->titre_foncier_id =  $certificatepropriete->titreFoncier->numero_titre_foncier;
        $this->certificate_proprietes_type =  $certificatepropriete->certificate_proprietes_type;
        $this->certificate_propriete_reason =  $certificatepropriete->certificate_propriete_reason;
        $this->requestor_id =  $certificatepropriete->requestor_id;
        $this->price =  $certificatepropriete->price;
        $this->validity =  $certificatepropriete->validity;
        $this->certificate_proprietes_number =  $certificatepropriete->certificate_proprietes_number;
        $this->status =  $certificatepropriete->status;
    }
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

    public function update()
    {
        $this->validate([
            //'titre_foncier_id' => 'required',
            'certificate_proprietes_type' => 'required',
            'certificate_propriete_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'certificate_proprietes_number' => 'required',
            'status' => 'required',

        ]);


        DB::transaction(function () {
            $this->certificatepropriete->update([
                //'titre_foncier_id' => $this->titre_foncier_id,
                'certificate_proprietes_type' => $this->certificate_proprietes_type,
                'certificate_propriete_reason' => $this->certificate_propriete_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => $this->certificate_proprietes_number,
                'status' => $this->status,
            ]);
        });

        $this->clearFields();
        $this->refresh(__('Certificat Propriete Mis à jour!'), 'UpdateCertificateProprieteModal');
    }


    public function delete()
    {
        if ($this->certificatepropriete) {

            // Also delete created sales record
            $this->certificatepropriete->delete();
        }

        $this->refresh(__('Certificat de propriété Supprimé avec succès'), 'DeleteModal');
    }

    public function sms($id)
    {
        $certificatepropriete = CertificatePropriete::findOrFail($id);
        $receiver = $certificatepropriete->requestor->first_name;
        $sms = "Mr/Mme. $receiver votre Certificat de Propriété est disponible et désormais fonctionnel";
        $senderid = 'SOFICAM';
        $mobiles = $certificatepropriete->requestor->primary_phone_number;
        $api_key = '36v7fN66hzUD6SaBYkILlirHZo7P';
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

    public function  printPdf($id)
    {
        $this->certificatepropriete = CertificatePropriete::findOrFail($id);
        $data = [
            'element' => $this->certificatepropriete,
            'titrefoncier' => $this->titre_fonciers,
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.certificate-propriete.print', $data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }
    public function  printCertificate($id)
    {
        $this->certificatepropriete = CertificatePropriete::findOrFail($id);
        $data = [
            'element' => $this->certificatepropriete,
            'titrefoncier' => $this->titre_fonciers,
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.certificate-propriete.print', $data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function collect($id)
    {
        $titre_fonciers = TitreFoncier::find($id);
        $charges = $titre_fonciers->charge; // Vérifiez que la relation est bien définie
        $lotissements = $titre_fonciers->parcels;
        $certificate_proprietes = $titre_fonciers->certificatesProprietes;
        $etat_cessions = $titre_fonciers->etatCessionsPaid;

        return [$titre_fonciers, $charges, $lotissements, $certificate_proprietes, $etat_cessions];
    }
    public function print($id)
    {
        list($charges) = $this->collect($id);

        $data = [
            'charges' => $charges,
            // Autres données que vous souhaitez afficher dans la vue
        ];
        #dd($data);

        $pdf = Pdf::loadView('livewire.portal.certificate-propriete.prints', $data)
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function printPdfs($id)
    {
        list($titre_fonciers, $charges, $lotissements, $certificate_proprietes, $etat_cessions) = $this->collect($id);

        $data = [
            'titre_fonciers' => $titre_fonciers,
            'charges' => $charges,
            'lotissements' => $lotissements,
            'certificate_proprietes' => $certificate_proprietes,
            'etat_cessions' => $etat_cessions,
            // Autres données que vous souhaitez afficher dans la vue
        ];
        #dd($data);

        $pdf = Pdf::loadView('livewire.portal.certificate-propriete.prints', $data)
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }


    public function render()
    {
        $certificateproprietes = CertificatePropriete::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $certificateproprietes_count = CertificatePropriete::count();



        return view('livewire.portal.certificate-propriete.index', [
            'certificateproprietes' => $certificateproprietes,
            'certificateproprietes_count' => $certificateproprietes_count
        ]);
    }
}
