<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Service;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;
use App\Http\Livewire\Traits\WithDataTables;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesCotationCsdaf;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesOrdreVersement;
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesAvisPublicDescente;

class Show extends Component
{
    use WithDataTables;
    use HandlesCotationCsdaf, HandlesOrdreVersement, HandlesAvisPublicDescente;  // Inclure le Trait

    public $imma_directe;
    public $services, $regions;
    public $service_id, $user_id;
    public $observation;
    public $users;
    public $high_step = 1;
    public $step = 1;
    public $montant_ordre_versement;
    public $date_debut, $date_fin;
    public $status;
    public $date_status;
    public $comissions = [];
    public $limit_nord;
    public $limit_sud;
    public $limit_est;
    public $limit_ouest;
    public $attachments;
    public $state = 0, $price_m2, $user_ids, $localisation;
    public $frais_suplementaires, $cout, $commentaires, $code, $numero_bordereau_transmission;
    public $etat_cession, $zone, $superficie_en_m2;
    public $cout_etat_cession;
    public $message_porte;
    public $pv_administratif;
    public $pv_bornage;
    public $cni_files = [];

    public function mount($code)
    {
        $this->imma_directe = ImmatriculationDirecte::where('reference', $code)->first();
        $this->services = Service::select('id', 'service_name_fr')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();

        // Vérifie si l'objet 'imma_directe' est défini et a une propriété 'next_step'
        if (isset($this->imma_directe) && isset($this->imma_directe->next_step)) {
            // Assigner le 'next_step' de 'imma_directe' à 'this->status'
            $this->status = $this->imma_directe->next_step;
        }
    }

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function addRow()
    {
        $this->comissions[] = ['name' => '', 'position' => ''];
    }

    public function nextHighStep()
    {
        $this->high_step++;
    }

    public function prevHighStep()
    {
        $this->high_step--;
    }

    public function setStep($step)
    {
        $this->step = $step;
    }

    public function setHighStep($step)
    {
        $this->high_step = $step;
    }

    public function certificat_affichage()
    {
        $this->validate([
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);


        DB::transaction(function () {
            $this->imma_directe->update([
                'date_debut_certificat_d_affichage' => $this->date_debut,
                'date_fin_certificat_d_affichage' => $this->date_fin,
                'statut' => 'Certificat D\'affichage transmis pour signature',
                'next_step' => 'Signature du certificat d\'affichage',
            ]);
        });

        $this->refresh(__('Certificat d\'affichage Imprimé Avec SUCCES!'), 'CertfifcatAffichageImmaDirecteModal');

        // $this->clearFields();


        $data = [
            'imma_directe' => $this->imma_directe,
            // Autres données que vous souhaitez afficher dans la vue
        ];
        $pdf = Pdf::loadView(
            'livewire.portal.immatriculation-directe.print.certificat_affichage',
            $data
        )->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('Certificat_Affichage-') . Str::random('10') . ".pdf"
        );
    }

    public function bordereau()
    {
        $this->validate(
            [
                "numero_bordereau_transmission" => "required"
            ]
        );

        DB::transaction(function () {
            $this->imma_directe->update([
                "numero_bordereau_transmission" => $this->numero_bordereau_transmission,
                "statut" => "Bordereau de Transmission éffectué",
                "next_step" => "Transmission du dossier technique au Délégué Régional MINDCAF"
            ]);
        });

        $this->refresh(__('Numéro du Bordereau de transmission enregistré'), 'DescenteTerrainModal');
    }

    public function edit_statut()
    {
        if ($this->step == 6) {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => $this->status,
                    'next_step' => 'Programmation descente sur le terrain',
                    'date_certificat_d_affichage_signer' => $this->date_status,
                ]);
            });
        }
    }


    public function descente_terrain()
    {
        $this->validate([
            'comissions' => 'required|array|min:1',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Descente sur le terrain effectuée',
                'next_step' => 'Etablissement Etat de Cession',
                'comissions' => json_encode($this->comissions),
                'descente_terrain' => Carbon::now()
            ]);
        });

        $this->sms($this->imma_directe->id, 'descente_terrain');

        // $this->clearFields();
        $this->refresh(__('Descente sur le terrain effectuée'), 'DescenteTerrainModal');
    }

    public function instruction_descente_terrain()
    {
        $this->validate([
            'pv_administratif' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'pv_bornage' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cni_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Descente sur le terrain effectuée',
                'next_step' => 'Etablissement Etat de Cession',
                'descente_terrain' => Carbon::now()
            ]);
        });

        // Enregistrer les fichiers PV administratifs
        if ($this->pv_administratif) {
            $this->imma_directe->pv_administratif = $this->pv_administratif->store('pvs_administratif', 'public');
        }
        if ($this->pv_bornage) {
            $this->imma_directe->pv_bornage = $this->pv_bornage->store('pvs_bornage', 'public');
        }

        // Enregistrer les fichiers CNI
        $cni_paths = [];
        foreach ($this->cni_files as $index => $file) {
            if ($file) {
                $cni_paths[$index] = $file->store('cni_comissions', 'public');
            }
        }
        $this->imma_directe->cni_files = json_encode($cni_paths);

        // Enregistrer les fichiers attachés supplémentaires
        // if (!empty($this->attachments)) {
        //     foreach ($this->attachments as $attachment) {
        //         $this->imma_directe->addMedia($attachment->getRealPath())
        //             ->usingName('Acte_Pv_Descente_Terrain')
        //             ->toMediaCollection('imma_directe_dossier_administratif');
        //     }
        // }

        // Sauvegarder les modifications
        $this->imma_directe->save();

        $this->refresh(__('Descente sur le terrain effectuée'), 'DescenteTerrainModal');
    }


    public function edits_statut()
    {
        $imma = $this->imma_directe;
        $this->validate([
            'date_status' => 'required',
        ]);

        switch ($imma->next_step) {
            case "Avis Au publique En attente de signature":
                $updateData = [
                    'statut' => 'Avis au Public Signer',
                    'next_step' => 'Instruction du Dossier – Élaboration du certificat d’affichage',
                    'date_avis_publique_signe' => $this->date_status,
                ];
                break;
            case "Signature du certificat d'affichage":
                $updateData = [
                    'statut' => 'Certificat d\'affichage signé',
                    'date_certificat_d_affichage_signer' => $this->date_status,
                    'next_step' => 'Programmation descente',
                    'date_calendrier_descente' => $this->date_status,
                ];
                break;
            case "Paiement de L\'Etat de Cession":
                $updateData = [
                    'statut' => 'Etat de Cession Payer',
                    'next_step' => 'Dépôt de la quittance de l’état de cession auprès du géomètre désigné',
                    'etat_cession_payer' => $this->date_status,
                ];
                break;
            case "valider le paiement":
                $updateData = [
                    'statut' => 'Dossier publié au bulletin des avis domaniaux et fonciers',
                    'next_step' => 'Achat des bulletins',
                    'date_publication_dossier_vise' => $this->date_status,
                ];
                break;
            case "Bulletins en attente de signature par le délégué":
                $updateData = [
                    'statut' => 'Bulletins signés',
                    'next_step' => 'Transmission du dossier complet à la Délégation Départementale',
                    'date_signature_bulletin' => $this->date_status,
                ];
                break;
            case "Transmission du dossier technique au CSDAF":
                $updateData = [
                    'statut' => 'Dossier Transmis au CsDaf',
                    'next_step' => 'Jumelage (fusion) et préparation du Bordereau de transmission',
                    'transmission_csdaf' => $this->date_status,
                ];
                break;
            case "Transmission du dossier technique au Délégué Régional MINDCAF":
                $updateData = [
                    'statut' => 'Dossier technique transmis au Délègue Regional Mindcaf',
                    'next_step' => 'Cotation du dossier complet d’immatriculation directe au CSRDAF',
                    'date_dossier_transmi_au_Mindcaf' => $this->date_status,
                ];
                break;
            case "Cotation du dossier complet d’immatriculation directe au CSRDAF":
                $updateData = [
                    'statut' => 'Dossier complet transmis  au CSRegional Mindcaf',
                    'next_step' => 'Transmission du dossier complet au Délégué Régional MINDCAF',
                    'date_dossier_complet_transmi_CSRegional_mindcaf' => $this->date_status,
                ];
                break;
            case "Cotation du dossier du dossier technique au Chef service régional du cadastre pour contrôle, mise à jour et signature":
                $updateData = [
                    'statut' => 'Dossier technique valide par la Brigader',
                    'next_step' => 'Réception, traitement et signature du dossier technique',
                    'coter_csrcadastre' => $this->date_status,
                ];
                break;
            case "Réception, traitement et signature du dossier technique":
                $updateData = [
                    'statut' => 'Dossier technique signe (Par le CSRCadastre)',
                    'next_step' => 'Transmission du dossier technique au Délégué Régional MINDCAF',
                    'dos_tech_transmis_drm' => $this->date_status,
                ];
                break;
            case "Cotation du dossier complet d’immatriculation directe au Chef service Régional des affaires foncières":
                $updateData = [
                    'statut' => 'Dossier Vise et en attente de publication',
                    'next_step' => 'Traitement du dossier visé-enregistré',
                    'cotation_compl_csrdaf' => $this->date_status,
                ];
                break;
            case "Traitement du dossier visé-enregistré":
                $updateData = [
                    'statut' => 'Dossier Publier au bulletin des avis domaniaux et fonciers',
                    'next_step' => 'Achat des bulletins',
                    'cotation_compl_csrdaf' => $this->date_status,
                ];
                break;
            default:
                $updateData = [];
                break;
        }

        if (!empty($updateData)) {
            DB::transaction(function () use ($updateData) {
                $this->imma_directe->update($updateData);
            });
        }

        $this->refresh(__('Statut Modifier Avec SUCCES!'), 'EditStatutModal');
    }


    public function etatDeCession()
    {
        // Récupérer l'année en cours au format 'yy'
        $year = date('y');

        // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
        $counter = EtatCession::count() + 1;

        // Générer le code unique
        $this->code = $this->generateUniqueCode($year, $counter);
        // dd($code);


        $this->etat_cession = EtatCession::create([
            // 'user_id' => $this->requestor_id,
            'zone' => $this->zone,
            'reference_etat_cession' => $this->code,
            'lieu_dit' => $this->imma_directe->localisation,
            'superficie_en_m2' => $this->imma_directe->superficie,
            'sub_division_id' => $this->imma_directe->sub_division_id,
            'commentaires' => $this->commentaires,
            'cout' => $this->cout,
            'frais_suplementaires' => $this->frais_suplementaires,
            'cout_etat_cession' => $this->cout_etat_cession,
            'type_operation' => 'immatriculation_direct',
            'status' => 'pending_payment',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'etat_cession_id' => $this->etat_cession->id,
                'statut' => 'Etat de Cession en Attente de Paiement',
                'next_step' => 'edit',
                'etat_cession' => Carbon::now(),
            ]);

            $sale = Sale::create([
                // 'user_id' => $this->requestor_id,
                'sales_code' => $this->code,
                'sales_amount' => $this->cout_etat_cession,
                'sales_type' => 'etat_cession__imma_directe',
                'created_by' => auth()->user()->name,
            ]);


            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->cout_etat_cession,
                'quantity' => 1,
                'saleable_id' => $this->imma_directe->id,
                'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];


            DB::table('saleables')->insert($saleableData);
        });

        $data = [
            'imma_directe' => $this->imma_directe,
        ];

        $pdf = Pdf::loadView('livewire.portal.immatriculation-directe.print.quitance', $data)->setPaper('a4', 'portrait');
        return response()->streamDownload(
            fn() => print($pdf->output()),
            __('OrdreDeVersement') . Str::random('10') . ".pdf"
        );

        $this->refresh(__('Etat de Cession Enregistrer Avec SUCCES!'), 'EtatCessionModal');

        $this->clearFields();
    }

    public function generateUniqueCode($year, $counter)
    {
        $counterFormatted = str_pad($counter, 5, '0', STR_PAD_LEFT);
        return $year . 'STATE' . $counterFormatted;
    }

    public function update_dossier_technique()
    {

        DB::transaction(function () {
            $this->imma_directe->update([
                'dossier_technique_complet' => Carbon::now(),
                'statut' => 'Dossier Technique Mise En Forme',
                'next_step' => 'Mise en Forme du Dossier Administratif',
            ]);
        });


        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $this->imma_directe->addMedia($attachment->getRealPath())
                    ->usingName('Acte Expidition')
                    ->toMediaCollection('imma_directe_dossier_technique');
            }
        }

        $this->emitUp('flow_updated');

        // $this->clearFields();
        $this->refresh(__('Dossier Administratif Mise En Forme Avec Suceess'), 'DossierAdministratifModal');
    }

    public function dossier_admin()
    {
        DB::transaction(function () {
            $this->imma_directe->update([
                'dossier_administratif_complet' => Carbon::now(),
                'statut' => 'Dossier Administratif Mise En Forme',
                'next_step' => 'Transmission du dossier technique au CSDAF',
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

        // $this->clearFields();
        $this->refresh(__('Dossier Administratif Mise En Forme Avec Suceess'), 'DossierAdministratifModal');
    }

    public function sms($id, $case = 'default')
    {
        // Récupérer l'immatriculation directe
        $imma_directe = ImmatriculationDirecte::findOrFail($id);

        // Décoder les informations de la commission à partir du JSON
        $comissions = json_decode($imma_directe->comissions, true);

        // Vérifier qu'il y a au moins une entrée dans la commission
        if (empty($comissions)) {
            return ['echec' => 'Aucun membre de la commission trouvé pour cet envoi de SMS.'];
        }

        // Construire la liste des numéros de téléphone
        $mobiles = array_column($comissions, 'telephone');
        $mobiles = implode(',', $mobiles);

        // Construire le message en fonction du cas
        $userNames = array_column($comissions, 'name');
        $userNamesString = implode(', ', $userNames);

        switch ($case) {
            case 'descente_terrain':
                $sms = "Mr/Mme. $userNamesString, votre dossier d'immatriculation directe est à l'étape 'Descente sur le terrain'.";
                break;

            case 'certificat_affichage':
                $sms = "Mr/Mme. $userNamesString, votre dossier d'immatriculation directe est à l'étape 'Certificat d'affichage signé'.";
                break;

            case 'paiement_etat':
                $sms = "Mr/Mme. $userNamesString, votre dossier d'immatriculation directe est à l'étape 'Paiement de l'État de Cession'.";
                break;

                // Ajoute d'autres cas ici selon les besoins

            default:
                $sms = "Mr/Mme. $userNamesString, votre dossier d'immatriculation directe est à l'étape actuelle : $imma_directe->statut.";
                break;
        }

        // Paramètres pour l'API SMS
        $sms_body = [
            'api_key' => '36v7fN66hzUD6SaBYkILlirHZo7P',
            'senderid' => 'SOFICAM',
            'sms' => $sms,
            'mobiles' => $mobiles
        ];

        $url = 'https://api.queensms.net/v1/sms.php?' . http_build_query($sms_body);

        try {
            // Envoi de la requête HTTP
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);

            // Gestion des erreurs cURL
            if (curl_errno($ch)) {
                return ['echec' => curl_error($ch)];
            }

            curl_close($ch);
            return ['success' => $output];
        } catch (Exception $exception) {
            // Gestion des exceptions
            return ['echec' => $exception->getMessage()];
        }
    }


    public function generateCodeTF()
    {
        $numero = $this->imma_directe->region->code . "/" . $this->imma_directe->division->code . "/" . 'A' . "/" . $this->numero_conservation;
        return ($numero);
    }

    function genererNationalCodeUnique()
    {
        $dernierEnregistrement = TitreFoncier::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique = "TF" . $numeroFormate;

        return $codeUnique;
    }

    public function render()
    {

        if ($this->step == 6) {
            // dd('d');
            $this->status == "Certificat d\'affichage signé";
        }

        return view('livewire.portal.immatriculation-directe.show');
    }
}
