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
use App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps\HandlesRedevance;
use App\Models\SubDivision;
use proj4php\Point;
use proj4php\Proj;
use proj4php\Proj4php;

class Show extends Component
{
    use WithDataTables;
    use HandlesCotationCsdaf, HandlesOrdreVersement, HandlesAvisPublicDescente, HandlesRedevance;  // Inclure le Trait

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
    public $region_id;
    public $division_id;
    public $sub_division_id;
    public $etat_terrain;
    public $duplicata;
    public $source_terrain;
    public $superficie;
    public $volume;
    public $folio;
    public $numero_cp;
    public $titre_foncier_id;
    public $next_step;
    public $statut;
    public $date_delivrance;
    public $cotation_user_id;
    public $observation_cotation;
    public $date_cotation;
    public $status_cotation;
    public $numero_ordre_versement;
    public $numero_arrete_ordre_versement;
    public $date_ordre_versement;
    public $status_ordre_versement;
    public $coordinates = ['', ''];
    public $coordonnees = [];
    public $attachements;
    public $cout_etat_cession;
    public $message_porte;
    public $pv_administratif;
    public $pv_bornage;
    public $cni_files = [];
    public $montant_ordre_redevance_fonciere;

    public $numero_conservation;

    public function mount($code)
    {
        $imma_directe = ImmatriculationDirecte::where('reference', $code)->first();
        $this->imma_directe = $imma_directe;
        $this->service_id = $imma_directe->service_id ?? null;
        $this->user_id = $imma_directe->user_id ?? null;
        $this->observation = $imma_directe->observation ?? '';

        // Ajouter ici toutes les autres colonnes récupérées avec des ternaires
        $this->region_id = $imma_directe->region_id ?? null;
        $this->division_id = $imma_directe->division_id ?? null;
        $this->sub_division_id = $imma_directe->sub_division_id ?? null;
        $this->zone = $imma_directe->zone ?? '';
        $this->etat_terrain = $imma_directe->etat_terrain ?? '';
        $this->duplicata = $imma_directe->duplicata ?? '';
        $this->source_terrain = $imma_directe->source_terrain ?? '';
        $this->superficie = $imma_directe->superficie ?? 0;
        $this->volume = $imma_directe->volume ?? '';
        $this->folio = $imma_directe->folio ?? '';
        $this->numero_cp = $imma_directe->numero_cp ?? '';
        $this->titre_foncier_id = $imma_directe->titre_foncier_id ?? null;
        $this->numero_bordereau_transmission = $imma_directe->numero_bordereau_transmission ?? '';
        $this->next_step = $imma_directe->next_step ?? '';
        $this->statut = $imma_directe->statut ?? '';
        $this->comissions = !empty($imma_directe->comissions) ? json_decode($imma_directe->comissions, true) : [];
        $this->cotation_user_id = $imma_directe->cotation_user_id ?? null;
        $this->observation_cotation = $imma_directe->observation_cotation ?? '';
        $this->date_cotation = !empty($imma_directe->date_cotation) && Carbon::hasFormat(trim($imma_directe->date_cotation), 'Y-m-d')
            ? Carbon::createFromFormat('Y-m-d', trim($imma_directe->date_cotation))->format('d/m/Y')
            : null;
        $this->status_cotation = $imma_directe->status_cotation ?? 'no_done';
        $this->montant_ordre_versement = $imma_directe->montant_ordre_versement ?? 0;
        $this->numero_ordre_versement = $imma_directe->numero_ordre_versement ?? '';
        $this->numero_arrete_ordre_versement = $imma_directe->numero_arrete_ordre_versement ?? '';
        $this->date_ordre_versement = $imma_directe->date_ordre_versement ?? null;
        $this->status_ordre_versement = $imma_directe->status_ordre_versement ?? 'no_done';

        // Récupérer les services, régions, utilisateurs
        $this->services = Service::select('id', 'service_name_fr')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();

        // Calculer montant ordre redevance foncière
        $selectedSubDivision = SubDivision::findOrFail($this->sub_division_id);
        $prixMinimaM2 = $selectedSubDivision->prix_minima_m2 ?? 0;
        $this->montant_ordre_redevance_fonciere = ($this->superficie ?? 0) * $prixMinimaM2;
    }


    public function dossier_approbation_final()
    {

        $imma_directe = $this->imma_directe->update([
            'is_finalisation' => 1,
        ]);


        $this->refresh(__('Dossier verifier avec succes !'), 'EditStatutModal');
    }

    public function addCoordinate()
    {
        $this->coordinates[] = [];
    }

    public function removeCoordinate($coordinateIndex)
    {
        unset($this->coordinates[$coordinateIndex]);
        $this->coordinates = array_values($this->coordinates);
    }

    public function convert($utmCoordinates)
    {
        // Initialisez Proj4
        $proj4 = new Proj4php();

        // Créez les projections
        $projUTM = new Proj('+proj=utm +zone=32 +datum=WGS84 +units=m +no_defs', $proj4);
        $projWGS84 = new Proj('EPSG:4326', $proj4);

        $decimalResults = [];

        foreach ($utmCoordinates as $utm) {
            $utmParts = explode(',', $utm); // Sépare les coordonnées UTM en X et Y
            $utmX = floatval($utmParts[0]);
            $utmY = floatval($utmParts[1]);

            // Créez le point source avec les coordonnées UTM
            $pointSrc = new Point($utmX, $utmY, $projUTM);

            // Transformez le point entre les systèmes de coordonnées
            $pointDest = $proj4->transform($projWGS84, $pointSrc);

            // Obtenez les coordonnées lat/lon du point de destination
            $lat = $pointDest->y;
            $lon = $pointDest->x;

            // Ajoutez le résultat à votre tableau de résultats en coordonnées décimales
            $decimalResults[] = "$lon, $lat";
        }

        return $decimalResults;
    }

    public function quittance()
    {
        $this->validate([
            'coordinates' => 'required',
            'coordonnees' => 'required'
        ]);
        $transform = $this->convert($this->coordonnees);

        $imma_directe = $this->imma_directe->update([
            'coordonnees_utm' => json_encode($this->coordonnees),
            'coordonnees' => json_encode($transform),
        ]);
        if (!empty($this->attachements)) {
            foreach ($this->attachements as $attachement) {
                $imma_directe->addMedia($attachement->getRealPath())
                    ->usingName($imma_directe->uuid)
                    ->toMediaCollection('imma_directe');
            }
        }

        $this->refresh(__('Quittance et Coordonnées enregistréd avec succès!'), 'CertfifcatAffichageImmaDirecteModal');
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
            'cni_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Instruction de la Descente sur le terrain effectuée',
                'next_step' => 'Attente de la descente sur le terrain',
                'limit_nord' => $this->limit_nord,
                'limit_sud' => $this->limit_sud,
                'limit_est' => $this->limit_est,
                'limit_ouest' => $this->limit_ouest,
                'descente_terrain_maked' => Carbon::now()
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

        // dd($this->next_step);
        $imma = $this->imma_directe;
        $this->validate([
            #'status' => 'required',
            'date_status' => 'required',
        ]);
        if ($imma->next_step == "Avis Au publique En attente de signature") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Avis au Public Signer',
                    'next_step' => 'Instruction du Dossier – Élaboration du certificat d’affichage',
                    'date_avis_publique_signe' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Signature du certificat d'affichage") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Certificat d\'affichage signé',
                    'date_certificat_d_affichage_signer' => $this->date_status,
                    'next_step' => 'Programmation descente',
                    'date_calendrier_descente' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Paiement de L\'Etat de Cession") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Etat de Cession Payer',
                    'next_step' => 'Dépôt de la quittance de l’état de cession auprès du géomètre désigné',
                    'etat_cession_payer' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "valider le paiement") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier publié au bulletin des avis domaniaux et fonciers',
                    'next_step' => 'Achat des bulletins',
                    'date_publication_dossier_vise' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == 'Bulletins en attente de signature par le délégué') {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Bulletins signés',
                    'next_step' => 'Transmission du dossier complet à la Délégation Départementale',
                    'date_signature_bulletin' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Transmission du dossier technique au CSDAF") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier Transmis au CsDaf',
                    'next_step' => 'Jumelage (fusion) et préparation du Bordereau de transmission',
                    'transmission_csdaf' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Transmission du dossier technique au Délégué Régional MINDCAF") { //step 17
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => ' Dossier technique transmis au Délègue Regional Mindcaf',
                    'next_step' => 'Cotation du dossier complet d\’immatriculation directe au CSRDAF ',
                    'date_dossier_transmi_au_Mindcaf' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Cotation du dossier complet d\’immatriculation directe au CSRDAF ") { // step 18
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier complet transmis  au CSRegional Mindcaf',
                    'next_step' => 'Finalisation du Dossier',
                    'date_dossier_complet_transmi_CSRegional_mindcaf' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Finalisation du Dossier") { //step 19
            dd("ok");
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier Finaliser en attente de verification finale',
                    'next_step' => 'Verification finale',
                    'dossier_finale' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Cotation du dossier du dossier technique au Chef service régional du cadastre pour contrôle, mise à jour et signature") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier technique valide par la Brigader',
                    'next_step' => 'Réception, traitement et signature du dossier technique',
                    'coter_csrcadastre' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Réception, traitement et signature du dossier technique") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier technique signe  (Par le CSRCadastre)',
                    'next_step' => 'Transmission du dossier technique au Délégué Régional MINDCAF',
                    'dos_tech_transmis_drm' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Transmission du dossier technique au Délégué Régional MINDCAF") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => ' Dossier technique transmis au Délègue Regional Mindcaf ',
                    'next_step' => 'Cotation du dossier complet d’immatriculation directe au Chef service Régional des affaires foncières',
                    'dos_compl_csrdaf' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Cotation du dossier complet d’immatriculation directe au Chef service Régional des affaires foncières") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier Vise et en attente de publication',
                    'next_step' => 'Traitement du dossier visé-enregistré',
                    'cotation_compl_csrdaf' => $this->date_status,
                ]);
            });
        } else if ($imma->next_step == "Traitement du dossier visé-enregistré") {
            DB::transaction(function () {
                $this->imma_directe->update([
                    'statut' => 'Dossier Publier au bulletin des avis domaniaux et fonciers',
                    'next_step' => 'Achat des bulletins',
                    'cotation_compl_csrdaf' => $this->date_status,
                ]);
            });
        }



        $this->refresh(__('Statut Modifier Avec SUCCES!'), 'EditStatutModal');
        #$this->clearFields();
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

    public function sms($id)
    {
        $imma_directe = ImmatriculationDirecte::findOrFail($id);

        // Décoder les informations de la commission à partir du JSON
        $comissions = json_decode($imma_directe->comissions, true);
        // dd($comissions);

        // Vérifier qu'il y a au moins une entrée dans la commission
        if (empty($comissions)) {
            return ['echec' => 'Aucun membre de la commission trouvé pour cet envoi de SMS.'];
        }

        $sms = '';
        $userNames = '';
        $mobiles = "";

        foreach ($comissions as $user) {
            if ($user) {
                $userNames .= $user['name'] . ',';
                $mobiles .= $user['telephone'];
            }
        }

        //retirer la virgule en fin de chaine
        $userNames = rtrim($userNames, ',');
        $mobiles = rtrim($mobiles, ',');
        $sms = $this->message_porte;

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

    public function create_tf()
    {
        // dd($this->imma_directe->users->id);
        $this->validate([
            'volume' => 'required',
            'folio' => 'required',
            'numero_cp' => 'required'
        ]);

        // dd("ok");

        DB::transaction(function () {
            $this->imma_directe->update([
                'volume' => $this->volume,
                'folio' => $this->folio,
                'numero_cp' => $this->numero_cp,
                'is_complete' => 1,
                'statut' => 'Titre foncier créer',
                'next_step' => null,
            ]);
        });

        $titrefoncier = TitreFoncier::create([
            'numero_titre_foncier' => $this->generateCodeTF(),
            'national_code' => $this->genererNationalCodeUnique(),
            'numero_conservation' => $this->numero_conservation,
            'region_id' => $this->imma_directe->region_id,
            'division_id' => $this->imma_directe->division_id,
            'sub_division_id' => $this->imma_directe->sub_division_id,
            'date_de_delivrance_du_TF' => now(),
            'numero_du_duplicata' => $this->imma_directe->numero_du_duplicata,
            // 'groupement' => $this->groupement,
            'lieu_dit' => $this->imma_directe->lieu_dit,
            'zone' => $this->imma_directe->zone,
            'numero_folio' => $this->imma_directe->folio,
            'volume' => $this->imma_directe->volume,
            'superficie_du_TF_mere' => $this->imma_directe->superficie,
            'etat_TF' => 'DISPONIBLE',
            'etat_terrain' => $this->imma_directe->etat_terrain,
            'provenance_TF' => $this->imma_directe->source_terrain,
            'numero_bordereau_analytique' => $this->imma_directe->numero_bordereau_transmission,
            // 'volume_du_bordereau_analytique' => $this->volume_du_bordereau_analytique,
            // 'date_detablissement_du_bordereau_analytique' => $this->date_detablissement_du_bordereau_analytique,
            'coordonnees' => $this->imma_directe->coordonnees,
            'coordonnees_utm' => $this->imma_directe->coordonnees_utm,
            // 'coordonnees_utm' => json_encode($this->coordonnees),
            'limit_nord' => $this->imma_directe->limit_nord,
            'limit_sud' => $this->imma_directe->limit_sud,
            'limit_est' => $this->imma_directe->limit_est,
            'limit_ouest' => $this->imma_directe->limit_ouest,
            'recorded_by' => auth()->user()->name,
            'nom_et_prenoms_de_largent_traitant' => auth()->user()->name,
            // 'conservateur_id' => $this->conservateur_id,
            'numero_ccp' => $this->imma_directe->numero_cp,
            // 'taxFoncier_amount' => $taxFoncier_amount,
        ]);

        $userIdsToSync = $this->imma_directe->users->pluck('id')->toArray(); // Récupérer les IDs des utilisateurs
        $titrefoncier->users()->sync($userIdsToSync); // Synchroniser les IDs des utilisateurs

        // $titrefoncier->users()->sync([$this->imma_directe->users->id]);

        //Notfication Par SMS

        // $this->clearFields();u

        $this->refresh(__('Titres Fonciers Enregistres'), 'CreerTitreFoncier');
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
