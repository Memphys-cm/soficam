<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Service;
use Livewire\Component;
use Twilio\Rest\Client;
use App\Models\Division;
use App\Models\Sales\Sale;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    // public ImmatriculationDirecte $imma_directe;
    public $imma_directe;

    public $state = 0, $price_m2, $users, $user_id, $user_ids, $comissions = [] , $localisation;
    public $attachements , $services , $service_id , $observation , $montant_ordre_versement;
    public $region_id;
    public $division_id;
    public $sub_division_id;
    public $regions;
    public $divisions = [];
    public $sub_divisions = [];
    public $date_debut , $date_fin;
    public $date_convocation , $superficie , $status , $date_status;
    public $geometre_id , $geometres;
    public $attachments , $quitance;

    public function mount()
    {
        // $this->imma_directe = new ImmatriculationDirecte();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
        $this->geometres = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['geometre'])->get();
        }])->get();
        $this->services = Service::select('id','service_name_fr')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
    }

    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
        }
    }
    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->sub_divisions = SubDivision::whereDivisionId($division_id)->get();
        }
    }

    public function addRow()
    {
        $this->comissions[] = ['name' => '', 'position' => ''];
    }

    public function removeRow($index)
    {
        unset($this->comissions[$index]);
        $this->comissions = array_values($this->comissions);
    }

    public function initData($id)
    {
        $this->imma_directe = ImmatriculationDirecte::findOrFail($id);
        $imma = $this->imma_directe;
        // dd($imma->next_step);
        $this->state = 1;
        if($imma->next_step === "Avis Au publique En attente de signature"){
            // dd('enter');
            $this->status = 'Avis Publique Signer';
        }else if($imma->next_step === "signature decision portant calendrier de descente"){
            // dd('enter');
            $this->status = 'Decision portant calendrier de descente Signer';
        }
    }

    public function store()
    {
        if (!Gate::allows('lotissement.create') ) {
            return abort(401);
        }

        $this->validate([
            'localisation' => 'required',
        ]);
        
       $imma_directe = ImmatriculationDirecte::create([
        'reference' => Str::upper(Str::random(7)) . "" . now()->format('msu'),
        'superficie' => $this->superficie,
        'localisation' => $this->localisation,
        'region_id' => $this->region_id,
        'division_id' => $this->division_id,
        'sub_division_id' => $this->sub_division_id,
        'statut' => 'Dossier Ouvert',
        'next_step' => 'Cotation du Dossier au CSDAF',
        'StatutStyle' => 'info',
        // 'comissions' => json_encode($this->comissions),
       ]);


       $imma_directe->users()->sync($this->user_ids);

       if(!empty($this->attachements)){
            $imma_directe->addMedia($this->attachements->getRealPath())
            ->usingName($imma_directe->reference)
            ->toMediaCollection('immadirectes');
        }

        $this->clearFields();

        $this->refresh(__('Dossier D\'Immatriculation Directe Creer Avec SUCCES'), 'CreateImmaDirecteModal');

    }

    public function edit_statut()
    {
        $imma = $this->imma_directe;
        $this->validate([
            'status' => 'required',
            'date_status' => 'required',
        ]);
        if($imma->next_step == "Avis Au publique En attente de signature"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Avis au Public Signer',
                    'next_step' => 'signature decision portant calendrier de descente',
                    'date_avis_publique_signe' => $this->date_status,
                ]);
            });
        } else if($imma->next_step == "signature decision portant calendrier de descente"){
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Decision portant portant calendrier Signer',
                    'next_step' => 'Certificat_Affichage',
                    'date_calendrier_descente' => $this->date_status,
                ]);
            });
        }

        $this->refresh(__('Statut Modifier Avec SUCCES!'), 'EditStatutModal');
        $this->clearFields();
    }

    public function cotation_first_step()
    {
        $this->validate([
            'service_id' => 'required',
            'user_id' => 'required',
        ]);
        
       
        DB::transaction(function () {
            $this->imma_directe->update([
                'service_id' => $this->service_id,
                'observation_cotation' => $this->observation,
                'cotation_user_id' => $this->user_id,
                'status_cotation' => 'done',
                'statut' => 'coter',
                'next_step' => 'ordre_versement',
                'date_cotation' => Carbon::now(),
            ]);
        });

        $this->refresh(__('DOSSIERt Coter Avec SUCCES!'), 'CotationImmaDirecteModal');

        $this->clearFields();
    }

    function genererNumeroVersement()
    {
        $dernierEnregistrement = ImmatriculationDirecte::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique =  $numeroFormate."Y.30"."/MINCAF/41/T400";

        return $codeUnique;
    }

    public function ordre_versement()
    {
        $this->validate([
            'montant_ordre_versement' => 'required',
        ]);
        
       
        DB::transaction(function () {
            $this->imma_directe->update([
                'numero_ordre_versement' => $this->genererNumeroVersement(),
                // 'superficie_ordre_versement' => $this->superficie_ordre_versement,
                'montant_ordre_versement' => $this->montant_ordre_versement,
                'status_ordre_versement' => 'pending',
                'statut' => 'Ordre de Versement en Attente de Paiement',
                'next_step' => 'Paiement de L\'Ordre versement',
                'date_ordre_versement' => Carbon::now(),
            ]);
        });

        $sale = Sale::create([
            // 'user_id' => $this->requestor_id,
            'sales_amount' => $this->montant_ordre_versement,
            'sales_type' => 'ordre_versement_imma_directe',
            'created_by' => auth()->user()->name,
        ]);

        // Create the Saleable item using only the specified information
        $saleableData = [
            'sale_id' => $sale->id,
            'price' => $this->montant_ordre_versement,
            'quantity' => 1,
            'saleable_id' => $this->imma_directe->id,
            'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ];

        DB::table('saleables')->insert($saleableData);

        // $this->printPdf();

        $this->refresh(__('Ordre de Versement Enregistrer Avec SUCCES!'), 'OrdreVersementImmaDirecteModal');

        $this->clearFields();
    }

    public function printPdf()
    {
        // $ordre = ImmatriculationDirecte::findOrFail($id);
        $data = [
            'ordre' => $this->imma_directe,
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.ordre-versement'
        // ,$data
        )->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('OrdreVersement-') . Str::random('10') . ".pdf"
        );
    }

    public function quitance_geometre()
    {
        // dd('id');
        $this->validate([
            'geometre_id' => 'required',
        ]);
        
       
       DB::transaction(function () {
            $this->imma_directe->update([
                'geometre_id' => $this->geometre_id,
                'date_geometre_enregistrer' => Carbon::now(),
                'statut' => 'Etat de cession enregistré auprès du géomètre',
                'next_step' => 'Enregistrement du PV de Bornage',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Geometre Enregistrer Avec Suceess et Enregistrement'), 'GeometreModal');

    }

    public function pv_bornage()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'pv_enregistrer' => Carbon::now(),
                'statut' => 'PV enregistrer',
                'next_step' => 'Mise en Forme du Dossier Administratif',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Pv de Bornage Enregistrer Avec Suceess'), 'PvBornageModal');
    }

    public function dossier_admin()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'dossier_administratif_complet' => Carbon::now(),
                'statut' => 'Dossier Administratif Mise En Forme',
                'next_step' => 'Enregistrement Dossier Technique',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_administratif');
            }
        }

        $this->emitUp('flow_updated');
        
        $this->clearFields();
        $this->refresh(__('Pv de Bornage Enregistrer Avec Suceess'), 'PvBornageModal');
    }

    public function certificat_affichage()
    {
        $this->validate([
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);
        
       
        DB::transaction(function () {
            $this->imma_directe->update([
                'date_debut_certificat_affichage' => $this->date_debut,
                'date_fin_certificat_affichage' => $this->date_fin,
                'status_certificat_d\'affichage' => 'done',
                'statut' => 'Certificat D\'affichage Effectuer',
                'next_step' => 'Convocation D\'invitation sur Le Terrain',
            ]);
        });

        $this->refresh(__('Certificat Imprimr Avec SUCCES!'), 'CertfifcatAffichageImmaDirecteModal');

        $this->clearFields();

        $data = [
            'imma_directe' => $this->imma_directe,
            // Autres données que vous souhaitez afficher dans la vue
        ];
        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.certificat_affichage',
        $data)->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Certificat_Affichage-') . Str::random('10') . ".pdf"
        );

    }

    public function convocation()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'date_convocation' => $this->date_convocation,
                'comissions' => json_encode($this->comissions),
                'status_convocation' => 'done',

                'statut' => 'Convocationsur le Terrain Effectuer',
                'next_step' => 'Etablissement Etat de Cession',
            ]);
        });
        $this->refresh(__('Convocation imprimée Avec SUCCES!'), 'ConvocationImmaDirecteModal');

        $this->clearFields();

        $sid='ACa77985267946bd8e613944d40b9d0458';
        $token='b7b84303df6a21c3d6f9b32d3d678103';
        $twilio = new Client($sid, $token);

        $messageBody = "Hello, le message porté est disponible.";

        $twilio->messages->create(
            '+237672959097',
            [
                'from' => '+15856393680',
                'body' => $messageBody,
            ]
        );


        $data = [
            'imma_directe' => $this->imma_directe,
            'comissions' => $this->comissions
        ];

        dd($this->imma_directe, $this->comissions);
        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.message-porte', 
        $data)->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Message_Porté-').Str::random('10') . ".pdf"
        );
    }
    


    public function clearFields()
    {
        $this->reset(
            [
                // 'requestor_id', 
                'localisation',
                'comissions',
            ]
        );

        $this->user_ids = [];
    }


    public function render()
    {
        $imma_directes = ImmatriculationDirecte::
            // withCount('users')->
            orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $imma_directes_count = ImmatriculationDirecte::count();


        return view('livewire.portal.immatriculation-directe.index', ['imma_directes' => $imma_directes, 'imma_directes_count' => $imma_directes_count]);
    }
}
